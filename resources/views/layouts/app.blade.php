<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<x-layouts.head />


<body>


    <x-layouts.loading />

    <main id="app">
        {{ $slot }}
        <livewire:add-recipe>
    </main>


    <x-layouts.scripts />
</body>

</html>
