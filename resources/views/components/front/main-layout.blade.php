@props([
    'title' => 'Personal Trainer at Home in Dubai | Private Fitness & Yoga Instructors | MyFitness',
    'description' =>
        'Looking for a personal trainer in Dubai? Get customized fitness sessions at home with certified personal trainers, yoga instructors, and private fitness coaches near you.',
    'keywords' => 'Fitness, Personal Trainer, Yoga, Sports Massage, Online Booking',
])

<x-front.header-styles-and-scripts :title="$title" :description="$description" :keywords="$keywords" />

<x-front.preloader />

<body class="premium-theme">
    <x-front.moving-banner />
    <x-front.header />
    
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
</body>
</html>
