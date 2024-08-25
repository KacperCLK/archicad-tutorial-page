<div class="edit-tutorial {{ $tutorial ? 'active' : ''}}">
    <h2 class="title title--admin-page">Edit tutorial:</h2>
    
    <div class="alert alert--success {{session()->has('message') ? 'alert--active' : ''}}">
        @if (session()->has('message'))
            <p>{{ session('message') }}</p>
        @endif
    </div>
    
    <form wire:submit.prevent="updateTutorial" class="add-tutorial__form">
        <div class="add-tutorial__input-box">
            <label for="number">Number:</label>
            <input class="input input--admin-page" type="number" id="number" wire:model="number">
            @error('number') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="add-tutorial__input-box">
            <label for="name">Title:</label>
            <input class="input input--admin-page" type="text" id="name" wire:model="name" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="add-tutorial__textarea-box">
            <label for="description">Description:</label>
            <textarea  class="textarea textarea--admin-page" id="description" wire:model="description" rows="5"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="add-tutorial__select-hints-box">
            <label for="selectedHints">Choose hints:</label>
            <div class="add-tutorial__all-hints">
                @foreach($allTutorials as $tutorial)
                    <div class="add-tutorial__hint">
                        <input 
                            value="{{ $tutorial->id }}" 
                            type="checkbox" 
                            id="hint-{{ $tutorial->id }}"
                            class="input input--admin-checkbox"
                            wire:model="selectedHints"
                        >
                        <label for="hint-{{ $tutorial->id }}">
                            {{ $tutorial->chapter->number }}.{{ $tutorial->number }}.{{ $tutorial->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        
            @error('selectedHints.*') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="add-tutorial__select-chapter-box">
            <select class="add-tutorial__select-chapter select select--admin-page" id="chapter_id" wire:model="chapter_id" required>
                <option value="">-- Select chapter --</option>
                @foreach($chapters as $chapter)
                    <option value="{{ $chapter->id }}">
                        {{ $chapter->number }}.{{ $chapter->name }}
                    </option>
                @endforeach
            </select>
            @error('chapter_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <button class="button button--admin-page" type="submit">Edytuj Tutorial</button>
        </div>
    </form>
</div>
