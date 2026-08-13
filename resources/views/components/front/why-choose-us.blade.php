<section class="why-choose-section">
    <div class="container">
        <div class="text-center mb-5 section-header">
            <span class="subtitle">Elevate Your Lifestyle</span>
            <h2>Why My Fitness?</h2>
            <div style="max-width: 1100px; margin: 0 auto; text-align: left; color: var(--brand-text-muted); line-height: 1.7; font-size: 1.1rem;">
                <p>
                    At My Fitness.ae, we bring fitness, wellness, and recovery services right to your doorstep—making it easier than ever to stay active, healthy, and stress-free in Dubai and Abu Dhabi. Whether you're looking for personal training at home, yoga sessions, a relaxing massage, spors coaching or other fitness services, our platform connects you with certified fitness professionals, yoga instructors, and massage therapists ready to support your wellness goals.
                </p>
                <p style="margin-top: 15px;">
                    We understand that life gets busy, which is why we offer on-demand services designed to fit your schedule. Whether you're a working professional, a busy parent, or simply someone who values flexibility, our expert team brings personalized workouts, guided yoga, and stress-relieving massages to your home, office, or even your favorite outdoor space.
                </p>
                <p style="margin-top: 15px;">
                    With My Fitness, you can also book boxing, kickboxing, MMA coaching, running sessions, and more—all from top fitness professionals. Our easy-to-use platform allows you to schedule sessions, track progress, and stay motivated with just a few clicks.
                </p>
                <p style="margin-top: 15px;">
                    Take charge of your health and wellness with My Fitness.ae—your go-to destination for fitness and wellness in UAE. Stay fit, feel great, and reach your goals—on your terms.
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="modern-feature-card">
                    <div class="card-glow"></div>
                    <div class="icon-wrapper">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h4>Value For Money</h4>
                    <p>
                        We understand health and fitness are personal journeys. That’s why we offer a range of affordable fitness services to fit your goals. Our team of experts are here to support you in every step. Join us and reach your goals together!
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="modern-feature-card">
                    <div class="card-glow"></div>
                    <div class="icon-wrapper">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>Service Commitment</h4>
                    <p>
                        We believe a healthy lifestyle is essential for happiness. That’s why we offer diverse fitness programs and classes with safe, well-maintained equipment and facilities. With us, you can confidently pursue your fitness journey toward achieving your personal goals.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="modern-feature-card">
                    <div class="card-glow"></div>
                    <div class="icon-wrapper">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Dedicated Support</h4>
                    <p>
                        Achieve your fitness goals with the help of our dedicated support team. Our friendly experts are just an email or WhatsApp message away, ready to assist you with any questions or concerns you may have.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="modern-feature-card">
                    <div class="card-glow"></div>
                    <div class="icon-wrapper">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Secure Payment</h4>
                    <p>
                        We have invested in industry-standard infrastructure that ensures your private information is never compromised. Our secure payment gateway gives you peace of mind and confidence in conducting online transactions.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-12 mt-5">
                <div class="business-partner-banner">
                    <div class="banner-content">
                        <h3>Be a business partner !</h3>
                        <p>Join our growing network of fitness professionals.</p>
                    </div>
                    <a href="/business-partner" class="modern-btn">Start as Business Partner? <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.why-choose-section {
    background: var(--brand-bg);
    color: var(--brand-text);
    position: relative;
    overflow: hidden;
    padding: 20px 0;
    margin: 0;
}

.why-choose-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(14, 165, 233, 0.05) 0%, rgba(0,0,0,0) 70%);
    animation: pulse-rotate 60s linear infinite;
    pointer-events: none;
}

@keyframes pulse-rotate {
    0% { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.1); }
    100% { transform: rotate(360deg) scale(1); }
}

.why-choose-section .section-header {
    position: relative;
    z-index: 1;
}

.why-choose-section .section-header .subtitle {
    display: inline-block;
    padding: 6px 16px;
    background: rgba(14, 165, 233, 0.1);
    color: var(--brand-primary);
    border: 1px solid rgba(14, 165, 233, 0.2);
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 16px;
}

.why-choose-section .section-header h2 {
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--brand-text);
    margin-bottom: 16px;
}

.why-choose-section .section-header p {
    color: var(--brand-text-muted);
    font-size: 1.1rem;
    line-height: 1.7;
}

.modern-feature-card {
    background: var(--brand-card-bg);
    border: 1px solid var(--brand-card-border);
    border-radius: 20px;
    padding: 32px 24px;
    height: 100%;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1;
}

.modern-feature-card:hover {
    transform: translateY(-10px);
    background: rgba(30, 41, 59, 0.8);
    border-color: var(--brand-primary);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
}

.modern-feature-card .card-glow {
    position: absolute;
    width: 150px;
    height: 150px;
    background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, rgba(0,0,0,0) 70%);
    top: -50px;
    right: -50px;
    border-radius: 50%;
    transition: all 0.4s ease;
}

.modern-feature-card:hover .card-glow {
    transform: scale(1.5);
    background: radial-gradient(circle, rgba(14, 165, 233, 0.25) 0%, rgba(0,0,0,0) 70%);
}

.modern-feature-card .icon-wrapper {
    width: 72px;
    height: 72px;
    background: rgba(14, 165, 233, 0.1);
    border: 1px solid rgba(14, 165, 233, 0.2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 24px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2), inset 0 0 15px rgba(14, 165, 233, 0.1);
    transition: all 0.4s ease;
}

.modern-feature-card .icon-wrapper i {
    color: var(--brand-primary) !important;
    font-size: 2.2rem;
    filter: drop-shadow(0 0 8px rgba(14, 165, 233, 0.5));
    transition: all 0.4s ease;
}

.modern-feature-card:hover .icon-wrapper {
    transform: scale(1.1) translateY(-5px);
    background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-secondary) 100%);
    box-shadow: 0 15px 30px rgba(14, 165, 233, 0.4);
    border-color: transparent;
}

.modern-feature-card:hover .icon-wrapper i {
    color: #ffffff !important;
    filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.3));
}

.modern-feature-card h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--brand-text);
    margin-bottom: 12px;
}

.modern-feature-card p {
    color: var(--brand-text-muted);
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
}

.business-partner-banner {
    background: linear-gradient(90deg, rgba(14, 165, 233, 0.1) 0%, rgba(20, 184, 166, 0.1) 100%);
    border: 1px solid rgba(14, 165, 233, 0.3);
    border-radius: 24px;
    padding: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 24px;
    position: relative;
    overflow: hidden;
}

.business-partner-banner::after {
    content: '';
    position: absolute;
    right: 0;
    bottom: 0;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, rgba(0,0,0,0) 70%);
    pointer-events: none;
}

.business-partner-banner .banner-content {
    position: relative;
    z-index: 2;
}

.business-partner-banner .banner-content h3 {
    font-size: 2rem;
    font-weight: 800;
    color: var(--brand-text);
    margin-bottom: 8px;
}

.business-partner-banner .banner-content p {
    color: var(--brand-text-muted);
    font-size: 1.1rem;
    margin: 0;
}

.modern-btn {
    background: var(--brand-text);
    color: var(--brand-bg);
    padding: 16px 32px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(255, 255, 255, 0.05);
    z-index: 2;
    position: relative;
}

.modern-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(255, 255, 255, 0.1);
    color: var(--brand-primary);
}

@media (max-width: 768px) {
    .business-partner-banner {
        flex-direction: column;
        text-align: center;
        padding: 32px 24px;
    }
    
    .why-choose-section .section-header h2 {
        font-size: 2.2rem;
    }
}
</style>
