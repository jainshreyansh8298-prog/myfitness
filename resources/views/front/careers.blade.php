<x-front.main-layout title="Careers | MyFitness">
    <section class="padding-top-120 padding-bottom-100" style="background: var(--brand-bg); min-height: 100vh;">
        <div class="container">
            <div class="text-center mb-5 mt-5">
                <h1 style="font-size: 3rem; font-weight: 800; color: var(--brand-text); letter-spacing: -1px;">
                    Join Our <span style="color: var(--color-primary);">Team</span>
                </h1>
                <p style="color: var(--brand-text-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; margin-top: 15px;">
                    Be part of a passionate team dedicated to transforming lives through fitness. Explore our open positions below.
                </p>
            </div>

            @if(isset($careers) && $careers->count() > 0)
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        @foreach($careers as $career)
                            <div class="card mb-4" style="border-radius: 16px; border: 1px solid var(--color-border); background: var(--color-surface); box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                                        <h3 style="font-size: 1.4rem; font-weight: 700; color: var(--brand-text); margin: 0;">
                                            {{ $career->title }}
                                        </h3>
                                        <div class="d-flex gap-2 flex-wrap mt-2 mt-sm-0">
                                            @if($career->location)
                                                <span style="background: rgba(var(--color-primary-rgb, 14,165,233), 0.1); color: var(--color-primary); padding: 5px 14px; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">
                                                    <i class="fas fa-map-marker-alt me-1"></i> {{ $career->location }}
                                                </span>
                                            @endif
                                            <span style="background: rgba(var(--color-accent-rgb, 255,115,0), 0.1); color: var(--color-accent, #ff7300); padding: 5px 14px; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">
                                                <i class="fas fa-briefcase me-1"></i> {{ $career->type }}
                                            </span>
                                        </div>
                                    </div>
                                    <p style="color: var(--brand-text-muted); font-size: 1rem; line-height: 1.75; margin-bottom: 0;">
                                        {!! nl2br(e($career->description)) !!}
                                    </p>
                                    <div class="mt-4">
                                        <a href="{{ route('front.contact') }}" class="btn-premium btn-accent" style="padding: 12px 32px; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px;">
                                            Apply Now <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-briefcase" style="font-size: 3rem; color: var(--color-primary); opacity: 0.3; margin-bottom: 20px;"></i>
                    <p style="color: var(--brand-text-muted); font-size: 1.1rem;">No open positions at the moment. Check back soon!</p>
                </div>
            @endif
        </div>
    </section>
</x-front.main-layout>
