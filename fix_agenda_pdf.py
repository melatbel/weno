import re

dest_path = 'resources/views/pages/agenda.blade.php'

with open(dest_path, 'r', encoding='utf-8') as f:
    content = f.read()

section_pattern = r'<section class="agenda-light-advanced".*?</section>'

advanced_light_html = """
<section class="agenda-light-advanced" style="padding-top: 140px; padding-bottom: 80px; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); position: relative; min-height: 100vh;">
    <!-- Light decorative elements -->
    <div style="position: absolute; top: -10%; left: -10%; width: 50%; height: 50%; background: radial-gradient(circle, rgba(106, 13, 173, 0.05), transparent 70%); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -10%; right: -5%; width: 40%; height: 60%; background: radial-gradient(circle, rgba(255, 215, 0, 0.08), transparent 70%); border-radius: 50%;"></div>
    
    <div class="container position-relative z-index-2">
        
        <div class="row align-items-center mb-4">
            <div class="col-12 col-md-7 mb-3 mb-md-0 reveal">
                <h1 class="fw-bolder" style="color: #0f172a; font-family: 'Inter', sans-serif; font-size: clamp(2rem, 5vw, 2.8rem); letter-spacing: -1px; margin-bottom: 0;">Wennovate Africa 2026 Agenda</h1>
            </div>
            <div class="col-12 col-md-5 d-flex justify-content-md-end justify-content-start reveal">
                <div class="d-flex align-items-center flex-wrap gap-3">
                    <span style="font-weight: 600; color: #475569; background: #fff; padding: 10px 18px; border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); font-size: 0.95rem; white-space: nowrap;"><i class="far fa-file-pdf text-danger me-2"></i> Page <span id="pdf-page-indicator">1 / ?</span></span>
                    <a href="{{ asset('assets/agenda.pdf') }}" download class="btn" style="background: linear-gradient(135deg, #6a0dad, #FFD700); color: #fff; font-weight: 700; padding: 12px 28px; border-radius: 50px; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 10px 25px rgba(106, 13, 173, 0.2); transition: all 0.3s ease; border: none; white-space: nowrap;"><i class="fas fa-download me-2"></i> Download</a>
                </div>
            </div>
        </div>
        
        <div class="pdf-container-advanced reveal" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 1); border-radius: 24px; padding: 15px; box-shadow: 0 25px 50px rgba(0,0,0,0.05);">
            <div class="browser-mockup-bar" style="display: flex; gap: 8px; padding-bottom: 12px; border-bottom: 1px solid rgba(0,0,0,0.05); margin-bottom: 12px; padding-left: 10px;">
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #ef4444;"></div>
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #f59e0b;"></div>
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #22c55e;"></div>
            </div>
            
            <div id="pdf-scroll-container" style="width: 100%; height: 75vh; overflow-y: auto; overflow-x: hidden; border-radius: 12px; background: #e2e8f0; box-shadow: inset 0 0 20px rgba(0,0,0,0.02); position: relative;">
                <div id="pdf-render-area" style="display: flex; flex-direction: column; align-items: center; padding: 20px; gap: 20px; width: 100%;">
                    <div class="text-center py-5" id="pdf-loading">
                        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem; color: #6a0dad !important;"></div>
                        <p class="mt-3 text-muted fw-bold" style="font-family: 'Inter', sans-serif;">Loading Document...</p>
                        <p class="small text-muted" id="pdf-loading-progress"></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Include PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

    const url = "{{ asset('assets/agenda.pdf') }}";
    const container = document.getElementById('pdf-render-area');
    const scrollContainer = document.getElementById('pdf-scroll-container');
    const indicator = document.getElementById('pdf-page-indicator');
    const loading = document.getElementById('pdf-loading');
    const progressText = document.getElementById('pdf-loading-progress');

    let pdfDoc = null;
    let totalPages = 0;
    let pagesRendered = 0;

    pdfjsLib.getDocument(url).promise.then(function(pdf) {
        pdfDoc = pdf;
        totalPages = pdf.numPages;
        indicator.innerText = `1 / ${totalPages}`;
        
        // Setup placeholders first so that scrolling works instantly
        for (let i = 1; i <= totalPages; i++) {
            const wrapper = document.createElement('div');
            wrapper.className = 'pdf-page-wrapper';
            wrapper.setAttribute('data-page-num', i);
            wrapper.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            wrapper.style.borderRadius = '8px';
            wrapper.style.overflow = 'hidden';
            wrapper.style.backgroundColor = '#fff';
            wrapper.style.width = '100%';
            wrapper.style.maxWidth = '1000px'; 
            wrapper.style.minHeight = '800px'; // guess initial height
            wrapper.style.display = 'flex';
            wrapper.style.justifyContent = 'center';
            wrapper.style.alignItems = 'center';
            
            const canvas = document.createElement('canvas');
            canvas.style.maxWidth = '100%';
            canvas.style.height = 'auto';
            canvas.id = 'page-canvas-' + i;
            
            wrapper.appendChild(canvas);
            container.appendChild(wrapper);
            
            renderPage(i, canvas, wrapper);
        }
        
    }).catch(function(error) {
        loading.innerHTML = '<p class="text-danger fw-bold">Error loading PDF: ' + error.message + '</p><p class="text-muted small">Please check if the file exists at /assets/agenda.pdf</p>';
    });

    function renderPage(pageNum, canvas, wrapper) {
        pdfDoc.getPage(pageNum).then(function(page) {
            const ctx = canvas.getContext('2d');
            
            // For sharp text, we render at 1.5x scale
            const viewport = page.getViewport({scale: 1.5});
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Remove minHeight constraint so it sizes exactly to canvas
            wrapper.style.minHeight = 'auto';

            const renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };

            page.render(renderContext).promise.then(() => {
                pagesRendered++;
                if(pagesRendered === 1) {
                    loading.style.display = 'none';
                } else if(pagesRendered < totalPages) {
                    progressText.innerText = `Rendered ${pagesRendered} of ${totalPages} pages...`;
                }
            });
        });
    }

    // Scroll tracker
    let scrollTimeout;
    scrollContainer.addEventListener('scroll', () => {
        if(scrollTimeout) clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            const wrappers = document.querySelectorAll('.pdf-page-wrapper');
            if(!wrappers.length) return;
            
            let closestPage = 1;
            let minDistance = Infinity;
            
            // Check based on the top 30% of the viewport to feel natural
            const checkPoint = scrollContainer.scrollTop + (scrollContainer.clientHeight * 0.3);

            wrappers.forEach(wrapper => {
                // Determine center of each scaled wrapper relative to container
                const wrapperTop = wrapper.offsetTop; // offset relative to closest positioned ancestor (which is expected to be part of the container layout)
                
                const distance = Math.abs(checkPoint - wrapperTop);
                if (distance < minDistance) {
                    minDistance = distance;
                    closestPage = wrapper.getAttribute('data-page-num');
                }
            });

            indicator.innerText = `${closestPage} / ${totalPages}`;
        }, 50);
    });
});
</script>
"""

new_content, count = re.subn(section_pattern, advanced_light_html, content, flags=re.DOTALL)

if count > 0:
    with open(dest_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Successfully replaced and added PDF.js.")
else:
    print("Regex failed. Trying fallback.")
    # Maybe my previous script left <section class="agenda-light-advanced" without closing script or something
    fallback_pattern = r'<section class="agenda-light-advanced".*?</section>'
    new_content, count2 = re.subn(fallback_pattern, advanced_light_html, content, flags=re.DOTALL)
    if count2 > 0:
        with open(dest_path, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print("Fallback successful.")
    else:
        print("Fallback failed.")
