<head>

    <meta charset="utf-8">
    <title>{{ config('app.name', 'Tur Recipes') }}</title>

    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="initial-scale=1, viewport-fit=cover, user-scalable=no" />

    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/apple-icon-180.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/icons/apple-icon-180.png') }}" type="image/x-icon">



    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-2048-2732.jpg') }}"
        media="(device-width: 1024px) and (device-height: 1366px) ">

    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1668-2388.jpg') }}"
        media="(device-width: 834px) and (device-height: 1194px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1536-2048.jpg') }}"
        media="(device-width: 768px) and (device-height: 1024px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1668-2224.jpg') }}"
        media="(device-width: 834px) and (device-height: 1112px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1620-2160.jpg') }}"
        media="(device-width: 810px) and (device-height: 1080px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1284-2778.jpg') }}"
        media="(device-width: 428px) and (device-height: 926px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1170-2532.jpg') }}"
        media="(device-width: 390px) and (device-height: 844px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1125-2436.jpg') }}"
        media="(device-width: 375px) and (device-height: 812px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1242-2688.jpg') }}"
        media="(device-width: 414px) and (device-height: 896px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-828-1792.jpg') }}"
        media="(device-width: 414px) and (device-height: 896px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-1242-2208.jpg') }}"
        media="(device-width: 414px) and (device-height: 736px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-750-1334.jpg') }}"
        media="(device-width: 375px) and (device-height: 667px) ">
    <link rel="apple-touch-startup-image" href="{{ asset('images/icons/apple-splash-dark-640-1136.jpg') }}"
        media="(device-width: 320px) and (device-height: 568px) ">



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



    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}" />



    <livewire:styles />
    @stack('head')
    <script type="text/javascript" defer>
        // Initialize the service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js');

            console.log('Laravel PWA: ServiceWorker registration success:');
        } else {
            console.log('Laravel PWA: ServiceWorker registration failed:');
        }
    </script>
</head>
