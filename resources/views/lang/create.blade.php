@extends('layouts.main')
@section('title', __('Language'))
@php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
@endphp
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Language') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a
                            href="{{ route('manage.language', [$currantLang]) }}">{{ __('Languages') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Create') }}</div>
                </div>
            </div>
            <div class="section-body">
                <form class="form-horizontal" method="POST" action="{{ route('store.language') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 mx-auto order-xl-1">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="heading-small text-muted mb-4">{{ __('Create Language') }}</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {{ Form::label('code', __('Language Code')) }}
                                                    {{ Form::text('code', '', ['class' => 'form-control', 'required' => 'required']) }}
                                                    @if ($errors->has('code'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <button type="
                                                    submit" class="btn btn-primary col-md-3 float-left custom-right ">
                                                    {{ __('Create Language') }}</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
