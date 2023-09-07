@extends('layouts.auth')

@section('content')

<div class="page">
    <div class="page-main">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-5">
                    <form id="resend-form" class="login100-form validate-form" method="POST" action="{{ route('resend') }}">
                        @csrf
                        <div class="logo-img text-center pb-3">
                            <img src="assets/img/brand/main-logo.png" width="195" alt="logo-img">
                        </div>
                        <span class="login100-form-title">
                            Email Confirmation
                        </span>
                        <div class="text pt-2">
                            <span class="txt1">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to ') }}
                                    </div>
                                @endif

                                {{ __('Before proceeding, please check your email for a verification link.') }}<br/>
                                {{ __('If you did not receive the email, click resend button to request another.') }}
                            </span>
                        </div>

                        <div class="wrap-input100 reCaptcha-custom">

                        <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="{{env('NOCAPTCHA_SITEKEY', null)}}"></div>
                            <span id="error-captcha"></span>
                        </div>
                        <input type="hidden" id="email" name="email" value="{{$email}}">

                        <div class="text-center pt-2">
                            <span class="txt1">
                                {{$email}}
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <a href="javascript:{}" onclick="document.getElementById('resend-form').submit();" class="login100-form-btn btn-primary">
                                {{ __('Resend') }}
                            </a>
                        </div>
                        <div class="text-center pt-2">
                            <span class="txt1">
                                Already you have an account?
                            </span>
                            <a class="txt2" href="login">
                                login here
                            </a>
                        </div>
                        <div class="text-center pt-1">
                            <a class="txt2" href="register">
                                Create your Account
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
