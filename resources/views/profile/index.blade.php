@extends('layouts.main')
@section('title', __('Profile'))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Profile') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Profile') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        @include('layouts.includes.alerts')
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div id="avatar-holder" class="col-md-12">
                                        @if (tenant('id') == null)
                                            <img id="avatar-img"
                                                class="img profile-user-img img-responsive img-circle avtar w-50"
                                                src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                                                alt="User profile picture">
                                        @else
                                            @if (config('filesystems.default') == 'local')
                                                <img id="avatar-img"
                                                    class="img profile-user-img img-responsive img-circle avtar w-50"
                                                    src="{{ $user->avatar ? Storage::url(tenant('id') . '/' . $user->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                                                    alt="User profile picture">
                                            @else
                                                <img id="avatar-img"
                                                    class="img profile-user-img img-responsive img-circle avtar w-50"
                                                    src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                                                    alt="User profile picture">
                                            @endif
                                        @endif
                                        <h5 class="mt-3 mb-0"><b>{{ $user->name }}</b></h5>
                                        <p>{{ $user->email }}</p>
                                        <span class="mt-3 mb-0 d-block">
                                            <p>
                                                <b>{{ __('Role') }}:</b>
                                                {{ $role ? $role->name : 'Role Not Set' }}
                                            </p>
                                        </span>
                                        <span class="mt-0 d-block">
                                            <p><b>{{ __('Joined') }}:</b>
                                                {{ $user->created_at }}
                                            </p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item shadow mb-3 mr-2">
                                        <a class="nav-link active" id="login-details-tab" data-toggle="tab"
                                            href="#login-details" role="tab" aria-controls="login-details"
                                            aria-selected="false">{{ __('Login details') }}</a>
                                    </li>
                                    @if (Utility::getsettings('2fa'))
                                        <li class="nav-item shadow mb-3 mr-2">
                                            <a class="nav-link" id="tfa-settings-tab" data-toggle="tab"
                                                href="#tfa-settings" role="tab" aria-controls="tfa-settings"
                                                aria-selected="false">{{ __('Two factor auth') }}</a>
                                        </li>
                                    @endif
                                </ul>
                                <div class="tab-content mt-3 mx-0">
                                    <div class="tab-pane active" id="login-details" role="tabpanel"
                                        aria-labelledby="login-details-tab">
                                        <form class="form-horizontal" method="POST"
                                            action="{{ route('update-login', $user->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <div><label class="label-block">{{ __('email') }}</label></div>
                                                    <input type="text" name="email" value="{{ $user->email }}"
                                                        class="form-control">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div><label
                                                            class="label-block">{{ __('Choose file here') }}</label>
                                                    </div>
                                                    <input type="file" class="form-control" name="avatar"
                                                        data-filename="avatar">

                                                </div>
                                                <div class="col-md-6 my-1">
                                                    <div><label class="label-block">{{ __('password') }}</label>
                                                    </div>
                                                    <input type="password" name="password" value=""
                                                        placeholder="{{ __('Leave blank if you donot want to change') }}" class="form-control"
                                                        autocomplete="off">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 my-1">
                                                    <div><label
                                                            class="label-block">{{ __('Confirm password') }}</label>
                                                    </div>
                                                    <input type="password" name="password_confirmation" value=""
                                                        placeholder="{{ __('Leave blank if you donot want to change') }}" class="form-control"
                                                        autocomplete="off">
                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary col-sm-2">{{ __('Update login') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    @if (Utility::getsettings('2fa'))
                                        <div class="tab-pane" id="tfa-settings" role="tabpanel"
                                            aria-labelledby="tfa-settings-tab">
                                            <!--Google Two Factor Authentication card-->
                                            <div class="col-md-12">
                                                @include('layouts.includes.alerts')
                                                @if (empty(auth()->user()->loginSecurity))
                                                    <!--=============Generate QRCode for Google 2FA Authentication=============-->
                                                    <div class="row p-0">
                                                        <div class="col-md-12">
                                                            <p>{{ __('To activate Two factor Authentication Generate QRCode') }}</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <form class="" action="
                                                                {{ route('generate2faSecret') }}" method="post">
                                                                @csrf
                                                                <button
                                                                    class="btn btn-primary col-md-6">{{ __('Activate 2fa') }}</button>
                                                                <a class="btn btn-secondary col-md-5" data-toggle="collapse"
                                                                    href="#collapseExample" role="button"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseExample">{{ __('Setup Instruction') }}</a>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-12 mt-3 collapse" id="collapseExample">
                                                            <hr>
                                                            <h3 class="">{{ __('Two Factor Authentication(2FA) Setup Instruction') }}</h3>
                                                        <hr>
                                                        <div class="
                                                                mt-4">
                                                                <h4>{{ __('Below is a step by step instruction on setting up Two Factor Authentication') }}
                                                                </h4>
                                                                <p><label>{{ __('Step 1') }}:</label>
                                                                    {{ __('download') }}
                                                                    <strong>{{ __('Google Authenticator App') }}</strong>
                                                                    {{ __('Application for Andriod or iOS') }}
                                                                </p>
                                                                <p class="text-center">
                                                                    <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"
                                                                        target="_blank"
                                                                        class="btn btn-success">{{ __('Download for Andriod') }}<i
                                                                            class="fa fa-android fa-2x ml-2"></i></a>
                                                                    <a href="https://apps.apple.com/us/app/google-authenticator/id388497605"
                                                                        target="_blank"
                                                                        class="btn btn-dark ml-2">{{ __('Download for iPhones') }}<i
                                                                            class="fa fa-apple fa-2x ml-2"></i></a>
                                                                </p>
                                                                <p><label>{{ __('Step 2') }}:</label>
                                                                    {{ __('Click on Generate Secret Key on the platform to generate a QRCode') }}</p>
                                                                <p><label>{{ __('Step 3') }}:</label>
                                                                    {{ __('Open the') }}
                                                                    <strong>{{ __('Google Authenticator App') }}</strong>
                                                                    {{ __('and clcik on') }}
                                                                    <strong>{{ __('Begin') }}</strong>
                                                                    {{ __('on the mobile app') }}
                                                                </p>
                                                                <p><label>{{ __('Step 4') }}:</label>
                                                                    {{ __('After which click on') }}
                                                                    <strong>{{ __('Scan a QRcode') }}</strong>
                                                                </p>
                                                                <p><label>{{ __('Step 5') }}:</label>
                                                                    {{ __('Then scan the barcode on the platform') }}</p>
                                                                <p><label>{{ __('Step 6') }}:</label>
                                                                    {{ __('Enter the verification code generated on the platform and Enable 2FA') }}</p>
                                                                <hr>
                                                                <p><label>{{ __('Note') }}:</label>
                                                                    {{ __('To disable 2FA enter code from the Google Authenticator App and account password to disable 2FA') }}</p>
                                                        </div>
                                                    </div>
                                            </div>
                                            <!--=============Generate QRCode for Google 2FA Authentication=============-->
                                        @elseif(!auth()->user()->loginSecurity->google2fa_enable)
                                            <!--=============Enable Google 2FA Authentication=============-->
                                            <form class="form-horizontal" method="POST"
                                                action="{{ route('enable2fa') }}">
                                                @csrf
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <p><strong>{{ __('Scan the QRcode with') }}
                                                                <dfn>{{ __('Google Authenticator App') }}</dfn>
                                                                {{ __('Enter the generated code below') }}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12"><img src="{{ $google2fa_url }}" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>{{ __('To enable 2-Factor Authentication verify QRCode') }}</p>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="address"
                                                            class="control-label">{{ __('Verification code') }}</label>
                                                        <input type="password" name="secret" class="form-control"
                                                            id="code" placeholder="{{ __('Enter the verification code generated on the platform and Enable 2FA') }}">
                                                        @if ($errors->has('verify-code'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('verify-code') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-primary col-sm-2">{{ __('Enable 2FA') }}</button>
                                                </div>
                                            </form>
                                            <!--=============Enable Google 2FA Authentication=============-->
                                        @elseif(auth()->user()->loginSecurity->google2fa_enable)
                                            <!--=============Disable Google 2FA Authentication=============-->
                                            <form class="form-horizontal" method="POST"
                                                action="{{ route('disable2fa') }}">
                                                @csrf
                                                <div class="row form-group">
                                                    <div class="col-md-12"><img src="{{ $google2fa_url }}" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>{{ __('To disable 2-Factor Authentication verify QRCode') }}</p>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="address"
                                                            class="control-label">{{ __('current password') }}</label>
                                                        <input id="password" type="password"
                                                            placeholder="{{ __('Current Password') }}"
                                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                            name="current-password" required>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $error('password') }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-danger col-sm-2">{{ __('Disable 2FA') }}</button>
                                                </div>
                                            </form>
                                            <!--=============Disable Google 2FA Authentication=============-->
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
