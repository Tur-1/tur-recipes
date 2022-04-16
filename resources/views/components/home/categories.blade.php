<div class="categories">
    <div class="header">
        <strong>Categories</strong>

    </div>
    <div wire:ignore class="categories-row">
        @foreach ($categories as $category)
            <a class="category" wire:click.prevent='getRecipesByCategory({{ $category['id'] }})'>
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
