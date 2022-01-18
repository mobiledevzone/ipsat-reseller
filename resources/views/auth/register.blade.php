@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Register') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group ">
                    <label for="name">{{ __('Name') }}</label>

                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="password" class="d-block">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" required>
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password2" class="d-block">{{ __('Password Confirmation') }}</label> <input
                        id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label>{{ __('Role:') }}
                    </label>
                    <div>
                        {!! Form::select('roles', $roles, [], ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                        <label class="custom-control-label"
                            for="agree">{{ __('I agree with the terms and conditions') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="simple-footer">
        © 2021 {{ config('app.name') }}
    </div>
@endsection
