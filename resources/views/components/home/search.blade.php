<div class="search-field">
    <div class=" input-group ">
        <button type="button" class="input-group-text" id="basic-addon1" wire:click.prevent='searchRecipes'>
            <i class="fas fa-search""></i>
        </button>
        <input type=" text" class="form-control" wire:model.lazy='searchValue' placeholder="recipes"
                aria-label="recipes" aria-describedby="basic-addon1">
    </div>

</div>
