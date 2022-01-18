@extends('layouts.app')
@section('title', 'Email verify')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Forgot Password') }}</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">{{ __('We will send a link to reset your password') }}</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                        autocomplete="email" autofocus>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Forgot Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="simple-footer">
        © 2021 {{ config('app.name') }}
    </div>
@endsection
