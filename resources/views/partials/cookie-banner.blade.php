<!-- ================= COOKIE CONSENT BANNER ================= -->
<div id="cookieConsentBanner" class="cookie-banner-glass hidden-out">
    <div class="cookie-banner-content" style="position: relative;">
        <button class="btn-close-cookie" aria-label="Close" onclick="closeCookieBanner()">&times;</button>
        <h4 class="cookie-title">This website uses cookies</h4>
        <p class="cookie-text">
            We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We also share information about your use of our site with our social media, advertising and analytics partners who may combine it with other information that you’ve provided to them or that they’ve collected from your use of their services.
        </p>
        <div class="cookie-buttons">
            <button class="btn-cookie-allow" onclick="acceptCookies()">Allow all</button>
        </div>
    </div>
</div>

<style>
.cookie-banner-glass {
    position: fixed;
    bottom: 20px;
    left: 20px;
    max-width: 480px;
    background: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    z-index: 9999;
    color: #fff;
    transform: translateY(150%);
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.6s;
    opacity: 0;
}
.cookie-banner-glass.show {
    transform: translateY(0);
    opacity: 1;
}
.cookie-banner-glass.hidden-out {
    transform: translateY(150%);
    opacity: 0;
    pointer-events: none;
}
.cookie-title {
    font-size: 1.4rem;
    font-weight: 900;
    margin-bottom: 12px;
    color: #fff;
}
.cookie-text {
    font-size: 0.95rem;
    line-height: 1.6;
    color: rgba(255,255,255,0.75);
    margin-bottom: 25px;
}
.cookie-buttons {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    align-items: center;
}
.btn-close-cookie {
    position: absolute;
    top: -10px;
    right: -10px;
    background: transparent;
    border: none;
    color: rgba(255,255,255,0.5);
    font-size: 1.8rem;
    line-height: 1;
    cursor: pointer;
    transition: color 0.3s ease;
}
.btn-close-cookie:hover {
    color: #fff;
}
.btn-cookie-allow {
    background: linear-gradient(135deg, #FFD700, #F57C00);
    color: #000;
    border: none;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 800;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
}
.btn-cookie-allow:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 20px rgba(255, 215, 0, 0.5);
    background: linear-gradient(135deg, #fff, #f0f0f0); 
}
@media (max-width: 576px) {
    .cookie-banner-glass {
        bottom: 15px; left: 15px; right: 15px; max-width: none;
        padding: 20px;
    }
    .cookie-buttons {
        flex-direction: column;
        width: 100%;
    }
    .btn-cookie-allow { 
        width: 100%; 
        text-align: center; 
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const banner = document.getElementById("cookieConsentBanner");
    if(!banner) return;
    
    // Check local storage specific to the current browser
    if (!localStorage.getItem("cookie_consent_accepted")) {
        // Slight delay for smooth entrance animation after page load
        setTimeout(() => {
            banner.classList.remove("hidden-out");
            banner.classList.add("show");
        }, 1000);
    } else {
        banner.style.display = 'none';
    }
});

function acceptCookies() {
    const banner = document.getElementById("cookieConsentBanner");
    localStorage.setItem("cookie_consent_accepted", "true");
    closeCookieBanner();
}

function closeCookieBanner() {
    const banner = document.getElementById("cookieConsentBanner");
    banner.classList.remove("show");
    banner.classList.add("hidden-out");
    setTimeout(() => {
        banner.style.display = 'none';
    }, 600);
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const handleSub = (formId, emailId, btnId, feedbackId) => {
        const form = document.getElementById(formId);
        if (!form) return;
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = document.getElementById(emailId);
            const btn = document.getElementById(btnId);
            const feedback = document.getElementById(feedbackId);
            
            const originalText = btn.innerText;
            btn.innerText = 'Subscribing...';
            btn.disabled = true;
            feedback.style.display = 'none';

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('email', emailInput.value);

            fetch("{{ url('/subscribe-submit') }}", {
                method: 'POST',
                body: formData
            })
            .then(r => r.json())
            .then(data => {
                feedback.style.display = 'block';
                if (data.success) {
                    feedback.style.backgroundColor = 'rgba(34, 197, 94, 0.2)';
                    feedback.style.color = '#4ade80';
                    feedback.innerText = data.message || 'Thank you for subscribing!';
                    form.reset();
                } else {
                    feedback.style.backgroundColor = 'rgba(239, 68, 68, 0.2)';
                    feedback.style.color = '#f87171';
                    feedback.innerText = data.message || 'Error subscribing. Try again.';
                }
            })
            .catch(() => {
                feedback.style.display = 'block';
                feedback.style.backgroundColor = 'rgba(239, 68, 68, 0.2)';
                feedback.style.color = '#f87171';
                feedback.innerText = 'An error occurred. Please try again.';
            })
            .finally(() => {
                btn.innerText = originalText;
                btn.disabled = false;
            });
        });
    };

    handleSub('newsletterForm', 'newsletterEmail', 'newsletterBtn', 'newsletterFeedback');
    handleSub('stayUpdatedForm', 'stayUpdatedEmail', 'stayUpdatedBtn', 'stayUpdatedFeedback');
});
</script>
<!-- ================= END COOKIE CONSENT BANNER ================= -->
