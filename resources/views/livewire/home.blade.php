<div>
    <div class="search-field input-group shadow-sm">
        <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    <div class="recommend-recipes">
        <strong>Recommend recipes</strong>
        <div wire:ignore class="recommend-recipes-row">
            <div class="card">
                <img src="{{ asset('assets/images/bur.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <div class="card-title">
                        <span>
                            card-recipe card-recipe card-recipe
                            card-recipe
                            card-recipe card-recipe
                        </span>
                    </div>

                    <div class="recipe-kcal-Time">
                        <div class="me-3">
                            <i class="bi bi-stopwatch"></i>
                            <span>23 min</span>
                        </div>

                        <div>
                            <i class="fa-solid fa-fire"></i>
                            <span>177 </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('assets/images/bur.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <div class="card-title">
                        <span>
                            card-recipe card-recipe card-recipe
                            card-recipe
                            card-recipe card-recipe
                        </span>
                    </div>

                    <div class="recipe-kcal-Time">
                        <div class="me-3">
                            <i class="bi bi-stopwatch"></i>
                            <span>23 min</span>
                        </div>

                        <div>
                            <i class="fa-solid fa-fire"></i>
                            <span>177 </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="categories">
        <div class="header">
            <strong>Categories</strong>
            <small class="see-all">see All</small>
        </div>
        <div wire:ignore class="categories-row">
            @foreach ($categories as $category)
                <a class="category" wire:click.prevent='getRecipes({{ $category['id'] }})'>
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

    <div class="top-recipes">
        <div class="header">
            <strong>Top recipes</strong>
            <small class="see-all">see All</small>
        </div>
        <div class="top-recipes-row">
            @foreach ($recipes as $recipe)
                <a class="top-recipe-item" data-bs-toggle="offcanvas"
                    data-bs-target="#top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}">
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




        @foreach ($recipes as $recipe)
            <div class="offcanvas offcanvas-bottom top-recipe-offcanvas" tabindex="-1"
                id="top-recipe-offcanvas-{{ Str::slug($recipe['recipe']['label']) }}"
                aria-labelledby="offcanvasBottomLabel">
                <div class="offcanvas-header">

                    <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                    <button type="button" class="btn-fav">
                        <i class="bi bi-heart"></i>
                    </button>

                </div>
                <div class="offcanvas-body small">
                    <div class="offcanvas-image-container">
                        <div class="image">
                            <img src="{{ $recipe['recipe']['image'] }}">
                        </div>
                    </div>
                    <div class="offcanvas-recipe-details">
                        <div class="offcanvas-recipe-details-header">
                            <span class="header-border"></span>
                            <span class="recipe-label">
                                {{ $recipe['recipe']['label'] }}

                            </span>

                        </div>
                        <div class="recipe-time-kcal">
                            <div class="time">
                                <i class="bi bi-clock-fill"></i>
                                <span>{{ $recipe['recipe']['totalTime'] }} Minute</span>
                            </div>
                            <span class="recipe-time-kcal-border"></span>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>3,6</span>
                            </div>
                            <span class="recipe-time-kcal-border"></span>
                            <div class="kcal">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                                <span>{{ intval($recipe['recipe']['calories']) }} Kcal</span>
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
                                    <button class="nav-link active" id="ingredients-tab" data-bs-toggle="tab"
                                        data-bs-target="#ingredients" type="button" role="tab"
                                        aria-controls="ingredients" aria-selected="true">ingredients</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="instr-q-tab" data-bs-toggle="tab"
                                        data-bs-target="#instr-q" type="button" role="tab"
                                        aria-controls="instr-q">instructions
                                    </button>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="ingredients" role="tabpanel"
                                    aria-labelledby="ingredients-tab">
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
                                <div class="tab-pane" id="instr-q" role="tabpanel"
                                    aria-labelledby="instructions-tab">
                                    ......... instructions
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <x-livewire-loading targetMethod='getRecipes' />
</div>







@push('script')
    <script>
        window.addEventListener("show-recipe-ingredients", (event) => {

            let myModal = new bootstrap.Collapse(document.querySelector('#content-' + event.detail.recipeId));
            myModal.show();

        });


        let categoryItems = [...document.querySelectorAll('.category')];
        categoryItems.forEach(category => {
            category.addEventListener("click", (e) => {
                categoryItems.forEach(allcategory => {
                    allcategory.classList.remove("active--category");

                });
                category.classList.add("active--category");

            });

        });
    </script>
@endpush
