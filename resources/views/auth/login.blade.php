@extends('layouts.app')

@section('content')
    <div class="offcanvas offcanvas-bottom login-register-modal" style="z-index: 99999999" tabindex="-1" id="login-modal"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <span class="header-border"></span>


        </div>
        <div class="offcanvas-body small">
            <x-auth.login-modal />
        </div>
    </div>

    <div class="offcanvas offcanvas-bottom login-register-modal" style="z-index: 99999999" tabindex="-1" id="register-modal"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <span class="header-border"></span>


        </div>
        <div class="offcanvas-body small">
            <x-auth.register-modal />

        </div>
    </div>


    <div class="" id="login-page"
        style="visibility: visible;background-image: url({{ asset('assets/images/loginBackgound.jpg') }})">

        <div class="offcanvas-body ">
            <div class="row">
                <div class="label">
                    <h1>Cooking a Delicious Food Easily </h1>
                    <p>discover more than 1200 food recipes in your hands and cooking it easily</p>
                </div>
                <div class="login-register-btns">

                    <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas"
                        data-bs-target="#login-modal">Login</button>
                    <button type="button" class="btn " data-bs-toggle="offcanvas" data-bs-target="#register-modal"
                        id="register-btn">Sign
                        up</button>
                </div>
            </div>
        </div>
    </div>
@endsection
