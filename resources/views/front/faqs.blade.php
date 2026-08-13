<x-front.main-layout title="Frequently Asked Questions | MyFitness">
    <section class="padding-top-120 padding-bottom-100" style="background: var(--brand-bg); min-height: 100vh;">
        <div class="container">
            <div class="text-center mb-5 mt-5">
                <h1 style="font-size: 3rem; font-weight: 800; color: var(--brand-text); letter-spacing: -1px;">
                    Frequently Asked <span class="text-gradient">Questions</span>
                </h1>
                <p style="color: var(--brand-text-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; margin-top: 15px;">
                    Everything you need to know about our premium fitness services, bookings, and more.
                </p>
            </div>

            @if(isset($faqs) && $faqs->count() > 0)
                <div class="row justify-content-center faq-container">
                    <div class="col-lg-8">
                        <style>
                            .modern-faq-card {
                                background: #ffffff;
                                border-radius: 12px;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
                                margin-bottom: 16px;
                                overflow: hidden;
                                border: 1px solid #f0f4f8;
                                transition: all 0.3s ease;
                                cursor: pointer;
                            }
                            .modern-faq-card:hover {
                                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
                                transform: translateY(-2px);
                                border-color: #e2e8f0;
                            }
                            .modern-faq-header {
                                padding: 20px 24px;
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                font-weight: 600;
                                font-size: 1.1rem;
                                color: #1e293b;
                                transition: color 0.3s ease;
                            }
                            .modern-faq-card.active .modern-faq-header {
                                color: #0ea5e9;
                            }
                            .modern-faq-icon {
                                width: 32px;
                                height: 32px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border-radius: 50%;
                                background: #f1f5f9;
                                color: #64748b;
                                transition: all 0.3s ease;
                                flex-shrink: 0;
                                margin-left: 15px;
                            }
                            .modern-faq-card.active .modern-faq-icon {
                                background: #e0f2fe;
                                color: #0ea5e9;
                                transform: rotate(180deg);
                            }
                            .modern-faq-body {
                                max-height: 0;
                                overflow: hidden;
                                transition: max-height 0.4s cubic-bezier(0, 1, 0, 1), padding 0.4s ease, opacity 0.3s ease;
                                opacity: 0;
                                padding: 0 24px;
                                background: #ffffff;
                            }
                            .modern-faq-card.active .modern-faq-body {
                                max-height: 1000px;
                                padding: 0 24px 24px 24px;
                                opacity: 1;
                                transition: max-height 0.6s ease-in-out, padding 0.4s ease, opacity 0.4s ease;
                            }
                            .modern-faq-content {
                                color: #475569;
                                font-size: 1rem;
                                line-height: 1.7;
                                border-top: 1px solid #f1f5f9;
                                padding-top: 16px;
                            }
                        </style>

                        @foreach($faqs as $faq)
                            <div class="modern-faq-card mb-3" onclick="toggleModernFaq(this)">
                                <div class="modern-faq-header">
                                    <span>{{ $faq->question }}</span>
                                    <div class="modern-faq-icon">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="modern-faq-body">
                                    <div class="modern-faq-content">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center" style="color: var(--brand-text-muted);">No FAQs available at the moment.</p>
            @endif
        </div>
    </section>

    <script>
        function toggleModernFaq(element) {
            if (element.classList.contains('active')) {
                element.classList.remove('active');
                return;
            }
            let container = element.closest('.faq-container');
            let allCards = container.querySelectorAll('.modern-faq-card');
            allCards.forEach(card => card.classList.remove('active'));
            element.classList.add('active');
        }
    </script>
</x-front.main-layout>
