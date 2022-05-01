<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<x-layouts.head />


<body>


    <x-layouts.loading />

    <main id="app">
        @yield('body')
        <x-layouts.alert-message />
    </main>







    <x-layouts.scripts />
</body>

</html>
