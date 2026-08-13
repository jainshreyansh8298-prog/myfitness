<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="author" content="MyFitness">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php $faviconLogo = \App\Models\SiteSetting::get('site_logo', ''); @endphp
    <link rel=icon href="{{ $faviconLogo ?: config('app.logo') }}" type="icon/png">
    <link rel="canonical" href="{{ Request::fullUrl() }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @php
        $siteFont = \App\Models\SiteSetting::get('site_font', 'Inter');
        $fontParam = str_replace(' ', '+', $siteFont);
    @endphp
    @if($siteFont && $siteFont !== 'Inter')
        <link href="https://fonts.googleapis.com/css2?family={{ $fontParam }}:wght@400;500;600;700&display=swap" rel="stylesheet">
    @endif

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" media="all" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/premium-fitness.css') }}" media="all" type="text/css">

    @php
        $primaryColor = \App\Models\SiteSetting::get('primary_color', '#dfff00');
        $secondaryColor = \App\Models\SiteSetting::get('secondary_color', '#00f2fe');
        $bgColor = \App\Models\SiteSetting::get('bg_color', '#0b0d14');
        $textColor = \App\Models\SiteSetting::get('text_color', '#fafafa');
        $btnTextColor = \App\Models\SiteSetting::get('button_text_color', '#000000');
        
        // Calculate Light vs Dark theme vars
        $isLight = (hexdec(substr($bgColor, 1, 2)) + hexdec(substr($bgColor, 3, 2)) + hexdec(substr($bgColor, 5, 2))) > 382;
        $borderColor = $isLight ? '#e4e4e7' : 'rgba(255,255,255,0.08)';
        $mutedColor  = $isLight ? '#71717a' : '#a1a1aa';
        $shadowColor = $isLight ? 'rgba(0,0,0,0.05)' : 'rgba(0,0,0,0.5)';
        $glowColor   = $isLight ? 'rgba(77,191,170,0.2)' : 'rgba(255,255,255,0.1)';

        // Detailed settings
        $cardColor         = \App\Models\SiteSetting::get('card_color', $isLight ? '#f4f4f5' : '#18181b');
        $cardHoverColor    = \App\Models\SiteSetting::get('card_hover_color', $isLight ? '#e4e4e7' : '#27272a');
        $testimonialColor  = \App\Models\SiteSetting::get('testimonial_color', $cardColor);
        $btnBgColor        = \App\Models\SiteSetting::get('btn_bg_color', '#1a1a2e');
        $btnHoverColor     = \App\Models\SiteSetting::get('btn_hover_color', $primaryColor);
        $btnHoverText      = \App\Models\SiteSetting::get('btn_hover_text_color', '#ffffff');
        $heroTitleColor    = \App\Models\SiteSetting::get('hero_title_color', '#1a1a2e');
        $heroSubColor      = \App\Models\SiteSetting::get('hero_sub_color', '#71717a');
        $footerIconColor   = \App\Models\SiteSetting::get('footer_icon_color', $primaryColor);
        $statsNumberColor  = \App\Models\SiteSetting::get('stats_number_color', $primaryColor);
    @endphp

    <style>
        :root {
            --brand-primary: {{ $primaryColor }} !important;
            --brand-secondary: {{ $secondaryColor }} !important;
            --brand-bg: {{ $bgColor }} !important;
            --brand-text: {{ $textColor }} !important;
            --brand-button-text: {{ $btnTextColor }} !important;
            --brand-text-muted: {{ $mutedColor }};
            --brand-card-bg: {{ $cardColor }};
            --brand-card-border: {{ $borderColor }};
            --brand-danger: #ef4444;
            --brand-font: '{{ $siteFont }}', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;

            /* Core theme bridges: map the admin color settings onto the --color-* vars the stylesheet actually consumes */
            --color-primary: {{ $primaryColor }};
            --color-secondary: {{ $secondaryColor }};
            --color-bg: {{ $bgColor }};
            --color-text: {{ $textColor }};

            --color-surface: {{ $cardColor }};
            --color-surface-hover: {{ $cardHoverColor }};
            --color-border: {{ $borderColor }};
            --color-text-muted: {{ $mutedColor }};
            --color-shadow: {{ $shadowColor }};
            --color-primary-glow: {{ $glowColor }};
            
            --color-testimonial-bg: {{ $testimonialColor }};
            --color-btn-bg: {{ $btnBgColor }};
            --color-btn-hover-bg: {{ $btnHoverColor }};
            --color-btn-hover-text: {{ $btnHoverText }};
            --color-hero-title: {{ $heroTitleColor }};
            --color-hero-subtitle: {{ $heroSubColor }};
            --color-footer-icon: {{ $footerIconColor }};
            --color-stats: {{ $statsNumberColor }};
        }

        /* Site-wide font (admin-configurable) */
        body, .premium-theme,
        h1, h2, h3, h4, h5, h6,
        p, a, span, li, label,
        button, input, textarea, select,
        .btn-premium, .nav-link {
            font-family: var(--brand-font) !important;
        }
    </style>
</head>
