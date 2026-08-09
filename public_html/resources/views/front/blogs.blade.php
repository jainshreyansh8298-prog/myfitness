<x-front.main-layout title="Fitness & Wellness Blog | MyFitness Dubai">
    <section class="premium-section" style="padding-top: 120px;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="hero-badge mb-2">EXPERT ARTICLES & TIPS</span>
                <h1 style="font-size: 3.5rem; font-weight: 900; text-transform: uppercase; margin-bottom: 16px;">
                    FITNESS & WORKOUT <span class="text-gradient">BLOG</span>
                </h1>
                <p style="color: var(--color-text-muted); max-width: 600px; margin: 0 auto; font-size: 1.15rem; line-height: 1.6;">
                    Latest tips on personal training, weight loss, posture correction, yoga benefits, and nutrition in Dubai.
                </p>
            </div>

            <div class="row g-4">
                @forelse($blogs as $blog)
                    @php
                        $imgUrl = str_starts_with($blog->image, 'http') ? $blog->image : asset('storage/' . $blog->image);
                    @endphp
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="premium-service-card">
                            <div class="service-img-wrapper">
                                <img src="{{ $imgUrl }}" alt="{{ $blog->title }}" loading="lazy" onError="this.src='https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=600'">
                                @if($blog->category)
                                    <span class="category-badge">{{ $blog->category->name }}</span>
                                @endif
                            </div>

                            <div class="service-body">
                                <span style="color: var(--color-primary); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 12px; display: block;">
                                    <i class="far fa-calendar-alt me-1"></i> {{ $blog->created_at->format('M d, Y') }}
                                </span>

                                <h3 class="service-title">
                                    <a href="{{ route('front.blogDetails', $blog->slug) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h3>

                                <p class="service-desc" style="margin-bottom: 24px;">
                                    {{ Str::limit(strip_tags($blog->excerpt ?: $blog->content), 100) }}
                                </p>

                                <a href="{{ route('front.blogDetails', $blog->slug) }}" class="btn-premium btn-outline w-100 mt-auto" style="text-align: center;">
                                    READ ARTICLE <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h3 style="font-weight: 800;">No blog articles published yet.</h3>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
</x-front.main-layout>
