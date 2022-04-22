<div class="account-page ">



    @include('components.my-account.header')

    @include('components.my-account.body')

    @include('components.my-account.profile')

</div>

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

                updateHeaderCardAccount.slideDown("slow");
                accountForm.slideDown("slow");

                editHeaderCardAccount.slideUp("slow");
                accountFormLabel.slideUp("slow");
            });


            closeAcccountBtn.on('click', function() {
                accountForm.slideUp("slow");

                updateHeaderCardAccount.slideUp("slow");
                accountFormLabel.slideDown("slow");

                editHeaderCardAccount.slideDown("slow");
            });



            openPasswordFormBtn.on('click', function() {
                editHeaderCardPassword.slideUp("slow");
                updateHeaderCardPassword.removeClass("d-none");
                updateHeaderCardPassword.slideDown("slow");


                passwordFormLabel.slideUp("slow");
                passwordForm.removeClass("d-none");
                passwordForm.slideDown("slow");
            });


            closePasswordFormBtn.on('click', function() {
                passwordForm.slideUp("slow");
                passwordFormLabel.slideDown("slow");

                updateHeaderCardPassword.slideUp("slow");
                editHeaderCardPassword.slideDown("slow");
            });
            $(window).on('updated_account_info', function() {
                accountForm.slideUp("slow");

                updateHeaderCardAccount.slideUp("slow");
                accountFormLabel.slideDown("slow");

                editHeaderCardAccount.slideDown("slow");
                passwordForm.slideUp("slow");
                passwordFormLabel.slideDown("slow");

                updateHeaderCardPassword.slideUp("slow");
                editHeaderCardPassword.slideDown("slow");
            });
        });
    </script>
@endpush
