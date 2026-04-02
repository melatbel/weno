import glob
import re

files = glob.glob('resources/views/pages/*.blade.php')

for file in files:
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()

    # Match wrapped links (in case there are any variants)
    # Match unwrapped links: <a href="{{ url('/agenda') }}" class="nav-link">Agenda</a>
    
    # Let's match any block starting with Agenda link ending with About link
    # We will swap the two elements.
    
    # Generic regex for Agenda element (either <li><a>...</a></li> or <a>...</a>)
    # followed by whitespace
    # followed by About element
    
    pattern1 = r'((?:<li[^>]*>\s*)?<a[^>]*href="\{\{\s*url\(\'/agenda\'\)\s*\}\}"[^>]*>Agenda</a>(?:</li>)?)(\s*)((?:<li[^>]*>\s*)?<a[^>]*href="\{\{\s*url\(\'/#about\'\)\s*\}\}"[^>]*>About</a>(?:</li>)?)'
    
    content = re.sub(pattern1, r'\3\2\1', content, flags=re.IGNORECASE)

    # Some templates might use active classes. If one of them has 'active', it will just move with it. That's fine.

    with open(file, 'w', encoding='utf-8') as f:
        f.write(content)

print("Reordered unwrapped navigation links in all pages.")
