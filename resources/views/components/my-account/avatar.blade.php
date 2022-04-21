<div class="account-wrapper">
    <label wire:loading.class='opacity-3' class="account-image-container" for="avatar">

        <img src="{{ $avatar ? $avatar->temporaryUrl() : auth()->user()->avatar_url }}" alt="">

        <span>Edit</span>

    </label>


    <input type="file" id="avatar" class="d-none" wire:model="avatar" name="avatar">

    <div id="image-spinner" wire:loading class='card-body' wire:target='avatar'>
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

    </div>

    <div class="user-name">
        <h4>{{ auth()->user()->name }}</h4>
    </div>
</div>
