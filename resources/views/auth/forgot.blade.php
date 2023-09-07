@extends('layouts.auth')

@section('content')
<div class="page">
    <div class="page-main">
        <div class="limiter">
            <div class="container-login100">

                <div class="wrap-login100 p-5">
                    <form id="login-form" class="login100-form validate-form" method="POST" action="{{ route('forgot') }}">
                        @csrf
                        <div class="logo-img text-center pb-3">
                            <img src="/assets/img/brand/main-logo.png" width="195" alt="logo-img">
                        </div>
                        <span class="login100-form-title">
                            Trouble signing in?
                        </span>

                        Don't worry, we've got your back! Just enter your email address and we'll send you a link with which you can reset your password.
                        <br/>
                        <br/>
                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 reCaptcha-custom">

                        <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="{{$NOCAPTCHA_SITEKEY}}"></div>
                            <span id="error-captcha"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <a href="javascript:{}" onclick="document.getElementById('login-form').submit();" class="login100-form-btn btn-primary">
                                Submit
                            </a>
                        </div>

                        <div class="text-center pt-2">
                            <span class="txt1">
                                Return to
                            </span>
                            <a class="txt2" href="login">
                                {{-- Username / Password? --}}
                                Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
