<nav class="navbar">
    <div class="container-fluid">
        <div class="user-container">
            <span>{{ $welcomeMsg }}</span>
            <span class="user-name"> {{ auth()->user()?->name }} </span>

        </div>

        <a href="{{ route('login') }}" class="user-imge-container">
            <img src="{{ asset('assets/images/zz.jpg') }}" alt="">
        </a>
    </div>
</nav>
