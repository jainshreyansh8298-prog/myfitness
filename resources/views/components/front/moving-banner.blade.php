@php
    $showTicker = \App\Models\SiteSetting::get('show_ticker', '1');
    $tickerText = \App\Models\SiteSetting::get('ticker_text', '🔥 EXCLUSIVE OFFER: Get 10% OFF your first booking! Code: FIRST10 | ⚡ Certified Trainers at your doorstep across Dubai & UAE');
@endphp

@if($showTicker == '1')
<div class="ticker-banner-wrapper">
    <!-- First set -->
    <div class="ticker-content">
        <div class="ticker-item">
            <span>{{ $tickerText }}</span>
        </div>
        <div class="ticker-item">
            <span>{{ $tickerText }}</span>
        </div>
    </div>
    <!-- Duplicate set for seamless loop -->
    <div class="ticker-content">
        <div class="ticker-item">
            <span>{{ $tickerText }}</span>
        </div>
        <div class="ticker-item">
            <span>{{ $tickerText }}</span>
        </div>
    </div>
</div>
@endif
