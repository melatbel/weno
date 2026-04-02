import re

dest_path = 'resources/views/pages/agenda.blade.php'

with open(dest_path, 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Replace the advanced section with the native simple section
section_pattern = r'<div class="row mb-5">.*?<!-- Controls directly above the PDF box -->.*?</section>'
# Wait, my last modification replaced `<div class="row align-items-center mb-4">` natively inside the `<section>` and it might have altered the `<section class="agenda-light-advanced">` tag itself?
# Let's just reliably match from <section class="agenda-light-advanced" (which is still there) down to </section>
section_pattern_alt = r'<section class="agenda-light-advanced".*?</section>'

native_html = """
<div class="agenda-container" style="padding-top: 140px; padding-bottom: 80px; background-color: #ffffff; min-height: 100vh;">
    <div class="container">
        <!-- Registration text centered -->
        <h3 class="text-center fw-bolder mb-5" style="color: #1e3a8a; letter-spacing: 0.5px; text-transform: uppercase;">REGISTRATION AT 08:00 AM SAST</h3>

        <!-- Title and Download row -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <i class="fas fa-file-pdf fs-3 me-3" style="color: #94a3b8;"></i>
                <h4 class="m-0 fw-bold" style="color: #f59e0b; text-transform: uppercase; font-family: 'Inter', sans-serif;">WENNOVATE AFRICA 2026 - AGENDA</h4>
            </div>
            <a href="{{ asset('assets/agenda.pdf') }}" download class="btn" style="background-color: #0f172a; color: #ffffff; font-weight: 700; padding: 10px 30px; border-radius: 4px; font-size: 1.1rem; border: none; transition: 0.3s; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">Download</a>
        </div>

        <!-- Native PDF Iframe without toolbar hiding -->
        <div style="width: 100%; height: 85vh; border: 1px solid #cbd5e1; background: #f8fafc;">
            <iframe src="{{ asset('assets/agenda.pdf') }}" style="width: 100%; height: 100%; border: none;"></iframe>
        </div>
    </div>
</div>
"""

new_content, count = re.subn(section_pattern_alt, native_html, content, flags=re.DOTALL)

# 2. Remove PDF.js script block
pdf_js_script_pattern = r'<!-- Include PDF\.js -->.*?</script>\s*<script>.*?</script>'
# Just in case "<!-- Include PDF.js -->" isn't matched perfectly, let's remove pdfjs related script.
pdf_script = r'<script src="https://cdnjs\.cloudflare\.com/ajax/libs/pdf\.js/3\.4\.120/pdf\.min\.js"></script>\s*<script>.*?pdfjsLib.*?pdf-render-area.*?</script>'
new_content, _ = re.subn(pdf_script, '', new_content, flags=re.DOTALL)

if count > 0:
    with open(dest_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Successfully replicated reference UI.")
else:
    print("Failed to replace section. Please verify patterns.")
