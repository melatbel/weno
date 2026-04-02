import re

dest_path = 'resources/views/pages/agenda.blade.php'

with open(dest_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the summit-section
section_pattern = r'<section class="summit-section" style="position: relative; overflow: hidden; padding-top: 150px; padding-bottom: 100px; background: radial-gradient\(circle at 50% 0%, #1a0b2e, #000000\);">.*?</section>'

simple_html = """
    <style>
        .agenda-container {
            padding: 140px 0 60px 0;
            min-height: 100vh;
            background: #f8fafc;
        }
        .pdf-viewer {
            width: 100%;
            height: 80vh;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-radius: 12px;
            background: #fff;
        }
        .btn-download-pdf {
            background: linear-gradient(135deg, #6a0dad, #FFD700); 
            color: #fff !important; 
            font-weight: 700; 
            padding: 12px 24px;
            border-radius: 8px; 
            text-decoration: none; 
            transition: 0.3s;
            border: none;
        }
        .btn-download-pdf:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 4px 12px rgba(0,0,0,0.2); 
            color: #fff;
        }
    </style>
    
    <div class="agenda-container">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bolder text-uppercase m-0" style="color: #0f172a; font-family: 'Inter', sans-serif;">Wennovate Africa 2026 Agenda</h2>
                <a href="{{ asset('assets/agenda.pdf') }}" download class="btn-download-pdf d-flex align-items-center gap-2">
                    Download PDF
                </a>
            </div>
            
            <iframe src="{{ asset('assets/agenda.pdf') }}#toolbar=0&navpanes=0&scrollbar=0" class="pdf-viewer"></iframe>
        </div>
    </div>
"""

content = re.sub(section_pattern, simple_html, content, flags=re.DOTALL)

with open(dest_path, 'w', encoding='utf-8') as f:
    f.write(content)

print("Reverted agenda to simple UI successfully.")
