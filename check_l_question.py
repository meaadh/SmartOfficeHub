import time
import openai

from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

class Watcher:
    DIRECTORY_TO_WATCH = "c:/xampp/htdocs/SmartOfficeHub/form-save.txt"

    def __init__(self):
        self.observer = Observer()

    def run(self):
        event_handler = Handler()
        self.observer.schedule(event_handler, self.DIRECTORY_TO_WATCH, recursive=True)
        self.observer.start()
        try:
            while True:
                time.sleep(5)
        except:
            self.observer.stop()
            print("Observer Stopped")

        self.observer.join()

class Handler(FileSystemEventHandler):

    @staticmethod
    def on_any_event(event):
        if event.is_directory:
            return None

        elif event.event_type == 'modified':
            # Take any action here when a file is modified.
            print(f"Received modified event - {event.src_path}.")
            # Add your code here to execute when the .txt file changes
            # Return all lecture matches.
            lecture_gpt (question, lecture, api_key, output_lecture)
            print(f"Successfully edited file for lectures")

def read_file_contents(file_path):
    with open(file_path, 'r') as file:
        return file.read()

def lecture_gpt(question, lecture, api_key, output_lecture):
    question_content = read_file_contents(question)
    lecture_content = read_file_contents(lecture)
    combined_prompt = lecture_preheader + question_content + lecture_postheader + lecture_content
    openai.api_key = api_key

    try:
        response = openai.ChatCompletion.create(
            model="gpt-4-1106-preview",
            messages=[
                {"role": "system", "content": "You are a search engine / topic matcher."},
                {"role": "user", "content": combined_prompt}
            ],
            max_tokens=100  # You can adjust this value
        )
    except Exception as e:
        print(f"An error occurred: {e}")
        return

    with open(output_lecture, 'w') as file:
        file.write(response.choices[0].message['content'])

# Example usage
api_key = ''
question = 'form-save.txt'
lecture = 'lectures.txt'
output_lecture = 'lresponse.txt'
lecture_preheader = "Given the following question, return a single ID where the Transcript content matches. ONLY RETURN ONE ID, in the format 'ID:{insert question ID}). The transcripts come from lectures, where each transcript with the same most significant digit in their ID comes from the same lecture, and thus are conceptually consistent. Return a single ID from all the transcripts below, that match closely to the type of sort asked in the question. If none of the questions matches that closely, then return nothing. Here is the question: "
lecture_postheader = " Below are all ID's and corresponding Transcripts for you to analyze and return: "

if __name__ == '__main__':
    w = Watcher()
    w.run()


