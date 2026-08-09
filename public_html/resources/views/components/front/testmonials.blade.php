@props(['testimonials' => null])

@php
    $items = $testimonials ?? \App\Models\Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    $settings = app(\App\Services\SiteSettingService::class)->getAllSettings();
    $scrollSpeedMs = (isset($settings['testimonial_scroll_speed']) && is_numeric($settings['testimonial_scroll_speed'])) 
        ? $settings['testimonial_scroll_speed'] * 1000 
        : 15000;
@endphp

<section class="testimonial-section py-5" style="background: var(--brand-bg); position: relative; overflow: hidden;">
    <!-- Abstract background elements -->
    <div style="position: absolute; top: -100px; left: -100px; width: 400px; height: 400px; background: radial-gradient(circle, var(--brand-primary) 0%, transparent 70%); opacity: 0.05; border-radius: 50%; z-index: 0;"></div>
    <div style="position: absolute; bottom: -100px; right: -100px; width: 400px; height: 400px; background: radial-gradient(circle, var(--brand-primary) 0%, transparent 70%); opacity: 0.05; border-radius: 50%; z-index: 0;"></div>

    <div class="container mt-5 mb-5" style="position: relative; z-index: 1;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span style="color: var(--brand-primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem;">REAL CLIENT STORIES</span>
            <h2 style="font-size: 3rem; font-weight: 900; color: var(--brand-text); margin-top: 8px;">TRANSFORMATIONS & REVIEWS</h2>
        </div>

        <div class="testimonial-carousel mt-5">
            @foreach($items as $test)
                <div class="px-3 pb-5 pt-3">
                    <div class="premium-testimonial-card h-100 mx-auto" style="max-width: 800px;">
                        <div class="quote-mark">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        
                        <div class="d-flex align-items-center mb-4 pb-4" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <img src="{{ $test->avatar_url ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150' }}" 
                                 alt="{{ $test->name }}" 
                                 class="premium-author-img"
                                 onError="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150'">
                            <div>
                                <h5 class="mb-1 fw-bold text-light" style="font-size: 1.1rem;">{{ $test->name }}</h5>
                                <span style="color: var(--brand-primary); font-size: 0.9rem; font-weight: 600;">{{ $test->role_location ?: 'Verified Client' }}</span>
                            </div>
                        </div>

                        <p class="premium-testimonial-text flex-grow-1">
                            "{{ $test->content }}"
                        </p>

                        <div class="stars-rating mt-4">
                            @for($i=1; $i<=5; $i++)
                                @if($i <= $test->rating)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star text-muted"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .premium-testimonial-card {
        background: rgba(30, 41, 59, 0.6);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 40px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }
    
    .premium-testimonial-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--brand-primary), #0ea5e9);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .premium-testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        border-color: rgba(255, 255, 255, 0.15);
        background: rgba(30, 41, 59, 0.8);
    }

    .premium-testimonial-card:hover::before {
        transform: scaleX(1);
    }

    .quote-mark {
        position: absolute;
        top: 25px;
        right: 30px;
        font-size: 5rem;
        color: rgba(255,255,255,0.03);
        line-height: 1;
        transition: color 0.4s ease;
    }

    .premium-testimonial-card:hover .quote-mark {
        color: rgba(59, 130, 246, 0.1);
    }

    .premium-author-img {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 20px;
        border: 2px solid transparent;
        background: linear-gradient(var(--brand-card-bg), var(--brand-card-bg)) padding-box,
                    linear-gradient(45deg, var(--brand-primary), #0ea5e9) border-box;
    }

    .premium-testimonial-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--brand-text-muted);
        font-weight: 300;
        position: relative;
        z-index: 2;
    }

    .stars-rating i {
        font-size: 1.1rem;
        margin-right: 4px;
    }

    .text-warning {
        color: #fbbf24 !important;
        text-shadow: 0 0 10px rgba(251, 191, 36, 0.4);
    }
    
    /* Slick Dots Customization */
    .testimonial-carousel .slick-dots {
        position: absolute;
        bottom: -50px;
        list-style: none;
        display: flex !important;
        justify-content: center;
        gap: 12px;
        padding: 0;
        margin: 0;
        width: 100%;
    }
    .testimonial-carousel .slick-dots li {
        margin: 0;
    }
    .testimonial-carousel .slick-dots li button {
        font-size: 0;
        line-height: 0;
        display: block;
        width: 12px;
        height: 12px;
        padding: 0;
        cursor: pointer;
        color: transparent;
        border: 0;
        outline: none;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    .testimonial-carousel .slick-dots li.slick-active button {
        background: var(--brand-primary);
        transform: scale(1.4);
        box-shadow: 0 0 12px rgba(59, 130, 246, 0.5);
    }
    .testimonial-carousel .slick-dots li button:before {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof $ !== 'undefined' && $.fn.slick) {
            $('.testimonial-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: {{ $scrollSpeedMs }},
                speed: 300,
                infinite: true,
                arrows: false,
                dots: true,
                pauseOnHover: true,
                swipeToSlide: true
            });
        }
    });
</script>
