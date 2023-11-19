import time
import openai

from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

class Watcher:
    DIRECTORY_TO_WATCH = "form-save.txt"

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
            # Return all piazza matches.
            chat_with_gpt(question, piazza, api_key, output_file)
            print(f"Successfully edited file for piazza")

def read_file_contents(file_path):
    with open(file_path, 'r') as file:
        return file.read()

def chat_with_gpt(question, piazza, api_key, output_file):
    question_content = read_file_contents(question)
    piazza_content = read_file_contents(piazza)
    combined_prompt = prompt_preheader + question_content + prompt_postheader + piazza_content
    openai.api_key = api_key

    try:
        response = openai.ChatCompletion.create(
            model="gpt-4-1106-preview",
            messages=[
                {"role": "system", "content": "You are an accurate search engine / topic finder."},
                {"role": "user", "content": combined_prompt}
            ],
            max_tokens=100  # You can adjust this value
        )
    except Exception as e:
        print(f"An error occurred: {e}")
        return

    with open(output_file, 'w') as file:
        file.write(response.choices[0].message['content'])

# Example usage
api_key = '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'
question = 'form-save.txt'
piazza = 'piazzadata.txt'
output_file = 'response.txt'
prompt_preheader = "Given the following question, return up to 5 ID’s where the question and answer content strongly matches the given question. ONLY RETURN UP TO 5 ID's, in the format 'ID:{insert question ID}, ID:{insert question ID}, etc.' for multiple or ‘'ID:{insert question ID},’ for a single ID. Keep all results on the same line. Return up to 5 ID’s from all the ID’s and their corresponding questions and answers that match very closely to the question. If none of the questions matches that closely, then return nothing. Here is the question: "
prompt_postheader = " Below are all potential ID's with their corresponding questions and answers for you to return up to 5 of: "

if __name__ == '__main__':
    w = Watcher()
    w.run()


