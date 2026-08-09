@php
    $imgUrl = str_starts_with($blog->image, 'http') ? $blog->image : asset('storage/' . $blog->image);
@endphp

<x-front.main-layout :title="$blog->title . ' | MyFitness Blog'">
    <section class="padding-top-60 padding-bottom-60" style="background: var(--brand-bg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div style="margin-bottom: 20px;">
                        <a href="{{ route('front.blogs') }}" style="color: var(--brand-primary); text-decoration: none; font-weight: 700; font-size: 0.9rem;">
                            <i class="fas fa-arrow-left me-1"></i> BACK TO BLOGS
                        </a>
                    </div>

                    @if($blog->category)
                        <span class="cult-category-badge mb-3" style="position: static;">{{ $blog->category->name }}</span>
                    @endif

                    <h1 style="font-size: 2.6rem; font-weight: 900; color: #fff; margin-top: 10px; margin-bottom: 16px; line-height: 1.25;">
                        {{ $blog->title }}
                    </h1>

                    <div style="color: #94a3b8; font-size: 0.9rem; margin-bottom: 30px; display: flex; align-items: center; gap: 16px;">
                        <span><i class="far fa-calendar-alt color-3 me-1"></i> {{ $blog->created_at->format('F d, Y') }}</span>
                        <span>•</span>
                        <span><i class="far fa-user color-3 me-1"></i> By MyFitness Experts</span>
                    </div>

                    <div style="border-radius: 16px; overflow: hidden; margin-bottom: 40px; border: 1px solid rgba(255,255,255,0.1);">
                        <img src="{{ $imgUrl }}" alt="{{ $blog->title }}" style="width: 100%; max-height: 480px; object-fit: cover;" onError="this.src='https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=800'">
                    </div>

                    <div style="background: var(--brand-card-bg); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 40px; color: #e2e8f0; font-size: 1.05rem; line-height: 1.8;">
                        {!! nl2br(e($blog->content)) !!}
                    </div>

                    <!-- CTA Box -->
                    <div style="background: linear-gradient(135deg, #141722 0%, #0b0d14 100%); border: 2px solid var(--brand-primary); border-radius: 16px; padding: 30px; margin-top: 40px; text-align: center;">
                        <h3 style="color: #fff; font-weight: 800; font-size: 1.5rem; margin-bottom: 10px;">READY TO ELEVATE YOUR FITNESS?</h3>
                        <p style="color: #cbd5e1; max-width: 600px; margin: 0 auto 20px;">Book a certified personal trainer to deliver custom workouts directly to your doorstep.</p>
                        <a href="{{ route('front.services') }}" class="btn-cult-primary">EXPLORE FITNESS SERVICES</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.main-layout>
