@extends('layouts.admin-layout')

@section('content')

<div class="admin">
    <div class="admin__left">
        @livewire('admin-page.show-list')
    </div>
    
    <div class="admin__right">
        @livewire('admin-page.add-tutorial')
        @livewire('admin-page.edit-tutorial')
    </div>
</div>

<script>
const addTutorialBtn = document.querySelector('#add_tutorial');  
const addTutorial = document.querySelector('.add-tutorial');

const editTutorialBtns = document.querySelectorAll('.edit-tutorial-btn');
const editTutorial = document.querySelector('.edit-tutorial');  

addTutorialBtn.addEventListener('click', () => {
    addTutorial.classList.add('active');    
    editTutorial.classList.remove('active');    
});

editTutorialBtns.forEach(editTutorialBtn => {
    editTutorialBtn.addEventListener('click', function() {
        editTutorial.classList.add('active');    
        addTutorial.classList.remove('active');
    });
});

</script>
@endsection
