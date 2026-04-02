import os

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
    "pages/sponsor-partner.blade.php",
    "pages/about.blade.php"
]

target_old = "background: linear-gradient(135deg, #FFD700, #F57C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"
target_new = "background: linear-gradient(135deg, #6a0dad, #FFD700, #F57C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"

for file in files:
    path = os.path.join(base_dir, file)
    if not os.path.exists(path):
        continue
    
    with open(path, "r", encoding="utf-8") as f:
        content = f.read()
        
    content = content.replace(target_old, target_new)

    with open(path, "w", encoding="utf-8") as f:
        f.write(content)

print("Done updating footers to include purple.")
