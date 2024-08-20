@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')
<div class="contact">
    <x-contact-form/>

    <div class="contact__admins">
        @for ($i = 1; $i <= 8; $i++)
            <div class="contact__admins__card">
                <div class="contact__admins__img-container">
                    <img src="{{ asset('storage/photos/person_' . $i . '.jpg') }}" alt="admins_photo">
                </div>
                <div class="contact__admins__details">
                    <div class="contact__admins__details__name">Name</div>
                    <div class="contact__admins__details__email">Email@email.com</div>
                    <div class="contact__admins__details__phon-number">667 222 000</div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
