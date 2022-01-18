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
                    {{ __('You can adjust all') }} {{ $t }} {{ __('here') }}
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
                                            class="nav-link ">{{ __('App Setting') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('setting', 'storage-setting') }}"
                                            class="nav-link ">{{ __('Storage') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('setting', 'mail-setting') }}"
                                            class="nav-link ">{{ __('Email') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('setting', 'chat-setting') }}"
                                            class="nav-link active">{{ __('Chat') }}</a></li>
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
                        <form id="setting-form" action="{{ route('settings/pusher-setting/update') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4> {{ $t }}</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted"> {{ __('Pusher Setting') }} <a href="https://pusher.com/"
                                            class="m-2" target="_blank">{{ __('Document') }}</a> </p>
                                    <div class="">
                                        <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('Pusher App ID') }}</label>
                                                <input type="text" name="pusher_id" class="form-control"
                                                    value="{{ Utility::getsettings('pusher_id') }}" required
                                                    placeholder="{{ __('Pusher App ID') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('Pusher Key') }}</label>
                                                <input type="text" name="pusher_key" class="form-control"
                                                    value="{{ Utility::getsettings('pusher_key') }}" required
                                                    placeholder="{{ __('Pusher Key') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('Pusher Secret') }}</label>
                                                <input type="text" name="pusher_secret" class="form-control"
                                                    value="{{ Utility::getsettings('pusher_secret') }}" required
                                                    placeholder="{{ __('Pusher Secret') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('Pusher Cluster') }}</label>
                                                <input type="text" name="pusher_cluster" class="form-control"
                                                    value="{{ Utility::getsettings('pusher_cluster') }}" required
                                                    placeholder="{{ __('Pusher Cluster') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label for="status_toggle">{{ __('Status') }}</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="custom-switch mt-2 custom-left float-right">
                                                        <input name="pusher_status" class="custom-switch-input"
                                                            type="checkbox"
                                                            {{ Utility::getsettings('pusher_status') ? 'checked' : 'unchecked' }}>
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
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
