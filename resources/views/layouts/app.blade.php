<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('partials.layouts.head')
</head>

<body>





    <x-header />

    <x-loading />
    <main id="app">


        @yield('content')
        {{ $slot }}
        <livewire:add-recipe>
    </main>

    <footer>
        <ul class="nav ">
            <li class="nav-item">
                <a class="nav-link " href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item add-recipe-icon">
                <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#addRecipe" href="#"><i
                        class="fas fa-plus-circle "></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="far fa-heart"></i></a>
            </li>

        </ul>
    </footer>


    @include('partials.layouts.scripts')
</body>

</html>
