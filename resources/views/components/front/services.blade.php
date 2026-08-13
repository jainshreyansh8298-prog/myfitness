<div class="row g-4">
    @foreach ($services as $service)
        @php
            $priceBefore = $service->price_before > $service->price_after ? $service->price_before : ($service->price_after * 1.4);
            $discountPct = $service->discount_percentage ?? ($priceBefore > 0 ? round((($priceBefore - $service->price_after) / $priceBefore) * 100) : 0);
            $imgUrl = str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image);
        @endphp
        <div class="col-lg-4 col-md-6 mb-4">
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
                        {{ Str::limit(strip_tags($service->description ?? 'Expert personal training tailored to your fitness goals. Certified master trainers.'), 90) }}
                    </p>

                    <div style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; font-weight: 500;">
                        <span><i class="far fa-clock text-gradient me-1"></i> {{ $service->session_minutes ?? 60 }} Min Session</span>
                        <span>•</span>
                        <span><i class="fas fa-check-circle text-gradient me-1"></i> Doorstep Training</span>
                    </div>

                    <div class="price-row">
                        <span class="price-current">AED {{ number_format($service->price_after, 0) }}</span>
                        @if($priceBefore > $service->price_after)
                            <span class="price-original">AED {{ number_format($priceBefore, 0) }}</span>
                        @endif
                    </div>

                    <a href="{{ route('front.serviceDetails', $service->slug) }}" class="btn-premium btn-accent w-100" style="margin-top: 10px;">
                        BOOK SESSION NOW
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
