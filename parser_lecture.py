def parse_transcript(file_path):
    transcript_dict = {}
    current_id, current_time, current_transcript = '', 0, ''

    with open(file_path, 'r') as file:
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
file_path = 'lectures.txt'
transcript_dictionary = parse_transcript(file_path)
print(transcript_dictionary)
