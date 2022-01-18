@extends('layouts.main')
@section('title', __('Edit module'))
@section('title')
    {{ __('Edit Module') }}
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> {{ __('Edit Module') }}
                </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('modules.index') }}">{{ __('Modules') }}</a>
                    </div>
                    <div class="breadcrumb-item"> {{ __('Edit Module') }}
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            <form class="form-horizontal" method="POST"
                                action="{{ route('modules.update', $module->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $module->name }}"
                                        placeholder="{{ __('Name') }}" required>
                                    @if ($errors->has('module'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('module') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('modules.index') }}"
                                    class="btn btn-secondary">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary  ">{{ __('Update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
