@php
    $showAnnouncements = \App\Models\SiteSetting::get('show_announcements', '1');
    $announcements = collect();
    if ($showAnnouncements == '1' && \Illuminate\Support\Facades\Schema::hasTable('announcements')) {
        $announcements = \App\Models\Announcement::live()->get();
    }
@endphp

@if($announcements->isNotEmpty())
<div class="announcement-bar" id="announcementBar">
    <div class="announcement-track">
        {{-- Rendered twice for a seamless, gap-free loop --}}
        @for($i = 0; $i < 2; $i++)
            <div class="announcement-group" aria-hidden="{{ $i === 1 ? 'true' : 'false' }}">
                @foreach($announcements as $a)
                    <span class="announcement-item">
                        <i class="fas fa-bullhorn"></i>
                        @if($a->link)
                            <a href="{{ $a->link }}">{{ $a->message }}</a>
                        @else
                            {{ $a->message }}
                        @endif
                    </span>
                    <span class="announcement-sep">◆</span>
                @endforeach
            </div>
        @endfor
    </div>
</div>

<style>
    .announcement-bar {
        position: fixed;
        left: 0;
        right: 0;
        overflow: hidden;
        background: var(--brand-primary, #dfff00);
        color: var(--brand-button-text, #0b0d14);
        border-bottom: 1px solid rgba(0, 0, 0, 0.15);
        z-index: 1001;
        transition: top 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .announcement-track {
        display: flex;
        width: max-content;
        animation: announcement-scroll 40s linear infinite;
    }
    .announcement-bar:hover .announcement-track {
        animation-play-state: paused;
    }
    .announcement-group {
        display: flex;
        align-items: center;
        white-space: nowrap;
        padding: 7px 0;
    }
    .announcement-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        font-size: 0.82rem;
        letter-spacing: 0.3px;
        padding: 0 18px;
        text-transform: uppercase;
    }
    .announcement-item a {
        color: inherit;
        text-decoration: underline;
    }
    .announcement-sep {
        opacity: 0.45;
        font-size: 0.6rem;
    }
    @keyframes announcement-scroll {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>

<script>
    (function () {
        function positionAnnouncement() {
            var bar = document.getElementById('announcementBar');
            var header = document.querySelector('.premium-header');
            if (!bar || !header) return;

            var headerH = header.offsetHeight;
            var barH = bar.offsetHeight;

            // Place announcement bar right below the fixed header
            bar.style.top = headerH + 'px';

            // Push body content down to account for both fixed header + announcement bar
            document.body.style.paddingTop = (headerH + barH) + 'px';
        }

        var lastScroll = 0;

        function handleScroll() {
            var bar = document.getElementById('announcementBar');
            var header = document.querySelector('.premium-header');
            if (!bar || !header) return;

            var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            var headerH = header.offsetHeight;
            var barH = bar.offsetHeight;

            if (currentScroll > headerH) {
                // Scrolled past header — hide navbar, announcement sticks to top
                header.style.transform = 'translateY(-100%)';
                bar.style.top = '0px';
                document.body.style.paddingTop = (headerH + barH) + 'px';
            } else {
                // Near top — show both navbar and announcement below it
                header.style.transform = 'translateY(0)';
                bar.style.top = headerH + 'px';
                document.body.style.paddingTop = (headerH + barH) + 'px';
            }

            lastScroll = currentScroll;
        }

        window.addEventListener('load', positionAnnouncement);
        window.addEventListener('resize', positionAnnouncement);
        document.addEventListener('DOMContentLoaded', positionAnnouncement);
        window.addEventListener('scroll', handleScroll, { passive: true });
        positionAnnouncement();
    })();
</script>
@endif
