@extends('layouts.app')
@section('title', 'Reset password')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Reset Password') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group ">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <div class="">
                                <input id=" email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group ">
                    <label for="password">{{ __('Password') }}</label>
                    <div class="">
                                <input id=" password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group ">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <div class="">
                                <input id=" password-confirm" type="password"
                        class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
