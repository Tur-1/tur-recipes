<div class="">
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="addRecipe" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <button type="button" class="back-btn bg-light" data-bs-dismiss="offcanvas" aria-label="Close">

                <i class="bi bi-chevron-down"></i>
            </button>
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">add recipe</h5>

            <div>

            </div>
        </div>
        <div class="offcanvas-body small">

        </div>
    </div>
</div>


{{-- <div class="offcanvas offcanvas-end top-recipe-offcanvas " tabindex="-1" data-bs-backdrop="false"
    id="top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}">
    <div class="offcanvas-header">
        <div class="header-btns">

            <button type="button" class="back-btn" data-bs-dismiss="offcanvas"
                data-bs-target="#top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}-{{ $loop->index }}"
                aria-label="Close">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button type="button" class="btn-fav">
                <i class="bi bi-heart"></i>
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
</div> --}}
