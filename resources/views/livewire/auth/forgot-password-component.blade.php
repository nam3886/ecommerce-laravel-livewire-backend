<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary"> Reset Password</h5>
                                    <p>Re-Password with Skote.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('/images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="javascript::void()">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ asset('/images/logo.svg') }}" alt="" class="rounded-circle"
                                            height="34">
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="p-2">
                            <div class="alert alert-success text-center mb-4" role="alert">
                                Enter your Email and instructions will be sent to you!
                            </div>
                            <form wire:submit.prevent='sendMailResetLink' class="form-horizontal">

                                <div class="form-group">
                                    <label for="useremail">Email</label>
                                    <input wire:model.lazy='email' type="email" class="form-control mb-1" id="useremail"
                                        placeholder="Enter email">

                                    @error('email')
                                        <span class="toast-error text-white rounded px-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-12 text-right">

                                        <button wire:loading.class='not-allowed'
                                            class="btn btn-primary w-md waves-effect waves-light" type="submit">

                                            <div class="d-flex align-items-center justify-content-center">
                                                <div wire:loading class="spinner-border spinner-border-sm mr-3">
                                                </div>
                                                <span class='text-capitalize'>
                                                    Email Password Reset Link
                                                </span>
                                            </div>

                                        </button>

                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>Remember It ? <a href="{{ route('admin.login') }}" class="font-weight-medium text-primary">
                            Sign In here</a>
                    </p>
                    <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>

            </div>
        </div>
    </div>
</div>

@section('title', 'Forgot Password | Skote')
