<head>

    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="initial-scale=1, viewport-fit=cover, user-scalable=no" />
    <!-- CSRF Token -->
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/apple-icon-180.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/icons/apple-icon-180.png') }}" type="image/x-icon">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-2048-2732.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">

    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1668-2388.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1536-2048.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1668-2224.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1620-2160.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1284-2778.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1170-2532.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1125-2436.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1242-2688.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-828-1792.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1242-2208.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-750-1334.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-640-1136.jpg') }}"
        media="(prefers-color-scheme: dark) and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">

    <title>{{ config('app.name', 'Tur Recipes') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=') . time() }}">

    <link rel="manifest" href="{{ asset('manifest.json') }}" />

    <livewire:styles />

</head>
