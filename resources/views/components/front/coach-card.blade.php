@props(['coach'])
<div class="coach-card">
    <div class="coach-photo-wrap">
        <img src="{{ $coach->photo_url }}" alt="{{ $coach->name }}" class="coach-photo" loading="lazy">
    </div>
    <div class="coach-body">
        <h3 class="coach-name">{{ $coach->name }}</h3>
        @if($coach->title)
            <div class="coach-title">{{ $coach->title }}</div>
        @endif
        @if($coach->bio)
            <p class="coach-bio">{{ \Illuminate\Support\Str::limit($coach->bio, 110) }}</p>
        @endif

        @if($coach->instagram || $coach->facebook || $coach->linkedin || $coach->whatsapp)
            <div class="coach-socials">
                @if($coach->instagram)<a href="{{ $coach->instagram }}" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>@endif
                @if($coach->facebook)<a href="{{ $coach->facebook }}" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>@endif
                @if($coach->linkedin)<a href="{{ $coach->linkedin }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>@endif
                @if($coach->whatsapp)<a href="{{ $coach->whatsapp }}" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>@endif
            </div>
        @endif
    </div>
</div>
