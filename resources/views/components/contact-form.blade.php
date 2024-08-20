<form action="POST" class="contact--form">
    @csrf
    
    <div class="contact--form__title">Contact us</div>
    <input class="contact--form__input" type="text" placeholder="name">
    <input class="contact--form__input" type="text" placeholder="email address">
    <textarea class="contact--form__textarea" rows="4" placeholder="message"></textarea>

    <button class="contact--form__button button button--2">Submit</button>
</form>