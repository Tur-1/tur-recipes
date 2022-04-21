<div class="top-recipes d-flex flex-column justify-content-center">
    <div class="header">
        <strong>Top {{ count($topRecipes) > 5 ? 5 : count($topRecipes) }} recipes</strong>
        <button type="button" class="border-0 bg-transparent" id="seeAllRecipesbtn">
            <small class="see-all">see All</small>
        </button>
    </div>
    <div wire:loading.remove wire:target='getRecipesByCategory' class="top-recipes-row">
        @forelse ($topRecipes as $recipe)
            <a role="button" href="#" class="top-recipe-item"
                wire:click.prevent='openRecipeModal({{ $recipe['id'] }})'>
                <div class="image-container">
                    <img src="{{ $recipe['image_url'] }}">
                </div>
                <div class="top-recipe-item-details">
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
                            <span>{{ intval($recipe['calories']) }} </span>
                        </div>


                    </div>
                </div>
            </a>

        @empty

            <div class="text-center text-white">
                <h5 class="card-title">no recipes found</h5>
            </div>
        @endforelse



    </div>

    <div wire:loading wire:target='getRecipesByCategory' class="text-center p-3">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
