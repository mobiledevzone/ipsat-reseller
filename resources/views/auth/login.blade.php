@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Login') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                        autocomplete="email" autofocus>
                </div>
                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">{{ __('Password') }}</label>
                        <div class="float-right">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required
                        autocomplete="current-password">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if(tenant())
    <div class="mt-5 text-muted text-center">
        {{ __('Donot have an account?') }} <a href="{{ route('register') }}">{{ __('Create One') }}</a>
    </div>
    @endif
    <div class="simple-footer">
        © 2021 {{ config('app.name') }}
    </div>


@endsection
