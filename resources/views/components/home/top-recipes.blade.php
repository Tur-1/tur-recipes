<div class="top-recipes">
    <div class="header">
        <strong>Top {{ count($topRecipes) > 5 ? 5 : count($topRecipes) }} recipes</strong>
        <a role="button" href="#" class="border-0 bg-transparent" id="seeAllRecipes">
            <small class="see-all">see All</small>
        </a>
    </div>
    <div class="top-recipes-row">
        @forelse ($topRecipes as $recipe)
            <a role="button" href="#" class="top-recipe-item" data-bs-toggle="offcanvas"
                data-bs-target="#recipe-detail-{{ $recipe['id'] }}">
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

        @empty
            <div class="card border-0 bg-transparent">
                <div class="card-body text-center">
                    <h5 class="card-title">no recipes found</h5>
                </div>
            </div>
        @endforelse


    </div>


</div>
