@extends('layouts.main')
@section('title', __($t))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $t }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('settings') }}">{{ __('Settings') }}</a></div>
                    <div class="breadcrumb-item">{{ $t }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ __('All About') }} {{ $t }}</h2>
                <p class="section-lead">
                    {{ __('You can adjust all ') }}{{ $t }} {{ __('here') }}
                </p>
                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Jump To') }}</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="{{ route('setting', 'app-setting') }}"
                                            class="nav-link active">{{ __('App Setting') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('setting', 'storage-setting') }}"
                                            class="nav-link">{{ __('Storage') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('setting', 'mail-setting') }}"
                                            class="nav-link">{{ __('Email') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('setting', 'chat-setting') }}"
                                            class="nav-link">{{ __('Chat') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('setting', 'general-setting') }}"
                                            class="nav-link">{{ __('General') }}</a></li>
                                    @if (\Auth::user()->type == 'Super Admin')
                                    <li class="nav-item "><a href="{{ route('setting', 'stripe-setting') }}"
                                            class="nav-link">{{ __('Stripe') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="setting-form" action="{{ route('settings/app-name/update') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4> {{ $t }}</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted"> {{ __('App Name') }} {{ __('& App Logo') }}</p>
                                    <div class="">
                                    <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('App application name') }} </label>
                                                <input type="text" name="app_name" class="form-control"
                                                    value="{{ Utility::getsettings('app_name') }}"
                                                    placeholder="{{ __('App application name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class="img img-responsive my-5 w-100 justify-content-center text-center"
                                                    src="{{ Utility::getpath('logo/app-logo.png') }}" alt="App_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">{{ __('Select Logo') }}</label>
                                                <input type="file" name="app_logo" class="form-control"
                                                    value="Select Logo">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class="img img-responsive my-5 w-100 justify-content-center text-center"
                                                    src="{{ Utility::getpath('logo/app-small-logo.png') }}"
                                                    alt="app_small_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">{{ __('Select small Logo') }}</label>
                                                <input type="file" name="app_small_logo" class="form-control"
                                                    value="Select Small  Logo">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class="img img-responsive my-5 w-100 justify-content-center text-center"
                                                    src="{{ Utility::getpath('logo/app-favicon-logo.png') }}"
                                                    alt="favicon_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">{{ __('Select favicon Logo') }}</label>
                                                <input type="file" name="favicon_logo" class="form-control"
                                                    value="Select Favicon Logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" type="submit"
                                    id="save-btn">{{ __('Save Changes') }}</button>
                                <a href="{{ route('settings') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
