<section class="padding-top-60 padding-bottom-60" style="background: var(--brand-bg);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--brand-text); margin-bottom: 16px;">FREQUENTLY ASKED QUESTIONS</h2>
            <p style="color: var(--brand-text-muted); max-width: 600px; margin: 0 auto;">
                Find quick answers to common questions about our doorstep personal training and wellness services.
            </p>
        </div>

        @if(isset($faqs) && $faqs->count() > 0)
            <div class="row justify-content-center faq-container">
                <div class="col-lg-12">
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

                    <div class="row">
                    @foreach($faqs as $faq)
                        <div class="col-md-6 mb-3">
                            <div class="modern-faq-card mb-0" onclick="toggleModernFaq(this)">
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
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        @else
            <p class="text-center text-muted">No FAQs available at the moment.</p>
        @endif
    </div>
</section>

<script>
    function toggleModernFaq(element) {
        // If clicking a card that is already open, close it
        if (element.classList.contains('active')) {
            element.classList.remove('active');
            return;
        }
        
        // Find the container and close all other cards
        let container = element.closest('.faq-container');
        let allCards = container.querySelectorAll('.modern-faq-card');
        
        allCards.forEach(card => {
            card.classList.remove('active');
        });

        // Open the clicked one
        element.classList.add('active');
    }
</script>
