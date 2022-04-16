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
            <a class="top-recipe-item" data-bs-toggle="offcanvas" data-bs-target="#recipe-detail-{{ $recipe['id'] }}">
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
</div>