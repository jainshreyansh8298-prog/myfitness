@php
    $showCoaches = \App\Models\SiteSetting::get('show_coaches', '1');
    $coaches = collect();
    if ($showCoaches == '1' && \Illuminate\Support\Facades\Schema::hasTable('coaches')) {
        $coaches = \App\Models\Coach::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();
    }
    $coachesHeading = \App\Models\SiteSetting::get('coaches_heading', 'Meet Our Coaches');
    $coachesSubheading = \App\Models\SiteSetting::get('coaches_subheading', 'Train with certified experts dedicated to your transformation.');
@endphp

@if($showCoaches == '1' && $coaches->isNotEmpty())
<section class="premium-section coaches-section">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
            <div class="mb-4 mb-md-0">
                <span class="text-gradient" style="font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">OUR TEAM</span>
                <h2 style="font-size: 3rem; font-weight: 900; margin-top: 8px;">{{ $coachesHeading }}</h2>
                <p style="max-width: 640px; margin-top: 8px; opacity: 0.75;">{{ $coachesSubheading }}</p>
            </div>
            <div>
                <a class="btn-premium btn-outline" href="{{ route('front.coaches') }}">
                    VIEW ALL COACHES <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

        {{-- Same slick carousel used by the blog/services sliders --}}
        <div class="services-slider dot-style-one dot-02 dot-color-02">
            @foreach($coaches as $coach)
                <div class="coach-slide">
                    <x-front.coach-card :coach="$coach" />
                </div>
            @endforeach
        </div>
    </div>
</section>

<x-front.coach-styles />
@endif
