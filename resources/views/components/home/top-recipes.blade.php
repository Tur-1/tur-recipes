<div class="top-recipes">
    <div class="header">
        <strong>Top 5 recipes</strong>
        <a type="button" class="border-0 bg-transparent" id="seeAllRecipes">
            <small class="see-all">see All</small>
        </a>
    </div>
    <div class="top-recipes-row">
        @forelse ($topRecipes as $recipe)
            <a class="top-recipe-item" data-bs-toggle="offcanvas"
                data-bs-target="#top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}">
                <div class="image-container">
                    <img src="{{ $recipe['recipe']['image'] }}">
                </div>
                <div class="top-recipe-item-details">
                    <div class="title">
                        <span> {{ $recipe['recipe']['label'] }} </span>
                    </div>

                    <div class="recipe-kcal-Time">
                        <div>
                            <i class="bi bi-stopwatch"></i>
                            <span>{{ $recipe['recipe']['totalTime'] }} min</span>
                        </div>

                        <div>
                            <i class="fa-solid fa-fire"></i>
                            <span>{{ intval($recipe['recipe']['calories']) }} </span>
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
                <a class="top-recipe-item" data-bs-toggle="offcanvas"
                    data-bs-target="#top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}">
                    <div class="image-container">
                        <img src="{{ $recipe['recipe']['image'] }}">
                    </div>
                    <div class="top-recipe-item-details">
                        <div class="title">
                            <span> {{ $recipe['recipe']['label'] }} </span>
                        </div>

                        <div class="recipe-kcal-Time">
                            <div>
                                <i class="bi bi-stopwatch"></i>
                                <span>{{ $recipe['recipe']['totalTime'] }} min</span>
                            </div>

                            <div>
                                <i class="fa-solid fa-fire"></i>
                                <span>{{ intval($recipe['recipe']['calories']) }} </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>

    @foreach ($recipes as $recipe)
        <div class="offcanvas offcanvas-end top-recipe-offcanvas " tabindex="-1" data-bs-backdrop="false"
            id="top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}">
            <div class="offcanvas-header">
                <div class="header-btns">

                    <button type="button" class="back-btn" data-bs-dismiss="offcanvas"
                        data-bs-target="#top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}"
                        aria-label="Close">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                </div>
                <div class="image-container">
                    <img src="{{ $recipe['recipe']['image'] }}" alt="...">
                </div>



            </div>
            <div class="offcanvas-body small">

                <div class="offcanvas-recipe-details">
                    <div class="offcanvas-recipe-details-header">
                        <div class="card">
                            <button type="button" class="btn-fav">
                                <i class="bi bi-heart"></i>
                            </button>
                            <div class="card-body">

                                <span class="recipe-label">
                                    {{ $recipe['recipe']['label'] }}

                                </span>
                                <div class="recipe-time-kcal">
                                    <div class="time">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>{{ $recipe['recipe']['totalTime'] }} Minute</span>
                                    </div>
                                    <span class="recipe-time-kcal-border"></span>
                                    <div class="rating">
                                        <i class="fa-regular fa-star"></i>
                                        <span>3,6</span>
                                    </div>
                                    <span class="recipe-time-kcal-border"></span>
                                    <div class="kcal">
                                        <i class="fa-solid fa-fire"></i>
                                        <span>{{ intval($recipe['recipe']['calories']) }} Kcal</span>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="nutrients">
                        <div class="nutrition-row">
                            <div class="nutrition-element">
                                <div class="image-container">
                                    <img src="{{ asset('assets/icons/wheat.png') }}">
                                </div>
                                <span>{{ intval($recipe['recipe']['totalNutrients']['CHOCDF']['quantity']) .' ' .$recipe['recipe']['totalNutrients']['CHOCDF']['unit'] }}
                                    carbs</span>
                            </div>
                            <div class="nutrition-element">
                                <div class="image-container">
                                    <img src="{{ asset('assets/icons/pizza-slice.png') }}">
                                </div>
                                <span>
                                    {{ intval($recipe['recipe']['totalNutrients']['FAT']['quantity']) .' ' .$recipe['recipe']['totalNutrients']['FAT']['unit'] }}

                                    Fat</span>
                            </div>
                        </div>
                        <div class="nutrition-row">
                            <div class="nutrition-element">
                                <div class="image-container">
                                    <img src="{{ asset('assets/icons/avocado.png') }}">
                                </div>
                                <span>
                                    {{ intval($recipe['recipe']['totalNutrients']['PROCNT']['quantity']) .' ' .$recipe['recipe']['totalNutrients']['PROCNT']['unit'] }}

                                    protin</span>
                            </div>
                        </div>

                    </div>


                    <div class="ingredients">
                        <ul class="nav nav-tabs|pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active"
                                    id="ingredients-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#ingredients-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}"
                                    type="button" role="tab"
                                    aria-controls="ingredients-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}"
                                    aria-selected="true">ingredients</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="instructions-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#instructions-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}"
                                    type="button" role="tab">instructions
                                </button>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active"
                                id="ingredients-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}"
                                role="tabpanel"
                                aria-labelledby="ingredients-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}-tab">
                                @foreach ($recipe['recipe']['ingredientLines'] as $ingredient)
                                    <div class="card ingredients-card">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{ $ingredient }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="tab-pane"
                                id="instructions-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}"
                                role="tabpanel"
                                aria-labelledby="instructions-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}-tab">
                                ......... instructions
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach





</div>
