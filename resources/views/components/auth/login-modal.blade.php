<div class="userAuth">

    <div class=" userAuthContent">


        <div id="login-form " class="auth-form-content  ">

            <form method="POST" action="{{ route('login') }}" class="p-2">
                @csrf

                <div class="form-group ">
                    <label for="email" class=" col-form-label text-md-right">Email</label>

                    <div class="">
                        <input id="email" type="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" autocomplete="email">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">

                    <label for="login_password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="login_password" type="password"
                        class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="userAuthHeading ">
                    <div data-form-target="#login-form"
                        class="userAuthHeadingTab  @if (count($errors->default) > 0) userAuthHeadingTab--invalid @endif">
                        <button type="submit" class="btn w-100" name="login">Sign
                            in</button>
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>
