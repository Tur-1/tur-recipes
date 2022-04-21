<div class="recommend-recipes">
    <strong>Recommend recipes</strong>
    <div wire:ignore class="recommend-recipes-row">


        @foreach ($recommendRecipes as $recipe)
            <a role="button" href="#" class="card recipe-card"
                wire:click.prevent='openRecipeModal({{ $recipe['id'] }})'>
                <img src="{{ $recipe['image_url'] }}">
                <div class="recipe-item-details">

                    <div class="title">
                        <span> {{ $recipe['title'] }} </span>
                    </div>

                    <div class="recipe-kcal-Time">

                        <div>
                            <i class="fa-regular fa-clock me-1"></i>
                            <span>{{ $recipe['ready_in_minutes'] }} </span>
                        </div>
                        <div>
                            <i class="fa-solid fa-fire"></i>
                            <span>{{ intval($recipe['calories']) }} Kcal</span>
                        </div>

                    </div>
                </div>
            </a>
        @endforeach
    </div>
    {{-- <a role="button" href="#" class="card" wire:click.prevent='openRecipeModal({{ $recipe['id'] }})'>
        <div class="card-image-container">
            <img src="{{ $recipe['image_url'] }}" alt="...">
        </div>
        <div class="card-body">
            <div class="card-title">
                <span>
                    {{ $recipe['title'] }}
                </span>
            </div>
            <div class="recipe-kcal-Time">
                <div>
                    <i class="fa-regular fa-clock me-1"></i>
                    <span>{{ $recipe['ready_in_minutes'] }} </span>
                </div>
                <div>
                    <i class="fa-solid fa-fire"></i>
                    <span>{{ intval($recipe['calories']) }} </span>
                </div>
            </div>
        </div>
    </a> --}}

</div>
