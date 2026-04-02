import re
import os

source_path = 'resources/views/pages/what-to-expect.blade.php'
dest_path = 'resources/views/pages/agenda.blade.php'

with open(source_path, 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Title replacement
content = re.sub(
    r'<title>.*?</title>',
    r'<title>\n        Agenda - Wennovate Africa\n    </title>',
    content,
    flags=re.DOTALL
)

# 2. Extract and replace the section
# Locate <section class="summit-section"> to </section>
section_pattern = r'<section class="summit-section">.*?</section>'

hero_html = """<section class="summit-section" style="position: relative; overflow: hidden; padding-top: 150px; padding-bottom: 100px; background: radial-gradient(circle at 50% 0%, #1a0b2e, #000000);">
    <div class="blob blob-1" style="background: radial-gradient(circle, #6a0dad, transparent 70%);"></div>
    <div class="blob blob-2" style="background: radial-gradient(circle, #FFD700, transparent 70%); left: auto; right: -200px; top: auto; bottom: -200px;"></div>
    
    <div class="container position-relative z-index-2">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h1 class="section-title reveal text-white" style="font-size: 3.5rem; font-weight: 800; background: linear-gradient(to right, #fff, #FFD700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Official Summit Agenda</h1>
                <p class="section-subtitle reveal mx-auto" style="font-size: 1.25rem; max-width: 700px; color: #cbd5e1; margin-top: 20px;">
                    Explore the comprehensive schedule of events, keynote sessions, and networking opportunities at Wennovate Africa 2026.
                </p>
                <div class="mt-4 reveal">
                    <a href="{{ asset('assets/agenda.pdf') }}" download class="btn" style="background: linear-gradient(135deg, #FFD700, #ff8c00); color: #000; font-weight: 700; padding: 12px 30px; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3); text-decoration: none; display: inline-block;"><i class="fas fa-download me-2"></i> Download PDF</a>
                </div>
            </div>
            
            <div class="col-lg-10 reveal">
                <div class="pdf-container-advanced" style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 24px; padding: 20px; box-shadow: 0 30px 60px rgba(0,0,0,0.5);">
                    <div class="browser-mockup-bar" style="display: flex; gap: 8px; padding-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.05); margin-bottom: 15px;">
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #ef4444;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #f59e0b;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #22c55e;"></div>
                    </div>
                    <iframe src="{{ asset('assets/agenda.pdf') }}#toolbar=0&navpanes=0&scrollbar=0" class="pdf-viewer" style="width: 100%; height: 75vh; border: none; border-radius: 12px; background: #fff;"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>"""

content = re.sub(section_pattern, hero_html, content, flags=re.DOTALL)

# 3. Replace tracker script that would throw errors
script_pattern = r'<script>\s*// 1\. SCROLL REVEAL OBSERVER.*?</script>'

good_script = """<script>
    // 1. SCROLL REVEAL OBSERVER
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
    });

    revealElements.forEach(el => revealObserver.observe(el));
</script>"""

content = re.sub(script_pattern, good_script, content, flags=re.DOTALL)

with open(dest_path, 'w', encoding='utf-8') as f:
    f.write(content)

print("Generated advanced agenda page successfully.")
