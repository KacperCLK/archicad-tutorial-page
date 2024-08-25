@extends('layouts.admin-layout')

@section('content')
<div class="admin-form">
    <div class="admin-form__card admin-form__card--login">
        <div class="title title--admin-form"">
            {{ __('Login') }}
        </div>
        <form method="POST" class="admin-form__form" action="{{ route('login') }}">
            @csrf

            <div class="admin-form__input-box">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="input input--admin-form" autocomplete="email" autofocus>
                @error('email')
                    <span class="error-message error-message--admin-form">{{ $message }}</span>
                @enderror
            </div>

            <div class="admin-form__input-box">
                <label for="password" class="">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="input input--admin-form" autocomplete="current-password">
                @error('password')
                    <span class="error-message error-message--admin-form">{{ $message }}</span>
                @enderror
            </div>

            <div class="admin-form__checkbox-remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="input input--admin-checkbox" >
                <label for="remember">{{ __('Remember Me') }}</label>
            </div>

            <button type="submit" class="button button--admin-form">{{ __('Login') }}</button>

            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
