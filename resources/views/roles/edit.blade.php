@extends('layouts.main')
@section('title', __('Edit role'))

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Role') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Edit Role') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'Put', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group ">
                                {{ Form::label('name', __('First Name')) }}
                                <div class="input-group  ">
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter First Name'),' required']) }}
                                </div>
                            </div>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            <button type="sub" class="btn btn-primary">{{ __('Update ') }}</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
