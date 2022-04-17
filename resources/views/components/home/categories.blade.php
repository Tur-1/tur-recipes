<div class="categories">
    <div class="header">
        <strong>Categories</strong>

    </div>

    <div wire:ignore class="categories-row">
        @foreach ($categories as $category)
            <a role="button" href="#" wire:key="{{ $loop->index }}" class="category"
                data-categoryId="{{ $category['id'] }}" id="catgory-{{ $category['id'] }}"
                wire:click.prevent='getRecipesByCategory({{ $category['id'] }})'>
                <div class="image-container">
                    <img src="{{ $category['imageUrl'] }}" alt="">
                </div>
                <span class="title">
                    {{ $category['name'] }}
                </span>

            </a>
        @endforeach
    </div>

</div>
