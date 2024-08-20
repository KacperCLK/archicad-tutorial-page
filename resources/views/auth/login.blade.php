@extends('layouts.admin-layout')

@section('content')
<div class="admin-form">
    <div class="admin-form__card admin-form__card--login">
        <div class="admin-form__title">
            {{ __('Login') }}
        </div>
        <form method="POST" class="admin-form__form" action="{{ route('login') }}">
            @csrf

            <div class="admin-form__input">
                <label for="email">{{ __('Email Address') }}</label>
                <!-- Dodano atrybut name -->
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            <div class="admin-form__input">
                <label for="password" class="">{{ __('Password') }}</label>
                <!-- Dodano atrybut name -->
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="admin-form__checkbox-remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">{{ __('Remember Me') }}</label>
            </div>

            <button type="submit" class="admin-form__button">{{ __('Login') }}</button>

            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
