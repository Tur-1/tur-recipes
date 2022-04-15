<div class="top-recipes">
    <div class="header">
        <strong>Top {{ count($topRecipes) > 5 ? 5 : count($topRecipes) }} recipes</strong>
        <a type="button" class="border-0 bg-transparent" id="seeAllRecipes">
            <small class="see-all">see All</small>
        </a>
    </div>
    <div class="top-recipes-row">
        @forelse ($topRecipes as $recipe)
            <a class="top-recipe-item" href="{{ route('recipeDetail', ['id' => $recipe['id']]) }}">
                <div class="image-container">
                    <img src="{{ $recipe['image'] }}">
                </div>
                <div class="top-recipe-item-details">
                    <div class="title">
                        <span> {{ $recipe['title'] }} </span>
                    </div>

                    <div class="recipe-kcal-Time">
                        <div>
                            <i class="bi bi-stopwatch"></i>
                            <span>{{ $recipe['readyInMinutes'] }} min</span>
                        </div>


                    </div>
                </div>
            </a>

        @empty
            <div class="card border-0 bg-transparent">
                <div class="card-body text-center">
                    <h5 class="card-title">no recipes found</h5>
                </div>
            </div>
        @endforelse


    </div>



    <div class="allRecipes offcanvas-end" id="allRecipes">
        <div class="header">
            <button type="button" id="closeAllRecipes">
                <i class="bi bi-chevron-left"></i>
            </button>
            <h5 class="allRecipesLabel">recipes</h5>
            <div></div>
        </div>
        <div class="allRecipes-body">

            @foreach ($recipes as $recipe)
                <a class="top-recipe-item" href="{{ route('recipeDetail', ['id' => $recipe['id']]) }}">
                    <div class="image-container">
                        <img src="{{ $recipe['image'] }}">
                    </div>
                    <div class="top-recipe-item-details">
                        <div class="title">
                            <span> {{ $recipe['title'] }} </span>
                        </div>

                        <div class="recipe-kcal-Time">
                            <div>
                                <i class="bi bi-stopwatch"></i>
                                <span>{{ $recipe['readyInMinutes'] }} min</span>
                            </div>


                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>

</div>
