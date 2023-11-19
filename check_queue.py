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
            queue_gpt()
            print("Successfully added data about queue")

            
def read_file_contents(file_path):
    with open(file_path, 'r') as file:
        return file.read()

def queue_gpt():
    question_content = read_file_contents(question)
    queue_content = read_file_contents(queue)
    combined_prompt = queue_preheader + question_content + queue_postheader + queue_content
    openai.api_key = api_key

    try:
        response = openai.ChatCompletion.create(
            model="gpt-4",
            messages=[
                {"role": "system", "content": "You are a search engine / topic matcher."},
                {"role": "user", "content": combined_prompt}
            ],
            max_tokens=100  # You can adjust this value
        )
    except Exception as e:
        print(f"An error occurred: {e}")
        return

    with open(output_queue, 'w') as file:
        file.write(response.choices[0].message['content'])
        
api_key = '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'
question = 'form-save.txt'
queue = 'queuedata.txt'
output_queue = 'queue.txt'
queue_preheader = "Given the following question, return a single ID where the transcript content matches. ONLY RETURN ONE ID, in the format of just the ID number, and nothing else. An example of a return would be 2. Return a single ID number from the ID’s and their corresponding Question below. If none of the questions match closely, then return nothing. Here is the question: "
queue_postheader = "And choose one ID from the potential ID’s and their Questions below: "

if __name__ == '__main__':
    w = Watcher()
    w.run()
