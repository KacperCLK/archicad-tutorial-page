@extends('layouts.admin-layout')

@section('content')
<div class="admin-form">
    <div class="admin-form__card admin-form__card--register">
        <div class="admin-form__title">{{ __('Register') }}</div>

        <form class="admin-form__form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="admin-form__input">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" required autocomplete="name" autofocus>
            </div>

            <div class="admin-form__input">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>

            <div class="admin-form__input">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <div class="admin-form__input">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="admin-form__button">
                {{ __('Register') }}
            </button>
        </form>
    </div>
</div>
@endsection
