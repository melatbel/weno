import re

dest_path = 'resources/views/pages/agenda.blade.php'

with open(dest_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the simple agenda container we created previously
# Because we injected it with <style> and <div class="agenda-container"> ... 
# We'll just replace everything from <style>.*agenda-container.*<div class="agenda-container"> to the end of its div.
# Actually, since it's the only <div class="agenda-container">, we can use regex to find
# the <style> that precedes it and the whole div block.
# Wait, safer is to just replace between <script> revealObserver block and nav-scrolled script.
# Let's see the structure of agenda.blade.php currently.
# We know it has:
# <script>
#     // 1. SCROLL REVEAL OBSERVER
# ...
# </script>
# Actually, the SCROLL REVEAL OBSERVER is after the section!

# In the last rollback, I replaced the <section class="summit-section" ...> with <style>...</style><div class="agenda-container">...</div>
# Let's just find that block and replace it.
section_pattern = r'<style>\s*\.agenda-container \{.*?</style>\s*<div class="agenda-container">.*?</div>\s*</div>'
# Wait, the closing tags were:
#         </div>
#     </div>
# """
section_pattern = r'<style>\s*\.agenda-container \{.*?</style>\s*<div class="agenda-container">.*?</iframe>\s*</div>\s*</div>'

advanced_light_html = """
<section class="agenda-light-advanced" style="padding-top: 140px; padding-bottom: 80px; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); position: relative; min-height: 100vh;">
    <!-- Light decorative elements -->
    <div style="position: absolute; top: -10%; left: -10%; width: 50%; height: 50%; background: radial-gradient(circle, rgba(106, 13, 173, 0.05), transparent 70%); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -10%; right: -5%; width: 40%; height: 60%; background: radial-gradient(circle, rgba(255, 215, 0, 0.08), transparent 70%); border-radius: 50%;"></div>
    
    <div class="container position-relative z-index-2">
        
        <div class="row align-items-end mb-4">
            <div class="col-lg-8 col-md-7 reveal">
                <h1 class="fw-bolder" style="color: #0f172a; font-family: 'Inter', sans-serif; font-size: 2.8rem; letter-spacing: -1px; margin-bottom: 0;">Wennovate Africa 2026 Agenda</h1>
            </div>
            <div class="col-lg-4 col-md-5 text-md-end mt-4 mt-md-0 d-flex flex-column align-items-md-end reveal">
                <div class="d-flex align-items-center justify-content-md-end gap-3 mb-2">
                    <span style="font-weight: 600; color: #475569; background: #fff; padding: 10px 18px; border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); font-size: 0.95rem;"><i class="far fa-file-pdf text-danger me-2"></i> 1/7 page</span>
                    <a href="{{ asset('assets/agenda.pdf') }}" download class="btn" style="background: linear-gradient(135deg, #6a0dad, #FFD700); color: #fff; font-weight: 700; padding: 12px 28px; border-radius: 50px; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 10px 25px rgba(106, 13, 173, 0.2); transition: all 0.3s ease; border: none;"><i class="fas fa-download me-2"></i> Download</a>
                </div>
            </div>
        </div>
        
        <div class="pdf-container-advanced reveal" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 1); border-radius: 24px; padding: 15px; box-shadow: 0 25px 50px rgba(0,0,0,0.05);">
            <div class="browser-mockup-bar" style="display: flex; gap: 8px; padding-bottom: 12px; border-bottom: 1px solid rgba(0,0,0,0.05); margin-bottom: 12px; padding-left: 10px;">
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #ef4444;"></div>
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #f59e0b;"></div>
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #22c55e;"></div>
            </div>
            <iframe src="{{ asset('assets/agenda.pdf') }}#toolbar=0&navpanes=0&scrollbar=0" class="pdf-viewer" style="width: 100%; height: 75vh; border: none; border-radius: 12px; background: #fff; box-shadow: inset 0 0 20px rgba(0,0,0,0.02);"></iframe>
        </div>

    </div>
</section>
"""

new_content, count = re.subn(section_pattern, advanced_light_html, content, flags=re.DOTALL)

if count == 0:
    print("Failed to replace. Using fallback regex.")
    # Fallback: maybe the style wasn't matched exactly
    fallback_pattern = r'<style>.*?agenda-container.*?</div>\s*</div>\s*</div>'
    new_content, count2 = re.subn(fallback_pattern, advanced_light_html, content, flags=re.DOTALL)
    if count2 == 0:
        # Fallback 2: just find <div class="agenda-container"> to the end of the div
        fallback_pattern_3 = r'<div class="agenda-container">.*?</div>\s*</div>'
        new_content, count3 = re.subn(fallback_pattern_3, advanced_light_html, content, flags=re.DOTALL)
        if count3 > 0:
            print("Successfully replaced using fallback 3.")
    else:
        print("Successfully replaced using fallback.")
else:
    print("Successfully replaced.")

with open(dest_path, 'w', encoding='utf-8') as f:
    f.write(new_content)
