# Imports
from IT8951 import constants
from IT8951.display import AutoEPDDisplay
from PIL import Image, ImageDraw, ImageFont
from sys import path
from time import sleep
import requests
import datetime

path += ['../../']

# Wrap text
def wrap_text(text, font, max_width):

        # Define lines
        lines = []
        
        # If the text is shorter than given width
        if font.getlength(text) <= max_width:

            # Add the text to the first line
            lines.append(text)

        # If the text is longer than given width
        else:

            # Split text into words
            words = text.split(' ')
            i = 0

            # Iterate through every word in the text
            while i < len(words):

                # Create a new line
                line = ''

                # While the length of the line is less than max
                while i < len(words) and font.getlength(line + words[i]) <= max_width:

                    # Append the current word and an additional space
                    line = line + words[i] + " "
                    i += 1

                # If string is empty
                if not line:

                    # Append the current word
                    line = words[i]
                    i += 1

                # Add line to array
                lines.append(line)

        # Return the lines
        return lines

def get(url):

    try:

        return requests.get(url=url)
    
    except Exception:

        # sleep for a bit in case that helps
        sleep(5)

        # try again
        return get(url)

# Initialize
print('Initializing EPD...')

# Create the display
display = AutoEPDDisplay(vcom=-2.27, rotate='flip', mirror=False, spi_hz=24000000)
epd = display.epd

# System Info
print('System info:')
print('  VCOM set to', display.epd.get_vcom())
print('  display size: {}x{}'.format(epd.width, epd.height))
print('  img buffer address: {:X}'.format(epd.img_buf_address))
print('  firmware version: {}'.format(epd.firmware_version))
print('  LUT version: {}'.format(epd.lut_version))
print()

# Clear display
display.clear()

# API-endpoint
url = "http://climate-control.projecteats.org/data.json"

# Set font size
bigfontsize = 120
smallfontsize = 30

# Set font
bigfont = ImageFont.truetype('fonts/times.ttf', bigfontsize)
smallfont = ImageFont.truetype('fonts/arial.ttf', smallfontsize)

# Create draw object
draw = ImageDraw.Draw(display.frame_buf)

# Set padding
padding = 40

while True:

    # Make GET request
    request = get(url)
    entries = request.json()

    for entry in entries:

        # Timestamp
        timestamp = str(datetime.datetime.fromtimestamp(entry['meta']['time']))
        timestamp = 'Submitted ' + timestamp

        for questionId, response in entry['responses'].items():

            # clear image to white
            display.frame_buf.paste(0xFF, box=(0, 0, display.width, display.height))
            
            # Draw text
            draw.text((padding, display.height - padding - smallfontsize), timestamp, font=smallfont)

            # Add ellipsis to text
            response = '... ' + response + ' ...'

            # Set lines
            lines = wrap_text(response, bigfont, display.width - padding * 2)[:8]

            # Set cursor position
            # cursor_y = (display.height - len(lines) * bigfontsize) / 2
            cursor_y = padding

            for line in lines:

                # Get cursor x
                # cursor_x = (display.width - bigfont.getlength(line)) / 2
                cursor_x = padding

                # Draw text
                draw.text((cursor_x, cursor_y), line, font=bigfont)

                # Update 
                cursor_y += bigfontsize

            # Draw to display
            display.draw_full(constants.DisplayModes.GC16)

            # Sleep
            sleep(20)