<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta name="author" content="{{ $settings->site_author ?? '' }}">
    <meta name="title" content="{{ $settings->site_name ?? config('app.name') }}|@yield('title')">
    <meta name="keywords" content="{{ $settings->site_keywords ?? '' }}">
    <meta name="description" content="{{ $settings->site_description ?? '' }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <title>{{ $settings->site_name ?? config('app.name') }} | @yield('title')</title>

    <meta property="og:type" content="@yield('type', 'website')" />
    <meta property="og:title" content="{{ $settings->site_name ?? '' }}|@yield('title')" />
    <meta property="og:description" content="{{ $settings->site_description ?? '' }}" />
    <meta property="og:image" content="{{ asset($settings->site_profile) ?? '' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ $settings->site_name ?? '' }}" />

    <meta name="twitter:title" content="{{ $settings->site_name ?? '' }}|@yield('title')">
    <meta name="twitter:description" content="{{ $settings->site_description ?? '' }}">
    <meta name="twitter:image" content="{{ asset($settings->site_profile) ?? '' }}">
    {{-- <meta name="twitter:site" content="{{ '@' . setting('social_twitter') }}">
    <meta name="twitter:creator" content="{{ '@' . setting('social_twitter') }}"> --}}
    <!--- ومن لا يحبُّ صُعودَ الجبالِ يَعِشْ أبَدَ الدَّهرِ بَيْنَ الحُفَرْ
            أبو القاسم الشابي--->
    {{-- @include('layouts.seo') --}}

    {{-- Fonts --}}
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">

    {{-- bootstrap dir --}}
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    @endif
    {{-- css files --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/colors/sky.css') }}"> --}}
    <link rel="preload" href="{{ asset('frontend/assets/css/fonts/urbanist.css') }}" as="style"
        onload="this.rel='stylesheet'">
    @livewireStyles
    @notifyCss
    @yield('styles')
    <style>
        .notify {
            margin-top: 50px !important;
        }

        body,
        * {
            text-align: start;
        }
    </style>
</head>

<body cz-shortcut-listen="true" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

    <div class="content-wrapper">
        {{-- <div class="page-loader"></div> --}}
        <x-navbar />
        <main>
            {{ $slot }}
        </main>
        <x-footer />
        {{-- @include('kustomer::kustomer') --}}
    </div>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
    {{-- <x:notify-messages /> --}}
    @livewireScripts
    @notifyJs

    {{-- <script>
        $(function() {
            $("img").each(function() {
                $(this).attr("loading", 'lazy');
            });
        });
    </script> --}}

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                notify()->error($error);
            @endphp
        @endforeach
    @endif
    @if ($message = Session::has('message'))
        @php
            notify()->info($message);
        @endphp
    @endif
    @stack('scripts')
</body>

</html>
