import re

dest_path = 'resources/views/pages/agenda.blade.php'

with open(dest_path, 'r', encoding='utf-8') as f:
    content = f.read()

pattern = r'<div class="agenda-container".*?</div>\s*</div>\s*</div>'

html_replacement = """
<div class="agenda-container" style="padding-top: 140px; padding-bottom: 80px; background-color: #ffffff; min-height: 100vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Title and Download row with explicit bottom margin to prevent overlap -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center" style="margin-bottom: 25px;">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <i class="fas fa-file-pdf me-3" style="color: #94a3b8; font-size: 2rem;"></i>
                <h3 class="m-0 fw-bolder" style="color: #000000; text-transform: uppercase; font-family: 'Inter', sans-serif;">WENNOVATE AFRICA 2026 - AGENDA</h3>
            </div>
            <a href="{{ asset('assets/agenda.pdf') }}" download class="btn d-inline-block" style="background-color: #0f172a; color: #ffffff; font-weight: 700; padding: 12px 35px; border-radius: 4px; font-size: 1.1rem; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">Download</a>
        </div>

        <!-- Native PDF Iframe correctly constrained in width -->
        <div style="width: 100%; height: 80vh; border: 1px solid #cbd5e1; background: #323639; border-radius: 4px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
            <iframe src="{{ asset('assets/agenda.pdf') }}" style="width: 100%; height: 100%; border: none;"></iframe>
        </div>
        
    </div>
</div>
"""

new_content, count = re.subn(pattern, html_replacement, content, flags=re.DOTALL)

if count > 0:
    with open(dest_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Successfully fixed final UI constraints.")
else:
    print("Fallback failed.")
