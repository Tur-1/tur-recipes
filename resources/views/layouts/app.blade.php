<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('partials.layouts.head')
</head>

<body>




    @include('partials.layouts.header')

    <main class="container-fluid " id="app">


        @yield('content')

    </main>




    @include('partials.layouts.scripts')
</body>

</html>
