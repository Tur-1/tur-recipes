@extends('layouts.app')

@section('body')
    <div class="login-page">
        <div class="login-page-header">
            <img src="{{ asset('assets/images/loginBackgound.jpg') }}" alt="">
        </div>
        <div class="login-page-body">
            <div class="container">
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

    </div>

    @include('components.auth.login-modal')
    @include('components.auth.register-modal')
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
                if (!$target.closest('.login-page')
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
