@extends('layouts.main')
@section('title', __('Settings'))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Settings') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Settings') }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ __('Overview') }}</h2>
                <p class="section-lead">
                    {{ __('Organize and adjust all settings about this site.') }}
                </p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="card-body">
                                <h4>{{ __('App Setting') }}</h4>
                                <p>{{ __('Logo & App Name Setting') }}</p>
                                <a href="{{ route('setting', 'app-setting') }}"
                                    class="card-cta">{{ __('Change Setting') }} <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fab fa-aws"></i>
                            </div>
                            <div class="card-body">
                                <h4>{{ __('Storage Setting') }}</h4>
                                <p>{{ __('AWS,S3 Storage Configuration') }}</p>
                                <a href="{{ route('setting', 'storage-setting') }}"
                                    class="card-cta">{{ __('Change Setting') }} <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="card-body">
                                <h4>{{ __('Email') }}</h4>
                                <p>{{ __('Email SMTP settings, notifications and others related to email.') }}</p>
                                <a href="{{ route('setting', 'mail-setting') }}"
                                    class="card-cta">{{ __('Change Setting') }} <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="card-body">
                                <h4>{{ __('Chat Setting') }}</h4>
                                <p>{{ __('Pusher Setting') }}</p>
                                <a href="{{ route('setting', 'chat-setting') }}"
                                    class="card-cta">{{ __('Change Setting') }} <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="card-body">
                                <h4>{{ __('General') }}</h4>
                                <p>{{ __('General Setting') }}</p>
                                <a href="{{ route('setting', 'general-setting') }}"
                                    class="card-cta">{{ __('Change Setting') }} <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @if (\Auth::user()->type == 'Super Admin')
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fab fa-stripe"></i>
                            </div>
                            <div class="card-body">
                                <h4>{{ __('Stripe') }}</h4>
                                <p>{{ __('Stripe Setting') }}</p>
                                <a href="{{ route('setting', 'stripe-setting') }}"
                                    class="card-cta">{{ __('Change Setting') }} <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
