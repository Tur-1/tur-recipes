<div>

    <div wire:ignore.self class="offcanvas offcanvas-end w-100 bg-light" tabindex="-1" id="account-settings"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header shadow-sm">

            <button type="button" data-bs-dismiss="offcanvas"
                class="bg-transparent text-dark border-0 text-start ms-0 ps-0">
                <i class="fas fa-chevron-left fa-1x"></i>
            </button>


            <h6 class=" offcanvas-title text-uppercase" id="offcanvasExampleLabel">My profile</h6>
            <div></div>
        </div>
        <div class="offcanvas-body p-0 mt-3">


            <div class="card shadow-sm mb-4 w-100 border-0">
                <div class="profile-card-header " id="edit-header-card-account">
                    <h6 class="card-title">ACCOUNT INFO</h6>
                    <button class=" bg-transparent border-0" id="open-account-from-btn">
                        <i class="far fa-edit fa-lg"></i>
                    </button>
                </div>
                <div class="profile-card-header " id="update-header-card-account">
                    <button class="btn-close " id="close-account-from-btn"> </button>
                    <h6 class="card-title">ACCOUNT INFO</h6>
                    <a role="button" href="#" class="text-success font-size-25" wire:click.prevent="updateAccountInfo">
                        <i class="fa-solid fa-check"></i>
                    </a>
                    </button>
                </div>
                <div class="card-body">
                    <div class="border account-form-labal ">
                        <div class="mb-2">
                            <span>Name :</span> <span>{{ $name }}</span>
                        </div>
                        <div class="mb-2">
                            <span>Email :</span> <span>{{ $email }}</span>
                        </div>
                    </div>



                    <div class="account-form">
                        <form>
                            <div class="form-group ">
                                <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="">
                                    <input id="name" type="text"
                                        class="form-control  @error('name') is-invalid @enderror "
                                        wire:model.lazy="name" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="email"
                                    class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        wire:model.lazy="email" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

            <div class="card shadow-sm mb-4 w-100 border-0">

                <div class="profile-card-header " id="edit-header-card-password">
                    <h6 class="card-title">Password</h6>
                    <button class=" bg-transparent border-0" id="open-password-from-btn">
                        <i class="far fa-edit fa-lg"></i>
                    </button>

                </div>
                <div class="profile-card-header " id="update-header-card-password">
                    <button class="btn-close " id="close-password-from-btn"> </button>
                    <h6 class="card-title">Password</h6>
                    <a role="button" href="#" class="text-success font-size-25" wire:click.prevent="submit">
                        <i class="fa-solid fa-check"></i>
                    </a>
                    </button>
                </div>
                <div class="card-body">
                    <div class=" password-form-labal">
                        <input class="w-100 p-2 border" placeholder="*********" disabled="">
                    </div>


                    <div class="password-form">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label ">current Password*</label>
                            <input wire:model.defer='current_password'
                                class="form-control  {{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                                type="password" autocomplete="on">
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">New Password*</label>
                            <input wire:model.defer='new_password'
                                class="form-control  {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                                type="password" autocomplete="on">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail3" class="form-label">Confirm New Password*</label>
                            <input wire:model.defer='new_password_confirmation' type="password"
                                class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : '' }}"
                                id="exampleInputEmail3" autocomplete="on">
                            @error('new_password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
