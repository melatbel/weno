import re
import os

welcome_path = 'resources/views/welcome.blade.php'
agenda_path = 'resources/views/pages/agenda.blade.php'

with open(welcome_path, 'r', encoding='utf-8') as f:
    welcome_content = f.read()

# Extract header HTML + script + styles
# The header block starts with <header id="topnav" and ends with the ending </style> block before the welcome section
header_match = re.search(r'(<header id="topnav".*?)(<section class="bg-half-260)', welcome_content, re.DOTALL)
if not header_match:
    print("Could not extract header from welcome.blade.php")
    exit(1)
header_block = header_match.group(1).strip()

# Change the active class from Home to Agenda in the extracted block
# Wait, in welcome.blade.php there might not be an active class for Home right now
# We will just insert class="nav-link active" for Agenda, and remove it from everywhere else
header_block = re.sub(r'(href="\{\{\s*url\(\'\/agenda\'\)\s*\}\}"[^>]*class="[^"]*)', r'\1 active', header_block)


# Extract footer HTML + styles
# The footer block starts at <footer class="footer"> and ends before the scripts
footer_match = re.search(r'(<footer class="footer">.*?</style>)', welcome_content, re.DOTALL)
if not footer_match:
    print("Could not extract footer from welcome.blade.php")
    exit(1)
footer_block = footer_match.group(1).strip()

with open(agenda_path, 'r', encoding='utf-8') as f:
    agenda_content = f.read()

# Replace header in agenda.blade.php
# Replace from <header id="topnav" ... to </header>
agenda_content = re.sub(r'<header id="topnav".*?</header>', header_block, agenda_content, flags=re.DOTALL)

# Insert footer before </body>
agenda_content = agenda_content.replace('</body>', f'\n{footer_block}\n</body>')

with open(agenda_path, 'w', encoding='utf-8') as f:
    f.write(agenda_content)

print("Successfully applied layout to agenda.blade.php")
