@extends('layouts.auth')

@section('content')
<div class="page">
    <div class="page-main">
        <div class="limiter">
            <div class="container-login100">

                <div class="wrap-login100 p-5">
                    <form id="login-form" class="login100-form validate-form" method="POST" action="{{ route('reset') }}">
                        @csrf
                        <div class="logo-img text-center pb-3">
                            <img src="/assets/img/brand/main-logo.png" width="195" alt="logo-img">
                        </div>
                        <span class="login100-form-title">
                            Reset Password
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="_email" placeholder="Email" value={{$email}} disabled>
                            <input class="input100" type="hidden" name="email" value={{$email}}>
                            <input class="input100" type="hidden" name="resetToken" value={{$resetToken}}>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="New Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <a href="javascript:{}" onclick="document.getElementById('login-form').submit();" class="login100-form-btn btn-primary">
                                Reset
                            </a>
                        </div>

                        <div class="text-center pt-2">
                            <span class="txt1">
                                Resend
                            </span>
                            <a class="txt2" href="forgot">
                                {{-- Username / Password? --}}
                                Email
                            </a>
                        </div>

                        <div class="text-center pt-1">
                            <a class="txt2" href="login">
                                Return to Login
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
