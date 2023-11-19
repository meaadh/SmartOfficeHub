import time
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

class Watcher:
    DIRECTORY_TO_WATCH = "response.txt"

    def __init__(self):
        self.observer = Observer()
        

    def run(self):
        event_handler = Handler()
        self.observer.schedule(event_handler, self.DIRECTORY_TO_WATCH, recursive=True)
        self.observer.start()
        try:
            while True:
                time.sleep(1)
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
            output_qa()

def parser(file_path):
    with open(file_path, 'r') as file:
        lines = file.readlines()

    qa_dict = {}
    current_id, question, answer = '', '', ''
    for line in lines:
        line = line.strip()
        if line.startswith('Question ID:'):
            current_id = line.split(': ')[1]
        elif line.startswith('Question:'):
            question = line.split(': ')[1]
        elif line.startswith('Answer:'):
            answer = line.split(': ')[1]
            combined = "Question: " + question + " Anwser: " + answer
            qa_dict[current_id] = (combined, question, answer)

    return qa_dict

def output_qa():
    with open("response.txt", 'r') as file:
        file_content = file.read().strip()

    with open("piazza.txt", 'w') as output_file:  # Open finalr.txt in write mode
        # Normalize the file content to handle trailing commas
        normalized_content = file_content.replace("ID:", "").replace(",", "").strip()
        # Extract IDs from the normalized content
        id_entries = normalized_content.split()
        for id in id_entries:
            id = id.strip()  # Remove any leading/trailing whitespace
            if id in qa_dict:
                output_file.write(f"ID: {id}, Values: {qa_dict[id]}\n")  # Write to finalr.txt



file_path = 'piazzadata.txt'
qa_dict = parser(file_path)

if __name__ == '__main__':
    w = Watcher()
    w.run()

