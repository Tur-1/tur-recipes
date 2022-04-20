<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<x-layouts.head />


<body>


    <x-layouts.loading />

    <main id="app">
        @yield('content')
        <x-layouts.alert-message />
    </main>


    <livewire:add-recipe>
        <x-layouts.footer />



        <x-layouts.scripts />
</body>

</html>
