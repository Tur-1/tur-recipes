<div class="recommend-recipes">
    <strong>Recommend recipes</strong>
    <div wire:ignore class="recommend-recipes-row">


        @foreach ($recommendRecipes as $recipe)
            <a class="card" wire:click.prevent='showRecipe({{ $recipe['id'] }})'>
                <div class="card-image-container">
                    <img src="{{ $recipe['image'] }}" alt="...">
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <span>
                            {{ $recipe['title'] }}
                        </span>
                    </div>
                    <div class="recipe-kcal-Time">
                        <div class="me-3">
                            <i class="bi bi-stopwatch"></i>
                            <span>{{ $recipe['readyInMinutes'] }} min</span>
                        </div>


                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @if ($showRecipe)
        <div class="offcanvas offcanvas-end top-recipe-offcanvas " tabindex="-1" data-bs-backdrop="false"
            id="recipe-{{ $recipe['id'] }}">
            <div class="offcanvas-header">
                <div class="header-btns">

                    <button type="button" class="back-btn" data-bs-dismiss="offcanvas"
                        data-bs-target="#recipe-{{ $recipe['id'] }}" aria-label="Close">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                </div>
                <div class="image-container">
                    <img src="{{ $recipe['image'] }}" alt="...">
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
                                    {{ $recipe['title'] }}

                                </span>
                                <div class="recipe-time-kcal">
                                    <div class="time">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>{{ $recipe['readyInMinutes'] }} Minute</span>
                                    </div>
                                    <span class="recipe-time-kcal-border"></span>
                                    <div class="rating">
                                        <i class="fa-regular fa-star"></i>
                                        <span>3,6</span>
                                    </div>
                                    <span class="recipe-time-kcal-border"></span>
                                    <div class="kcal">
                                        <i class="fa-solid fa-fire"></i>
                                        {{-- <span>{{ $recipe['calories'] }} Kcal</span> --}}
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
                                <span>{{ $recipe['carbs'] }}
                                    carbs</span>
                            </div>
                            <div class="nutrition-element">
                                <div class="image-container">
                                    <img src="{{ asset('assets/icons/pizza-slice.png') }}">
                                </div>
                                <span>{{ $recipe['fat'] }}
                                    Fat</span>
                            </div>
                        </div>
                        <div class="nutrition-row">
                            <div class="nutrition-element">
                                <div class="image-container">
                                    <img src="{{ asset('assets/icons/avocado.png') }}">
                                </div>
                                <span> {{ $recipe['protein'] }} protein</span>
                            </div>
                        </div>

                    </div>


                    <div class="ingredients">
                        <ul class="nav nav-tabs|pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="ingredients-{{ $recipe['id'] }}-tab"
                                    data-bs-toggle="tab" data-bs-target="#ingredients-{{ $recipe['id'] }}"
                                    type="button" role="tab" aria-controls="ingredients-{{ $recipe['id'] }}"
                                    aria-selected="true">ingredients</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="instructions-{{ $recipe['id'] }}-tab"
                                    data-bs-toggle="tab" data-bs-target="#instructions-{{ $recipe['id'] }}"
                                    type="button" role="tab">instructions
                                </button>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="ingredients-{{ $recipe['id'] }}" role="tabpanel"
                                aria-labelledby="ingredients-{{ $recipe['id'] }}-tab">
                                @foreach ($recipe['extendedIngredients'] as $ingredient)
                                    <div class="card ingredients-card">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{ $ingredient['original'] }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="tab-pane" id="instructions-{{ $recipe['id'] }}" role="tabpanel"
                                aria-labelledby="instructions-{{ $recipe['id'] }}-tab">
                                {{ $recipe['instructions'] }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endif


</div>
