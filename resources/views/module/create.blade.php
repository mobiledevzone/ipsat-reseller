@extends('layouts.main')
@section('title', __('Create module'))
@section('title')
    {{ __('Create Module') }}
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Module') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('modules.index') }}">{{ __('Modules') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Module') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            <form class="form-horizontal" method="POST" action="{{ route('modules.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" id="password"
                                        placeholder="{{ __('Name') }}" required>
                                    @if ($errors->has('module'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('module') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">{{ __('Permission') }}</label>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="managepermission" value="M">
                                        <label class="custom-control-label" for="managepermission">
                                            {{ __('Manage') }}
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="createpermission" value="C">
                                        <label class="custom-control-label" for="createpermission">
                                            {{ __('Create') }}
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="editpermission" value="E">
                                        <label class="custom-control-label" for="editpermission">
                                            {{ __('Edit') }}
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="deletepermission" value="D">
                                        <label class="custom-control-label" for="deletepermission">
                                            {{ __('Delete') }}
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="showpermission" value="S">
                                        <label class="custom-control-label" for="showpermission">
                                            {{ __('Show') }}
                                        </label>
                                    </div>
                                </div>
                                <a href="{{ route('modules.index') }}"
                                    class="btn btn-secondary">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary   ">{{ __('Create') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
