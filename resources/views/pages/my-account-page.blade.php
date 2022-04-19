@extends('layouts.app')

@section('content')
    <div class="account-page ">

        <x-my-account.header />

        <x-my-account.body />

        <livewire:user-account-settings />
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {

            let openAccountFormBtn = $("#open-account-from-btn");
            let openPasswordFormBtn = $("#open-password-from-btn");

            let closeAcccountBtn = $("#close-account-from-btn");
            let closePasswordFormBtn = $("#close-password-from-btn");

            let updateHeaderCardAccount = $("#update-header-card-account");
            let editHeaderCardAccount = $("#edit-header-card-account");

            let updateHeaderCardPassword = $("#update-header-card-password");
            let editHeaderCardPassword = $("#edit-header-card-password");

            let accountFormLabel = $(".account-form-labal");
            let passwordFormLabel = $(".password-form-labal");

            let accountForm = $(".account-form");
            let passwordForm = $(".password-form");


            updateHeaderCardAccount.hide();
            accountForm.hide();


            updateHeaderCardPassword.hide();
            passwordForm.hide();

            openAccountFormBtn.on('click', function() {
                editHeaderCardAccount.slideUp("slow");
                updateHeaderCardAccount.slideDown("slow");

                accountFormLabel.slideUp("slow");
                accountForm.slideDown("slow");


            });


            closeAcccountBtn.on('click', function() {
                accountForm.slideUp("slow");
                accountFormLabel.slideDown("slow");

                updateHeaderCardAccount.slideUp("slow");
                editHeaderCardAccount.slideDown("slow");
            });


            openPasswordFormBtn.on('click', function() {
                editHeaderCardPassword.slideUp("slow");
                updateHeaderCardPassword.slideDown("slow");


                passwordFormLabel.slideUp("slow");
                passwordForm.slideDown("slow");
            });


            closePasswordFormBtn.on('click', function() {
                passwordForm.slideUp("slow");
                passwordFormLabel.slideDown("slow");

                updateHeaderCardPassword.slideUp("slow");
                editHeaderCardPassword.slideDown("slow");
            });
        });
    </script>
@endpush
