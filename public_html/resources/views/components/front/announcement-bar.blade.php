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
        top: 0;
        left: 0;
        right: 0;
        overflow: hidden;
        background: var(--brand-primary, #dfff00);
        color: var(--brand-button-text, #0b0d14);
        border-bottom: 1px solid rgba(0, 0, 0, 0.15);
        z-index: 1200; /* above the fixed header (z-index 1000) */
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
        // Push the fixed header and page content down by the announcement bar's
        // height so the bar never overlaps the navigation (works at any width).
        function fitAnnouncementBar() {
            var bar = document.getElementById('announcementBar');
            if (!bar) return;
            var h = bar.offsetHeight;
            var header = document.querySelector('.premium-header');
            if (header) header.style.top = h + 'px';
            document.body.style.paddingTop = h + 'px';
        }
        window.addEventListener('load', fitAnnouncementBar);
        window.addEventListener('resize', fitAnnouncementBar);
        document.addEventListener('DOMContentLoaded', fitAnnouncementBar);
        fitAnnouncementBar();
    })();
</script>
@endif
