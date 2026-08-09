<footer class="premium-footer position-relative" style="background: var(--color-bg); padding-top: 100px;">
    <div class="container">
        <!-- Top Footer (Newsletter / CTA) -->
        <div class="row mb-5 pb-5 border-bottom" style="border-color: rgba(255,255,255,0.05) !important;">
            <div class="col-lg-6 mb-4 mb-lg-0 pe-lg-5">
                <h3 class="text-white fw-bold mb-3" style="font-size: 2.2rem; letter-spacing: -0.03em;">Join the <span class="text-gradient">Elite</span> Inner Circle.</h3>
                <p class="text-muted mb-0" style="font-size: 1.1rem; line-height: 1.6;">Subscribe for exclusive training tips, nutrition guides, and VIP offers delivered straight to your inbox.</p>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
                <form class="w-100 d-flex gap-3 flex-column flex-sm-row">
                    <input type="email" class="form-control bg-dark text-white w-100" placeholder="Enter your email address" style="height: 60px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); padding: 0 24px; font-size: 1.05rem;">
                    <button type="button" class="btn-premium btn-accent px-5" style="height: 60px; border-radius: 16px; white-space: nowrap; font-size: 1.05rem;">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="row g-5 mb-5">
            <!-- Brand Info & Reach Us -->
            <div class="col-lg-4 col-md-6 pe-lg-5">
                <a href="/" class="d-inline-block text-decoration-none mb-4">
                    <div class="footer-brand m-0" style="font-size: 2.5rem;">
                        <span style="color: var(--color-text);">MY</span><span class="text-gradient">FITNESS</span>
                    </div>
                </a>


                <h5 class="footer-heading text-uppercase tracking-wider mb-3" style="color: #fff; font-size: 0.95rem;">Reach Us</h5>
                <div class="d-flex flex-column gap-3 mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box-modern" style="width: 32px; height: 32px; font-size: 0.8rem;">
                            <i class="fas fa-map-marker-alt text-gradient"></i>
                        </div>
                        <span style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.4;">Compass Building,<br>Ras Al Khaimah, UAE</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box-modern" style="width: 32px; height: 32px; font-size: 0.8rem;">
                            <i class="fas fa-phone-alt text-gradient"></i>
                        </div>
                        <a href="tel:+971585858348" style="color: var(--color-text-muted); text-decoration: none; font-size: 0.95rem; transition: color 0.3s;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-text-muted)'">+971 5858 58348</a>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box-modern" style="width: 32px; height: 32px; font-size: 0.8rem;">
                            <i class="fas fa-envelope text-gradient"></i>
                        </div>
                        <a href="mailto:hello@myfitness.ae" style="color: var(--color-text-muted); text-decoration: none; font-size: 0.95rem; transition: color 0.3s;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-text-muted)'">hello@myfitness.ae</a>
                    </div>
                </div>

                @php
                    $settings = app(\App\Services\SiteSettingService::class)->getAllSettings();
                @endphp
                <div class="d-flex gap-3">
                    @if($settings['show_instagram'] == '1')
                        <a href="{{ $settings['social_instagram'] }}" class="social-icon-modern"><i class="fab fa-instagram fs-5"></i></a>
                    @endif
                    @if($settings['show_twitter'] == '1')
                        <a href="{{ $settings['social_twitter'] }}" class="social-icon-modern"><i class="fab fa-twitter fs-5"></i></a>
                    @endif
                    @if($settings['show_linkedin'] == '1')
                        <a href="{{ $settings['social_linkedin'] }}" class="social-icon-modern"><i class="fab fa-linkedin-in fs-5"></i></a>
                    @endif
                    @if($settings['show_whatsapp'] == '1')
                        <a href="{{ $settings['social_whatsapp'] }}" class="social-icon-modern"><i class="fab fa-whatsapp fs-5"></i></a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading text-uppercase tracking-wider" style="color: #fff; font-size: 0.95rem;">Quick Links</h5>
                <div class="d-flex flex-column gap-3 mt-4">
                    <a href="{{ route('front.about') }}" class="footer-link m-0" style="font-size: 1.05rem;">About Us</a>
                    <a href="{{ route('front.services') }}" class="footer-link m-0" style="font-size: 1.05rem;">Services</a>
                    <a href="{{ route('front.blogs') }}" class="footer-link m-0" style="font-size: 1.05rem;">Blog</a>
                    <a href="{{ route('front.contact') }}" class="footer-link m-0" style="font-size: 1.05rem;">Contact</a>
                    <a href="{{ route('front.faq') }}" class="footer-link m-0" style="font-size: 1.05rem;">FAQ</a>
                </div>
            </div>

            <!-- Legal & Support -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading text-uppercase tracking-wider" style="color: #fff; font-size: 0.95rem;">Support</h5>
                <div class="d-flex flex-column gap-3 mt-4">
                    <a href="{{ route('front.privacyPolicy') }}" class="footer-link m-0" style="font-size: 1.05rem;">Privacy Policy</a>
                    <a href="{{ route('front.termsConditions') }}" class="footer-link m-0" style="font-size: 1.05rem;">Terms & Conditions</a>
                    <a href="{{ route('front.cookiePolicy') }}" class="footer-link m-0" style="font-size: 1.05rem;">Cookie Policy</a>
                    <a href="{{ route('front.serviceDelivery') }}" class="footer-link m-0" style="font-size: 1.05rem;">Service Delivery</a>
                    <a href="{{ route('front.serviceDelivery') }}" class="footer-link m-0" style="font-size: 1.05rem;">Refund Process</a>
                    <a href="{{ route('front.serviceDelivery') }}" class="footer-link m-0" style="font-size: 1.05rem;">Cancellation</a>
                </div>
            </div>

            <!-- Payment Logos -->
            <div class="col-lg-2 col-md-6 d-flex flex-column align-items-lg-start ps-lg-5">
                <div class="d-flex flex-column mt-lg-0">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Visa_Inc._logo_%282021%E2%80%93present%29.svg?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original" alt="Visa" class="mb-4" style="height: 25px; width: auto; object-fit: contain;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/MasterCard_Logo.svg" alt="Mastercard" class="mb-4" style="height: 40px; width: auto; object-fit: contain;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/40/JCB_logo.svg" alt="JCB" class="mb-4" style="height: 30px; width: auto; object-fit: contain;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg" alt="American Express" class="mb-4" style="height: 40px; width: auto; object-fit: contain;">
                </div>
            </div>
        </div>

        <div class="pt-4 pb-2 border-top d-flex flex-column flex-md-row align-items-center justify-content-between" style="border-color: rgba(255,255,255,0.05) !important;">
            <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem;">© {{ date('Y') }} MyFitness. All rights reserved.</p>
        </div>
    </div>
</footer>
