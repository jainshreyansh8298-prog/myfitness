<x-front.main-layout title="Doorstep Fitness & Wellness Services in Dubai | MyFitness">
    <section class="premium-section" style="padding-top: 120px;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="hero-badge mb-3">DOORSTEP FITNESS SERVICES</span>
                <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 16px; text-transform: uppercase;">
                    FIND YOUR PERFECT <span class="text-gradient">FITNESS PROGRAM</span>
                </h1>
                <p style="color: var(--color-text-muted); max-width: 650px; margin: 0 auto; font-size: 1.1rem; line-height: 1.6;">
                    Book certified 1-on-1 personal trainers, private yoga coaches, swimming instructors, and sports massage therapists.
                </p>
            </div>

            <!-- Filter Card -->
            <div class="premium-search-card mb-5">
                <form action="{{ route('front.services') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label" style="color: var(--color-text-muted); font-size: 0.9rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Fitness Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">All Categories...</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label" style="color: var(--color-text-muted); font-size: 0.9rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">UAE Location</label>
                        <select name="area_id" class="form-select">
                            <option value="">All Locations...</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>
                                    {{ $area->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex flex-column gap-2">
                        <button type="submit" class="btn-premium btn-primary w-100" style="height: 56px; border-radius: 12px;">FILTER</button>
                    </div>
                </form>
            </div>

            <!-- Services Grid -->
            <div class="row g-4">
                @forelse ($services as $service)
                    @php
                        $priceBefore = $service->price_before > $service->price_after ? $service->price_before : ($service->price_after * 1.4);
                        $discountPct = $service->discount_percentage ?? ($priceBefore > 0 ? round((($priceBefore - $service->price_after) / $priceBefore) * 100) : 0);
                        $imgUrl = str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image);
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="premium-service-card">
                            <div class="service-img-wrapper">
                                <img src="{{ $imgUrl }}" alt="{{ $service->name }}" loading="lazy" onError="this.src='https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=600'">
                                
                                @if($discountPct > 0)
                                    <span class="discount-badge">-{{ $discountPct }}% OFF</span>
                                @elseif($service->badge_text)
                                    <span class="discount-badge">{{ $service->badge_text }}</span>
                                @endif

                                @if($service->category)
                                    <span class="category-badge">{{ $service->category->name }}</span>
                                @endif
                            </div>

                            <div class="service-body">
                                <h3 class="service-title">
                                    <a href="{{ route('front.serviceDetails', $service->slug) }}">
                                        {{ $service->name }}
                                    </a>
                                </h3>

                                <p class="service-desc">
                                    {{ Str::limit(strip_tags($service->description), 95) }}
                                </p>

                                <div class="d-flex align-items-center gap-2 mb-3" style="font-size: 0.85rem; color: var(--color-text-muted); font-weight: 500;">
                                    <span><i class="far fa-clock text-gradient me-1"></i> {{ $service->session_minutes ?? 60 }} Min Session</span>
                                    <span>•</span>
                                    <span><i class="fas fa-check-circle text-gradient me-1"></i> Doorstep</span>
                                </div>

                                <div class="price-row">
                                    <span class="price-current">AED {{ number_format($service->price_after, 0) }}</span>
                                    @if($priceBefore > $service->price_after)
                                        <span class="price-original">AED {{ number_format($priceBefore, 0) }}</span>
                                    @endif
                                </div>

                                <a href="{{ route('front.serviceDetails', $service->slug) }}" class="btn-premium btn-accent w-100">
                                    BOOK SESSION NOW
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div style="font-size: 64px; color: var(--color-border); margin-bottom: 24px;">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="mb-4" style="font-weight: 800;">No fitness services found.</h3>
                        <a href="{{ route('front.services') }}" class="btn-premium btn-outline">VIEW ALL SERVICES</a>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $services->links() }}
            </div>
        </div>
    </section>
</x-front.main-layout>
