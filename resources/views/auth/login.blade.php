@extends('layouts.app')

@section('content')
    <div class="offcanvas offcanvas-bottom login-register-modal" id="login-modal" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <span class="header-border"></span>


        </div>
        <div class="offcanvas-body small">
            <x-auth.login-modal />
        </div>
    </div>

    <div class="offcanvas offcanvas-bottom login-register-modal " id="register-modal" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <span class="header-border"></span>


        </div>
        <div class="offcanvas-body small">
            <x-auth.register-modal />

        </div>
    </div>

    <div class="login-page">
        <div class="login-page-header">
            <img src="{{ asset('assets/images/loginBackgound.jpg') }}" alt="">
        </div>
        <div class="login-page-body">
            <div class="login-page-body-container">
                <div class="label">
                    <h2>Cooking a Delicious Food Easily </h2>
                    <p>discover more than 1200 food recipes in your hands and cooking it easily</p>
                </div>
                <div class="login-register-btns">

                    <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas"
                        data-bs-target="#login-modal">Login</button>
                    <button type="button" class="btn " data-bs-toggle="offcanvas" data-bs-target="#register-modal"
                        id="register-btn">
                        Sign up
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        // document.body.style.backgroundImage = "url({{ asset('assets/images/loginBackgound.jpg') }})";
        document.body.style.backgroundColor = "black";
        // document.body.style.backgroundRepeat = "no-repeat";
        // document.body.style.backgroundSize = "cover";
        // document.body.style.backgroundPosition = "initial";
    </script>
@endpush
