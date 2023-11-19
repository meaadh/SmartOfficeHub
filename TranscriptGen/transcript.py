import time
import os
import re
import torch
from pathlib import Path
from pytube import YouTube

import whisper
from whisper.utils import get_writer

def to_snake_case(name):
    return name.lower().replace(" ", "_").replace(":", "_").replace("__", "_")

def download_youtube_audio(url,  file_name = None, out_dir = "."):
    "Download the audio from a YouTube video"
    yt = YouTube(url)
    if file_name is None:
        file_name = Path(out_dir, to_snake_case(yt.title)).with_suffix(".mp4")
    yt = (yt.streams
            .filter(only_audio = True, file_extension = "mp4")
            .order_by("abr")
            .desc())
    return yt.first().download(filename = file_name)

def transcribe_file(model, file, plain, srt):
    """
    Parameters
    ----------
    model: Whisper
        The Whisper model instance.

    file: str
        The file path of the file to be transcribed.

    plain: bool
        Whether to save the transcription as a text file or not.

    srt: bool
        Whether to save the transcription as an SRT file or not.
    Returns
    -------
    A dictionary containing the resulting text ("text") and segment-level details ("segments"), and
    the spoken language ("language"), which is detected when `decode_options["language"]` is None.
    """
    file_path = Path(file)
    print(f"Transcribing file: {file_path}\n")

    output_directory = file_path.parent

    # Run Whisper
    result = model.transcribe(file, verbose = False, language = "en")

    if plain:
        txt_path = file_path.with_suffix(".txt")
        print(f"\nCreating text file")

        with open(txt_path, "w", encoding="utf-8") as txt:
            txt.write(result["text"])
    if srt:
        print(f"\nCreating SRT file")
        srt_writer = get_writer("srt", output_directory)
        srt_writer(result, str(file_path.stem))

    return result

def read_lecture_links(file_path):
    """
    Reads the lecture links from the given file and returns them as a dictionary.
    """
    with open(file_path, 'r') as file:
        lines = file.readlines()

    lectures = {}
    for i in range(0, len(lines), 3):  # Assuming each lecture entry is 3 lines (title, URL, empty line)
        title = lines[i].strip()
        url = lines[i + 1].strip()
        if title and url:
            lectures[title] = url
    return lectures

def transcript_exists(lecture_id, transcripts_folder):
    """
    Checks if a transcript file exists for the given lecture ID.
    """
    transcript_file = f"{transcripts_folder}/{lecture_id}.txt"
    return os.path.isfile(transcript_file)

def monitor_lectures(file_path, transcripts_folder="Transcripts", check_interval=10):
    """
    Continuously monitors the lecture file for new entries and ignores lectures that have transcripts.
    """
    print("Monitoring for new lectures...")
    last_checked_lectures = {}
    
    # Use CUDA, if available
    DEVICE = "cuda" if torch.cuda.is_available() else "cpu"
    
    # Load the desired model
    model = whisper.load_model("medium.en").to(DEVICE)

    while True:
        try:
            current_lectures = read_lecture_links(file_path)

            # Check for new lectures
            new_lectures = {k: v for k, v in current_lectures.items() 
                            if k not in last_checked_lectures and not transcript_exists(k, transcripts_folder)}
            if new_lectures:
                print("New lectures found:")
                for title, url in new_lectures.items():
                    print(f"{title}: {url}")
                print("fetching lecture transcript")
                
                file = url
                audio = download_youtube_audio(file)
                plain = True
                srt = False
                # Run Whisper on the audio stream
                result = transcribe_file(model, audio, plain, srt)

            last_checked_lectures = current_lectures

            time.sleep(check_interval)
        except KeyboardInterrupt:
            print("Monitoring stopped.")
            break
        except Exception as e:
            print(f"Error occurred: {e}")
            break

monitor_lectures("lectureLinks.txt")