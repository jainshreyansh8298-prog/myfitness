<x-front.main-layout title="Service Delivery & Policies | MyFitness">
    <section class="padding-top-120 padding-bottom-100" style="background: var(--brand-bg); min-height: 100vh;">
        <div class="container">
            <div class="text-center mb-5 mt-5">
                <h1 style="font-size: 3rem; font-weight: 800; color: var(--brand-text); letter-spacing: -1px;">
                    Service <span style="color: var(--color-primary);">Delivery</span>
                </h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div style="background: var(--color-surface); backdrop-filter: blur(12px); border: 1px solid var(--color-border); border-radius: 20px; padding: 40px; color: var(--color-text-muted); line-height: 1.8; box-shadow: 0 10px 30px var(--color-shadow);">
                        <style>
                            .policy-content p { color: var(--brand-text-muted); font-size: 1.05rem; margin-bottom: 20px; }
                            .policy-content h1, .policy-content h2, .policy-content h3, .policy-content h4, .policy-content h5, .policy-content strong { color: var(--brand-text); margin-top: 25px; margin-bottom: 15px; display: inline-block; }
                            .policy-content a { color: var(--brand-primary); text-decoration: none; }
                            .policy-content ol, .policy-content ul { color: var(--brand-text-muted); margin-bottom: 20px; font-size: 1.05rem; }
                            .policy-content li { margin-bottom: 10px; }
                        </style>
                        <div class="policy-content">
                            {!! $page->content ?? '' !!}
                        </div>
                        
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const policyContent = document.querySelector('.policy-content');
                                if (policyContent && window.location.hash) {
                                    // Extract search term from hash (e.g. 'cancellation' or 'refund')
                                    let searchTerm = window.location.hash.substring(1).toLowerCase();
                                    
                                    // Handle user's possible typo 'cancallation'
                                    if (searchTerm === 'cancallation') searchTerm = 'cancellation';
                                    
                                    const elements = policyContent.querySelectorAll('h1, h2, h3, h4, h5, h6, strong, p, span, li');
                                    let targetElement = null;
                                    
                                    for (let i = 0; i < elements.length; i++) {
                                        if (elements[i].textContent.toLowerCase().includes(searchTerm)) {
                                            targetElement = elements[i];
                                            break;
                                        }
                                    }
                                    
                                    if (targetElement) {
                                        setTimeout(() => {
                                            const yOffset = -100; // Offset for fixed header
                                            const y = targetElement.getBoundingClientRect().top + window.pageYOffset + yOffset;
                                            window.scrollTo({top: y, behavior: 'smooth'});
                                        }, 200);
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.main-layout>
