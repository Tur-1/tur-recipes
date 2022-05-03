@extends('layouts.app')

@section('body')
    <div class="offcanvas offcanvas-bottom login-register-modal " id="login-modal" aria-labelledby="offcanvasBottomLabel">
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
            <div class="label">
                <h2>Cooking a Delicious Food Easily </h2>
                <p>discover more than 1200 food recipes in your hands and cooking it easily</p>
            </div>
            <div class="login-register-btns">
                <button type="button" class="btn btn-primary" id="btn-login">Login</button>
                <button type="button" class="btn " id="btn-Sign-up"> Sign up </button>
            </div>
        </div>
    </div>
@endsection


@push('script')
    @if (count($errors->register) > 0)
        <script>
            $(document).ready(function() {
                $('#register-modal').offcanvas('show');

            });
        </script>
    @endif
    @if (count($errors->default) > 0)
        <script>
            $(document).ready(function() {
                $('#login-modal').offcanvas('show');
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('.login-page').click(function(event) {
                var $target = $(event.target);
                if (!$target.closest('.login-page-body-container')
                    .length) {
                    $('.login-register-modal').offcanvas('hide');

                }
            });

            $('#btn-login').click(function(event) {
                $('#login-modal').offcanvas('show');

            });
            $('#btn-Sign-up').click(function(event) {
                $('#register-modal').offcanvas('show');
            });
        });
    </script>
@endpush
