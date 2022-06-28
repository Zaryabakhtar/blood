@extends('layouts.app')

@push('customCSS')
    <link href="{{ asset('panel/css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(panel/media/bg/bg-3.jpg);">
        <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
            <div class="kt-login__container">
                <div class="kt-login__logo">
                    <a href="#">
                        <img src="{{ asset('panel/media/logos/logo.png') }}" width="50">
                    </a>
                </div>
                <div class="kt-login__signin">
                    <div class="kt-login__head">
                        <h3 class="kt-login__title">Sign In To Admin</h3>
                    </div>
                    <form class="kt-form" action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="form-group fv-plugins-icon-container mb-1">
                            <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
                            @error('email')
                                <div class="fv-plugins-message-container">
                                    <div class="fv-help-block" data-validator="notEmpty">
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group fv-plugins-icon-container mb-1">
                            <input class="form-control" type="password" placeholder="Password" name="password">
                            @error('password')
                                <div class="fv-plugins-message-container" role="alert">
                                    <div class="fv-help-block" data-validator="notEmpty">
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="row kt-login__extra">
                            <div class="col">
                                <label class="kt-checkbox">
                                    <input type="checkbox" name="remember"> Remember me
                                    <span></span>
                                </label>
                            </div>
                            <div class="col kt-align-right">
                                <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
                            </div>
                        </div>
                        <div class="kt-login__actions">
                            <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('customJS')
@endpush