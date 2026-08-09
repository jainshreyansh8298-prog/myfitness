<x-front.main-layout title="Contact Us | MyFitness Dubai">
    <section class="premium-section" style="padding-top: 120px;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="hero-badge mb-2">WE ARE HERE TO HELP YOU</span>
                <h1 style="font-size: 3.5rem; font-weight: 900; text-transform: uppercase; margin-bottom: 16px;">
                    GET IN <span class="text-gradient">TOUCH</span>
                </h1>
                <p style="color: var(--color-text-muted); max-width: 600px; margin: 0 auto; font-size: 1.15rem; line-height: 1.6;">
                    Have questions about personal training packages or booking? Reach out to our dedicated support team.
                </p>
            </div>

            <div class="row g-5">
                <!-- Left: Contact Form -->
                <div class="col-lg-7">
                    <div class="glass-panel" style="border-radius: 24px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
                        <h3 style="font-weight: 900; font-size: 1.6rem; margin-bottom: 30px;">SEND US A <span class="text-gradient">MESSAGE</span></h3>

                        <form action="{{ route('form.store') }}" method="POST">
                            @csrf
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required placeholder="Your Full Name *" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; font-size: 1rem; padding: 0 20px;">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" required placeholder="Your Email Address *" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; font-size: 1rem; padding: 0 20px;">
                                </div>
                            </div>

                            <div class="mb-4">
                                <input type="text" name="phone" class="form-control" required placeholder="Phone / WhatsApp Number *" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; font-size: 1rem; padding: 0 20px;">
                            </div>

                            <div class="mb-5">
                                <textarea name="message" class="form-control" rows="6" required placeholder="How can we help you with your fitness goals? *" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); border-radius: 12px; font-size: 1rem; padding: 20px;"></textarea>
                            </div>

                            <button type="submit" class="btn-premium btn-accent w-100" style="height: 60px; font-size: 1.05rem;">
                                SUBMIT INQUIRY <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right: Contact Cards -->
                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-4">
                        <div class="glass-panel" style="border-radius: 20px; padding: 30px; display: flex; align-items: center; gap: 24px; transition: var(--transition-smooth);" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                            <div style="width: 64px; height: 64px; background: rgba(6,182,212,0.1); border: 1px solid rgba(6,182,212,0.3); color: var(--color-primary); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <div style="color: var(--color-text-muted); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Call / WhatsApp Support</div>
                                <a href="tel:+971585858348" style="color: var(--color-text); font-size: 1.25rem; font-weight: 800; text-decoration: none;">+971 5858 58348</a>
                            </div>
                        </div>

                        <div class="glass-panel" style="border-radius: 20px; padding: 30px; display: flex; align-items: center; gap: 24px; transition: var(--transition-smooth);" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                            <div style="width: 64px; height: 64px; background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.3); color: var(--color-secondary); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div style="color: var(--color-text-muted); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Email Us</div>
                                <a href="mailto:hello@myfitness.ae" style="color: var(--color-text); font-size: 1.25rem; font-weight: 800; text-decoration: none;">hello@myfitness.ae</a>
                            </div>
                        </div>

                        <div class="glass-panel" style="border-radius: 20px; padding: 30px; display: flex; align-items: center; gap: 24px; transition: var(--transition-smooth);" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                            <div style="width: 64px; height: 64px; background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.3); color: var(--color-accent); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <div style="color: var(--color-text-muted); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Head Office</div>
                                <div style="color: var(--color-text); font-size: 1rem; font-weight: 700; line-height: 1.5;">Compass Building, Ras Al Khaimah & Dubai Marina, UAE</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.main-layout>
