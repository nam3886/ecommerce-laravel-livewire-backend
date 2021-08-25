<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to Skote.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('/images/profile-img.png') }}" alt="profile-img" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="javascript::void()">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ asset('/images/logo.svg') }}" alt="logo" class="rounded-circle"
                                            height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" wire:submit.prevent='login'>

                                <div class="form-group">
                                    <label for="useremail">Useremail</label>
                                    <input wire:model.lazy='user.email' type="text" class="form-control mb-1"
                                        id="useremail" placeholder="Enter user email">

                                    @error('user.email')
                                        <span class="toast-error text-white rounded px-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input wire:model.lazy='user.password' type="password" class="form-control mb-1"
                                        id="userpassword" placeholder="Enter password">

                                    @error('user.password')
                                        <span class="toast-error text-white rounded px-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input wire:model.lazy='user.remember_me' type="checkbox"
                                        class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember
                                        me</label>

                                    @error('user.remember_me')
                                        <span class="toast-error text-white rounded px-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>



                                {{-- <div class="mt-4 text-center">
                                    <h5 class="font-size-14 mb-3">Sign in with</h5>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript::void()"
                                                class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()"
                                                class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()"
                                                class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> --}}

                                <div class="mt-4 text-center">
                                    <a href="{{ route('admin.password.email') }}" class="text-muted"><i
                                            class="mdi mdi-lock mr-1"></i>
                                        Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
                        {{-- <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary">
                                Signup now </a> </p> --}}
                        <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@section('title', 'Login | Skote')
