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

file_path = 'piazza.txt'
qa_dictionary = parser(file_path)

