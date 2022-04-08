<nav class="navbar sticky-top">
    <div class="container-fluid">
        <div class="user-container">
            <span class="user-name"> {{ $welcomeMsg . ' ' . auth()->user()?->name }} </span>
            <span>what do you want to cook today?</span>
        </div>

        <a href="{{ route('login') }}" class="user-imge-container">
            <img src="{{ asset('assets/images/avatar_male.png') }}" alt="">
        </a>
    </div>
</nav>
