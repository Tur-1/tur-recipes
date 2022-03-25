<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('partials.layouts.head')
</head>

<body>
    <div id="app">
        @include('partials.layouts.header')


        <main class="container-fluid">
            @yield('content')
        </main>
    </div>

    @include('partials.layouts.scripts')
</body>

</html>
