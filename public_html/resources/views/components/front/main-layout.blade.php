@props([
    'title' => 'Personal Trainer at Home in Dubai | Private Fitness & Yoga Instructors | MyFitness',
    'description' =>
        'Looking for a personal trainer in Dubai? Get customized fitness sessions at home with certified personal trainers, yoga instructors, and private fitness coaches near you.',
    'keywords' => 'Fitness, Personal Trainer, Yoga, Sports Massage, Online Booking',
])

<x-front.header-styles-and-scripts :title="$title" :description="$description" :keywords="$keywords" />

<x-front.preloader />

<body class="premium-theme">
    <x-front.header />
    <x-front.announcement-bar />
    
    {{ $slot }}
    
    <x-front.footer />
    @if(request()->routeIs('front.home'))
        <x-front.discount-popup />
    @endif

    @php
        $settings = app(\App\Services\SiteSettingService::class)->getAllSettings();
    @endphp

    @if($settings['show_whatsapp'] == '1')
    <!-- WhatsApp Floating Button -->
    <a href="{{ $settings['social_whatsapp'] }}" target="_blank" class="whatsapp-float" aria-label="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    @endif

    <!-- Circular Progress Scroll To Top -->
    <div class="progress-wrap" id="progressWrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>



    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.hero-carousel');
            if (carousel && typeof jQuery !== 'undefined' && jQuery.fn.slick) {
                const fadeEffect = carousel.dataset.fade === 'true';
                jQuery(carousel).slick({
                    fade: fadeEffect,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    speed: 1000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    cssEase: 'linear'
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success') || session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: '{{ session('success') ? 'success' : 'error' }}',
                title: {!! json_encode(session('success') ?? session('error')) !!},
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const progressWrap = document.getElementById('progressWrap');
            if (progressWrap) {
                const progressPath = document.querySelector('.progress-wrap path');
                const pathLength = progressPath.getTotalLength();
                
                progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
                progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
                progressPath.style.strokeDashoffset = pathLength;
                progressPath.getBoundingClientRect();
                progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
                
                const updateProgress = function () {
                    const scroll = window.scrollY || window.pageYOffset;
                    const height = document.documentElement.scrollHeight - window.innerHeight;
                    const progress = pathLength - (scroll * pathLength / height);
                    progressPath.style.strokeDashoffset = progress;
                };
                
                updateProgress();
                window.addEventListener('scroll', updateProgress);
                
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 150) {
                        progressWrap.classList.add('active-progress');
                    } else {
                        progressWrap.classList.remove('active-progress');
                    }
                });
                
                progressWrap.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>
</body>
</html>
