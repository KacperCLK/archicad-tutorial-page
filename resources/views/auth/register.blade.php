@extends('layouts.admin-layout')

@section('content')
<div class="admin-form">
    <div class="admin-form__card admin-form__card--register">
        <div class="title title--admin-form"">{{ __('Register') }}</div>

        <form class="admin-form__form" method="POST" action="{{ route('register') }}">
            @csrf
        
            <div class="admin-form__input-box">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" class="input input--admin-form" value="{{ old('name') }}" autofocus>
                @error('name')
                    <span class="error-message error-message--admin-form">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="admin-form__input-box">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" class="input input--admin-form" value="{{ old('email') }}">
                @error('email')
                    <span class="error-message error-message--admin-form">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="admin-form__input-box">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="input input--admin-form" autocomplete="new-password">
                @error('password')
                    <span class="error-message error-message--admin-form">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="admin-form__input-box">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" class="input input--admin-form" autocomplete="new-password">
                @error('password')
                    <span class="error-message error-message--admin-form">{{ $message }}</span>
                @enderror
            </div>
        
            <button type="submit" class="button button--admin-form">
                {{ __('Register') }}
            </button>
        </form>
    </div>
</div>
@endsection
