@php
    $coachesHeading = \App\Models\SiteSetting::get('coaches_heading', 'Meet Our Coaches');
    $coachesSubheading = \App\Models\SiteSetting::get('coaches_subheading', 'Train with certified experts dedicated to your transformation.');
@endphp

<x-front.main-layout title="Meet Our Coaches | MyFitness">
    <section class="premium-section coaches-section" style="padding-top: 160px;">
        <div class="container">
            <div class="text-center mb-5">
                <span style="color: var(--color-primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">OUR TEAM</span>
                <h1 style="font-size: 3.2rem; font-weight: 900; margin-top: 8px;">{{ $coachesHeading }}</h1>
                <p style="max-width: 640px; margin: 12px auto 0; opacity: 0.75;">{{ $coachesSubheading }}</p>
            </div>

            @if($coaches->isNotEmpty())
                <div class="row g-4 justify-content-center">
                    @foreach($coaches as $coach)
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                            <x-front.coach-card :coach="$coach" />
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted my-5">Our coaching team will be announced soon. Check back shortly!</p>
            @endif
        </div>
    </section>

    <x-front.coach-styles />
</x-front.main-layout>
