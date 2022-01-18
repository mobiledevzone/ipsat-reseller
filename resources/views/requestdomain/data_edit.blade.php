@extends('layouts.main')
@section('title', __('Domain Request'))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit User') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('requestdomain.index') }}">{{ __('Domain Request') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Edit User') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            {!! Form::model($requestdomain, ['route' => ['requestdomain.update', $requestdomain->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group ">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" value="{{ $requestdomain->name }}" type="text" class="form-control"
                                    name="name" required autocomplete="name" placeholder="{{ __('Enter name') }}"
                                    autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" value="{{ $requestdomain->email }}"
                                    name="email" required placeholder="{{ __('Enter email') }}" autocomplete="email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="d-block">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control pwstrength"
                                    placeholder="{{ __('Enter password') }}" data-indicator="pwindicator" name="password"
                                    >
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="d-block">{{ __('Password Confirmation') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    placeholder="{{ __('Enter confirm password') }}" name="password_confirmation"
                                     autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                {{ Form::label('domains', __('Domain configration')) }}
                                <div class="input-group ">
                                    {!! Form::text('domains', $requestdomain->domain_name, ['class' => 'form-control', ' required', 'placeholder' => __('Enter domain name')]) !!}
                                </div>
                                <span>{{ __('how to add-on domain in your hosting panel.') }}<a
                                        href="{{ Storage::url('pdf/adddomain.pdf') }}" class="m-2"
                                        target="_blank">{{ __('Document') }}</a></span>
                            </div>
                            <div class="btn-flt">
                                <a href="{{ route('requestdomain.index') }}"
                                    class="btn btn-secondary">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection