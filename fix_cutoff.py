with open("resources/views/welcome.blade.php", "r", encoding="utf-8") as f:
    content = f.read()

nav_container_orig = """            .navigation-container {
                position: fixed; 
                top: 0; 
                right: 0; 
                width: 100%; 
                height: 100vh;
                background: radial-gradient(circle at top right, #1a0b2e 0%, #000000 100%);"""

nav_container_fixed = """            .navigation-container {
                position: fixed !important; 
                top: 0 !important; 
                right: 0; 
                width: 100% !important; 
                height: 100vh !important;
                max-height: 100vh !important;
                overflow: hidden !important;
                background: radial-gradient(circle at top right, #1a0b2e 0%, #000000 100%) !important;"""

if nav_container_orig in content:
    content = content.replace(nav_container_orig, nav_container_fixed)
    print("Fixed CSS max-height cutoff in welcome.blade.php")
else:
    # Use regex in case spacing differs
    import re
    content = re.sub(
        r'(\.navigation-container\s*\{\s*position:\s*fixed;.*?)(z-index: 1500;)', 
        r'\1max-height: 100vh !important; overflow: hidden !important; \2', 
        content, 
        flags=re.DOTALL
    )
    print("Fixed via regex fallback.")

with open("resources/views/welcome.blade.php", "w", encoding="utf-8") as f:
    f.write(content)
