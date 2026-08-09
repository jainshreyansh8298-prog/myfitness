@php
    $showServices = \App\Models\SiteSetting::get('show_services', '1');
    $showWhyUs = \App\Models\SiteSetting::get('show_why_us', '1');
    $showBlogs = \App\Models\SiteSetting::get('show_blogs', '1');
    $showFaqs = \App\Models\SiteSetting::get('show_faqs', '1');
    $showTestimonials = \App\Models\SiteSetting::get('show_testimonials', '1');
@endphp

<x-front.main-layout>
    <!-- Workout Video Background Hero -->
    <x-front.hero-video />


    @if($showServices == '1')
    <section class="premium-section">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
                <div class="mb-4 mb-md-0">
                    <span class="text-gradient" style="font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">OUR PROGRAMS & SERVICES</span>
                    <h2 style="font-size: 3rem; font-weight: 900; margin-top: 8px;">EXPLORE FITNESS SERVICES</h2>
                </div>
                <div>
                    <a class="btn-premium btn-outline" href="{{ route('front.services') }}">
                        VIEW ALL SERVICES <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <x-front.services :services="$services" />
        </div>
    </section>
    @endif

    <x-front.home-categories :categories="$categories" />

    @if($showWhyUs == '1')
        <x-front.why-choose-us />
    @endif


    @if($showBlogs == '1')
        <x-front.blog-slider :blogs="$blogs"/>
    @endif

    @if($showFaqs == '1')
        <x-front.home-faqs :faqs="$faqs" />
    @endif

    @if($showTestimonials == '1')
        <x-front.testmonials :testimonials="$testimonials" />
    @endif

    <x-front.modal />

</x-front.main-layout>
