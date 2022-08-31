{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    background: #dfe7e9;
    font-family: 'Roboto', sans-serif;
}
.login-form {
    width: 500px;
    margin: 30px auto;
}
.login-form form {        
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .login-btn {
    border-radius: 2px;
}
.input-group-prepend .fa {
    font-size: 18px;
}
.login-btn {
    font-size: 15px;
    font-weight: bold;
    min-height: 40px;
}
.social-btn .btn {
    border: none;
    margin: 10px 3px 0;
    opacity: 1;
}
.social-btn .btn:hover {
    opacity: 0.9;
}
.social-btn .btn-secondary, .social-btn .btn-secondary:active {
    background: #507cc0 !important;
}
.social-btn .btn-info, .social-btn .btn-info:active {
    background: #64ccf1 !important;
}
.social-btn .btn-danger, .social-btn .btn-danger:active {
    background: #df4930 !important;
}
.or-seperator {
    margin-top: 20px;
    text-align: center;
    border-top: 1px solid #ccc;
}
.or-seperator i {
    padding: 0 10px;
    background: #f7f7f7;
    position: relative;
    top: -11px;
    z-index: 1;
}

</style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Reset Password</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Reset Password</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb -->
    <!-- Reset pw begins -->
    <div class="login-form">
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <h2 class="text-center">Reset Password</h2>  
        <div>
        </br>
        </div>
        <div class="form-group">
            <x-jet-validation-errors class="mb-4" />
            <label for="email">Email Address:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>                    
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="Type your email address" :value="{{ $request->email }}" required autofocus>             
            </div>

        <label for="password">New password:</label>
        <div class="form-group">
            <input type="password" class="form-control input-lg" name="password" id="password" placeholder="New Password" required autocomplete="new-password">
        </div>

        <label for="password_confirmation">Confirm password:</label>
        <div class="form-group">
            <input type="password" class="form-control input-lg" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
        </div>  


        </div>    
        <div class="form-group">
            <button type="submit" class="btn btn-primary login-btn btn-block" name="submit">Change Password</button>
        </div>
    </form>
    <p class="text-center text-muted small">Password reset link will be sent to your email address!</p>
</div>
    <!-- Reset pw ends -->
</x-guest-layout>

