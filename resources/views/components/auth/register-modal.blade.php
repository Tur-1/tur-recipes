<div class="userAuth">

    <div class="userAuthContent">

        <div id="register-form" class="auth-form-content ">
            <form method="POST" action="{{ route('register') }}" class="p-2">
                @csrf

                <div class="form-group ">
                    <label for="register_name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="">
                        <input id="register_name" type="text"
                            class="form-control {{ $errors->register->has('register_name') ? 'is-invalid' : '' }}"
                            name="register_name" value="{{ old('register_name') }}" autocomplete="name" autofocus>

                        @if ($errors->register->has('register_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->register->first('register_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="register_email" type="email"
                            class="form-control {{ $errors->register->has('register_email') ? 'is-invalid' : '' }}"
                            name="register_email" value="{{ old('register_email') }}" autocomplete="email">

                        @if ($errors->register->has('register_email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->register->first('register_email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">

                    <label for="register_password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="register_password" type="password"
                        class="form-control  {{ $errors->register->has('register_password') ? 'is-invalid' : '' }}"
                        name="register_password" autocomplete="new-password">

                    @if ($errors->register->has('register_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->register->first('register_password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="password-confirm"
                        class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        autocomplete="new-password">

                </div>



                <div class="userAuthHeading ">

                    <div
                        class="userAuthHeadingTab @if (count($errors->register) > 0) userAuthHeadingTab--invalid @endif">

                        <button type="submit" class="btn w-100" name="register">
                            Sign up
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
