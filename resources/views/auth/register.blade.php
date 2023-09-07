@extends('layouts.auth')

@section('content')

<div class="page">
    <div class="page-main">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-5">
                    <form id="register-form" class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="logo-img text-center pb-3">
                            <img src="assets/img/brand/main-logo.png" width="195" alt="logo-img">
                        </div>
                        <span class="login100-form-title">
                            Member Register
                        </span>
                        <div class="text pt-2">
                            <span class="txt1">
                                Who are you?
                            </span>
                        </div>
                        <div class="nav-wrapper" style="border-bottom: 1px solid #b9b9b9; margin-bottom: 15px;">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="brand nav-link mb-sm-3 mb-md-0 {{$type === 'brand' ? 'active' : ''}}" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true" onclick="document.getElementById('type').value='0';"><i class="fe fe-users mr-2"></i>Brand</a>
                                </li>
                                <li class="nav-item">
                                    <a class="influencer nav-link mb-sm-3 mb-md-0 {{$type === 'brand' ? '' : 'active'}}" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false" onclick="document.getElementById('type').value='1';"><i class="fe fe-user mr-2"></i>Influencer</a>
                                </li>
                            </ul>
                            <input type="hidden" id="type" name="type" value="{{$type === 'brand' ? 0 : 1}}">
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Valid name is required: hsgaggs">
                            <!-- <input class="input100" type="text" name="anme" placeholder="User Name" required autocomplete="name" autofocus> -->
                            <input class="input100" type="text" name="name" placeholder="{{ __('auth.userName') }}" required autocomplete="name" autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fas fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="{{ __('auth.userEmail') }}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="{{ __('auth.userPassword') }}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fas fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password_confirmation" placeholder="{{ __('auth.userCPassword') }}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fas fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 reCaptcha-custom">

                        <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="{{env('NOCAPTCHA_SITEKEY', null)}}"></div>
                            <span id="error-captcha"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <a href="javascript:{}" onclick="document.getElementById('register-form').submit();" class="login100-form-btn btn-primary">
                                Create free account
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
                        <div class="text-center pt-2">
                            <span class="txt1">
                                By creating an account, I agree to the <a class="txt2 highlited-color" href="login">Terms</a> and <a class="txt2 highlited-color" href="login">Privacy Policy.</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

