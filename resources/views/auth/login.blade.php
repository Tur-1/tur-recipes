@extends('layouts.app')

@section('content')
    <div wire:ignore.self class="modal fade " id="login-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 bg-transparent ">
                    <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <x-auth.login-modal />
                </div>

            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade " id="register-modal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 bg-transparent ">
                    <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <x-auth.register-modal />
                </div>

            </div>
        </div>
    </div>
    <div class="login-page">

        <div class="row">
            <div class="label">
                <h1>Cooking a Delicious Food Easily </h1>
                <p>discover more than 1200 food recipes in your hands and cooking it easily</p>
            </div>
            <div class="login-register-btns">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#login-modal">Login</button>
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#register-modal">Sign
                    up</button>
            </div>
        </div>


    </div>
@endsection

@push('script')
    <script>
        document.body.style.backgroundImage = "url({{ asset('assets/images/loginBackgound.jpg') }})";
        document.body.style.backgroundColor = "black";
        document.body.style.backgroundRepeat = "no-repeat";
        document.body.style.backgroundSize = "cover";
        document.body.style.backgroundPosition = "initial";
    </script>
@endpush
