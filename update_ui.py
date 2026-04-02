import os
import re

base_dir = r"c:\Users\Henok Belay\Desktop\wennovate2026\wennovate\resources\views"
files = [
    "welcome.blade.php",
    "pages/dashboard.blade.php",
    "pages/contact.blade.php",
    "pages/agenda.blade.php",
    "pages/past-event-1.blade.php",
    "pages/past-event-2.blade.php",
    "pages/register.blade.php",
    "pages/ubora-challenge.blade.php",
    "pages/what-to-expect.blade.php",
    "pages/sponsor-partner.blade.php"
]

for file in files:
    path = os.path.join(base_dir, file)
    if not os.path.exists(path):
        continue
    
    with open(path, "r", encoding="utf-8") as f:
        content = f.read()
        
    # 1. Navbar URL
    content = content.replace("url('/#about')", "url('/about')")
    
    # 2. Email Address in footer
    content = re.sub(r'wennovate2021@gmail\.com', 'summit@wennovate.africa', content, flags=re.IGNORECASE)
    
    # 3. Footer Dark Background
    content = content.replace(
        "background: linear-gradient(135deg, #020617, #0f172a, #1E3A8A);", 
        "background: linear-gradient(135deg, #01030b, #070b15, #0f172a);"
    )
    
    # 4. Wave element darker
    wave_old = "background: linear-gradient(90deg, #1E3A8A, #2563EB, #3B82F6, #1E3A8A);\n        opacity: 0.25;"
    wave_new = "background: linear-gradient(90deg, #0f172a, #1E3A8A, #2563EB, #0f172a);\n        opacity: 0.1;"
    content = content.replace(wave_old, wave_new)
    
    # 5. Gradient Texts for Titles and Logo
    logo_old = r"(?s)(\.footer-logo\s*\{.*?)color:\s*#3B82F6;(.*?text-shadow:\s*0\s*0\s*20px\s*rgba\(59,130,246,0\.8\);.*?)\}"
    logo_new = r"\1background: linear-gradient(135deg, #FFD700, #F57C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;\2}"
    content = re.sub(logo_old, logo_new, content)
    
    # Now remove the text-shadow from footer-logo since it messes up transparent text fill
    content = re.sub(r'text-shadow:\s*0\s*0\s*20px\s*rgba\(59,130,246,0\.8\);', '/* removed text shadow */', content)
    content = re.sub(r'@keyframes glowText\s*\{([^\}]*)\}', '/* text shadow removed for transparent gradient */', content)
    
    h4_colors = [r'\.footer-links\s*h4', r'\.footer-contact\s*h4', r'\.footer-newsletter\s*h4']
    for selector in h4_colors:
        # replace color: #3B82F6; with background gradient
        regex = r"(%s\s*\{[^\}]*)color:\s*#3B82F6;" % selector
        new_str = r"\1background: linear-gradient(135deg, #FFD700, #F57C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"
        content = re.sub(regex, new_str, content)

    with open(path, "w", encoding="utf-8") as f:
        f.write(content)

print("Done updating files.")
