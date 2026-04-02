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
    "pages/sponsor-partner.blade.php",
    "pages/about.blade.php"
]

# 1. Update the background to a darker mix of #0a0f3f (dark blue) and #6a0dad (purple)
# 2. Update the text gradient to use #6a0dad, #FFD700, and #0a0f3f

darker_footer_bg = "background: linear-gradient(135deg, #020617, #0a0f3f, #31084d);"
text_gradient = "background: linear-gradient(135deg, #FFD700, #F57C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"
text_gradient_new = "background: linear-gradient(135deg, #6a0dad, #FFD700, #F57C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"

for file in files:
    path = os.path.join(base_dir, file)
    if not os.path.exists(path):
        continue
    
    with open(path, "r", encoding="utf-8") as f:
        content = f.read()

    # The background of .footer
    content = re.sub(
        r"background:\s*linear-gradient\(135deg,\s*#[0-9a-fA-F]{6},\s*#[0-9a-fA-F]{6},\s*#[0-9a-fA-F]{6}\);",
        darker_footer_bg,
        content
    )

    # Replace the text gradients
    content = content.replace(text_gradient, text_gradient_new)
    # Just in case some have the older #6a0dad, #FFD700 instead of #F57C00:
    content = content.replace(
        "background: linear-gradient(135deg, #6a0dad, #FFD700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;",
        text_gradient_new
    )
    
    with open(path, "w", encoding="utf-8") as f:
        f.write(content)

print("Done standardizing footers.")
