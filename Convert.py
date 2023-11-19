import re

def convert_vtt_to_txt(vtt_file_path, output_file_path, word_limit=30):
    def parse_time(vtt_time):
        # Adjusted regex to match the VTT time format
        parts = vtt_time.split(':')

        minutes = int(parts[0])
        seconds = float(parts[1])  # Convert to float to handle optional milliseconds
        total_seconds = minutes * 60 + int(seconds)  # Convert to integer seconds
    
        return total_seconds

    with open(vtt_file_path, 'r', encoding='utf-8') as file:
        lines = file.readlines()

    # Skip the header line if it's a VTT file
    if lines[0].strip().startswith("WEBVTT"):
        lines = lines[1:]

    vtt_content = ''.join(lines)
    blocks = re.split(r'\n\s*\n', vtt_content.strip(), flags=re.DOTALL)
    combined_blocks = []
    current_block = []
    current_word_count = 0
    earliest_time = None

    for block in blocks:
        lines = block.split('\n')
        if len(lines) >= 2:
            start_time = parse_time(lines[0].split(' --> ')[0])
            print(lines[0].split(' --> ')[0])
            transcript = ' '.join(lines[1:])
            word_count = len(transcript.split())

            if current_word_count + word_count > word_limit or (current_block and transcript.endswith('.')):
                combined_blocks.append((earliest_time, ' '.join(current_block)))
                current_block = []
                current_word_count = 0
                earliest_time = None

            current_block.append(transcript)
            current_word_count += word_count
            if earliest_time is None:
                earliest_time = start_time

    if current_block:
        combined_blocks.append((earliest_time, ' '.join(current_block)))

    with open(output_file_path, 'w', encoding='utf-8') as output_file:
        for i, (time, text) in enumerate(combined_blocks, 1):
            if not text.endswith('.'):
                text += '.'
            output_file.write(f"ID: L7{i}\n")
            output_file.write(f"Time: {time}\n")
            output_file.write(f"Transcript: {text}\n\n")

# Example usage
convert_vtt_to_txt('SRTs/12.vtt', 'Transcripts/Lecture.txt')