import time
import json
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

class Lecture_Watcher:
    DIRECTORY_TO_WATCH = "lresponse.txt"

    def __init__(self):
        self.observer = Observer()
        

    def run(self):
        event_handler = Lecture_Handler()
        self.observer.schedule(event_handler, self.DIRECTORY_TO_WATCH, recursive=True)
        self.observer.start()
        try:
            while True:
                time.sleep(1)
        except:
            self.observer.stop()
            print("Observer Stopped")

        self.observer.join()

class Lecture_Handler(FileSystemEventHandler):

    @staticmethod
    def on_any_event(event):
        if event.is_directory:
            return None

        elif event.event_type == 'modified':
            # Take any action here when a file is modified.
            print(f"Received modified event - {event.src_path}.")
            # Add your code here to execute when the .txt file changes
            output_lecture()      

def output_lecture():
    
    with open("lresponse.txt", 'r') as file:
        file_content = file.read().strip()

    with open("video.txt", 'w') as output_file:  # Open finall.txt in write mode
        # Normalize the file content to handle both formats
        normalized_content = file_content.replace("\n", ", ").replace("ID:", "").strip()
        # Extract IDs from the normalized content
        ids = normalized_content.split(", ")
        for id in ids:
            id = id.strip()  # Remove any leading/trailing whitespace
            if id in lecture_dict:
                lectureID = id[0:2]
                lecture_links = read_links('lectureLinks.json')
                videoLink = lecture_links[lectureID]
                float_value = float(lecture_dict[id][1])
                timestamp = int(float_value)
                output_file.write(videoLink + "&t=" +str(timestamp))  # Write to finall.txt
                
def read_links(file_path):
    with open(file_path, 'r', encoding='utf-8') as file:
        data = json.load(file)
    return data


def parse_transcript(lecture_path):
    transcript_dict = {}
    current_id, current_time, current_transcript = '', 0, ''

    with open(lecture_path, 'r') as file:
        for line in file:
            line = line.strip()
            if line.startswith('ID:'):
                current_id = line.split('ID: ')[1]
            elif line.startswith('Time:'):
                current_time = round(float(line.split('Time: ')[1]))
            elif line.startswith('Transcript:'):
                current_transcript = line.split('Transcript: ')[1]
                transcript_dict[current_id] = (current_transcript, current_time)

    return transcript_dict



# Example usage
lecture_path = 'lectures.txt'
lecture_dict = parse_transcript(lecture_path)


if __name__ == '__main__':
    l = Lecture_Watcher()
    l.run()

    