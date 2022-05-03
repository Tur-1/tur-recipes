<div class="offcanvas offcanvas-bottom login-register-modal " id="register-modal" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <span class="header-border"></span>


    </div>
    <div class="offcanvas-body small">
        <form method="POST" action="{{ route('register') }}" id="register-form">
            @csrf

            <div class="form-group mb-3">
                <label for="register_name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="">
                    <input id="register_name" type="text" placeholder="name"
                        class="form-control {{ $errors->register->has('register_name') ? 'is-invalid' : '' }}"
                        name="register_name" value="{{ old('register_name') }}" autocomplete="name" autofocus>

                    @if ($errors->register->has('register_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->register->first('register_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="register_email" type="email"
                        class="form-control {{ $errors->register->has('register_email') ? 'is-invalid' : '' }}"
                        name="register_email" value="{{ old('register_email') }}" autocomplete="email"
                        placeholder="email">

                    @if ($errors->register->has('register_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->register->first('register_email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group mb-3">

                <label for="register_password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="register_password" type="password"
                    class="form-control  {{ $errors->register->has('register_password') ? 'is-invalid' : '' }}"
                    name="register_password" autocomplete="new-password" placeholder="password">

                @if ($errors->register->has('register_password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->register->first('register_password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="password-confirm"
                    class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    autocomplete="new-password">

            </div>



            <div class="userAuthHeadingTab @if (count($errors->register) > 0) userAuthHeadingTab--invalid @endif">

                <button type="submit" class="btn w-100" name="register">
                    Sign up
                </button>
            </div>

        </form>

    </div>
</div>
