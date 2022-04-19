<nav class="navbar">
    <div class="container-fluid">
        <div class="user-container">
            <span>{{ $welcomeMsg }}</span>
            <span class="user-name"> {{ auth()->user()?->name }} </span>

        </div>

        <a href="{{ route('login') }}" class="user-imge-container">
            <img src="{{ auth()->user()->avatar_url ?? asset('assets/images/avatar_male.png') }}" alt="">
        </a>
    </div>
</nav>
