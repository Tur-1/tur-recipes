 <form id="login-form " method="POST" action="{{ route('login') }}">
     @csrf

     <div class="form-group mb-2">
         <label for="email" class=" col-form-label text-md-right">Email</label>

         <div class="">
             <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                 name="email" value="{{ old('email') }}" autocomplete="email" placeholder="email">

             @if ($errors->has('email'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('email') }}</strong>
                 </span>
             @endif
         </div>
     </div>

     <div class="form-group mb-4">

         <label for="login_password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
         <input id="login_password" type="password" placeholder="password"
             class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">

         @if ($errors->has('password'))
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('password') }}</strong>
             </span>
         @endif
     </div>


     <div data-form-target="#login-form"
         class="userAuthHeadingTab  @if (count($errors->default) > 0) userAuthHeadingTab--invalid @endif">
         <button type="submit" class="btn w-100" name="login">Sign
             in</button>
     </div>

 </form>
