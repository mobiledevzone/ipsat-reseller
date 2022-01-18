@extends('layouts.main')
@section('title', __('Create role'))

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Role') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Create Role') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            {!! Form::open(['route' => 'roles.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group  ">
                                {{ Form::label('name', __('Name')) }}
                                <div class="input-group ">
                                    {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            <button type="sub" class="btn btn-primary">{{ __('Save ') }} </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
