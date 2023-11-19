import openai
from canvasapi import Canvas


# Initialize a new Canvas object
canvas = Canvas(API_URL, API_KEY)


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
            model="gpt-4",
            messages=[
                {"role": "system", "content": "You are a helpful assistant."},
                {"role": "user", "content": combined_prompt}
            ],
            max_tokens=5000  # You can adjust this value
        )
    except Exception as e:
        print(f"An error occurred: {e}")
        return

    with open(output_file, 'w') as file:
        file.write(response.choices[0].message['content'])

# Example usage
api_key = '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'
key = '9fd2d1a84636415685bcf7dc451040fb'

question = 'question.txt'
piazza = 'piazza.txt'
API_URL = 'https://canvas.it.umich.edu/q9s9dfb10'
API_KEY = '___12398basf818=____'
output_file = 'response.txt'
prompt_preheader = "Given the following question, ONLY RETURN question ID's (up to 5, in the format of a comma seperated ID:{insert question ID}), from all the questions below, that match closely to the question. If none of the questions matches that closely, then return nothing. Here is the question: "
prompt_postheader = " Below are all potential Question ID's for you to return: "
chat_with_gpt(question, piazza, api_key, output_file)
