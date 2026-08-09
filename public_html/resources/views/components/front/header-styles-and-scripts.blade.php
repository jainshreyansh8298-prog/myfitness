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
    <link rel=icon href="{{ config('app.logo') }}" type="icon/png">
    <link rel="canonical" href="{{ Request::fullUrl() }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

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
    @endphp

    <style>
        :root {
            --brand-primary: {{ $primaryColor }} !important;
            --brand-secondary: {{ $secondaryColor }} !important;
            --brand-bg: {{ $bgColor }} !important;
            --brand-text: {{ $textColor }} !important;
            --brand-button-text: {{ $btnTextColor }} !important;
        }
    </style>
</head>
