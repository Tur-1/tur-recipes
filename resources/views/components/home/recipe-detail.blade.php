@foreach ($recipes as $recipe)
    <div class="offcanvas offcanvas-end top-recipe-offcanvas" id="recipe-detail-{{ $recipe['id'] }}">
        <div class="offcanvas-header">
            <div class="header-btns">

                <button type="button" id="closeRecipeDetail" class="back-btn" aria-label="Close"
                    data-bs-dismiss="offcanvas" data-bs-target="#recipe-detail-{{ $recipe['id'] }}">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button type="button" class="fav-btn">
                    <i class="bi bi-heart"></i>
                </button>
            </div>
            <div class="image-container">
                <img src=" {{ $recipe['image'] ?? '' }}" alt="...">
            </div>



        </div>
        <div class="offcanvas-body small">
            <div class="offcanvas-recipe-details-header">
                <div class="card">

                    <div class="card-body">

                        <span class="recipe-label text-center">
                            {{ $recipe['title'] ?? '' }}

                        </span>
                        <div class="recipe-time-kcal">
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>
                                <span>{{ $recipe['ready_in_minutes'] ?? '' }} Minutes</span>
                            </div>

                            <div class="kcal">
                                <i class="fa-solid fa-fire"></i>
                                <span>{{ intval($recipe['calories']) ?? '' }} Kcal</span>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="offcanvas-recipe-details">

                <div class="nutrients">
                    <div class="nutrition-row">
                        <div class="nutrition-element">
                            <div class="image-container">
                                <img src="{{ asset('assets/icons/wheat.png') }}">
                            </div>
                            <span> {{ $recipe['carbs'] ?? '' }} carbs</span>
                        </div>
                        <div class="nutrition-element">
                            <div class="image-container">
                                <img src="{{ asset('assets/icons/pizza-slice.png') }}">
                            </div>
                            <span>{{ $recipe['fat'] ?? '' }} Fat</span>
                        </div>
                    </div>
                    <div class="nutrition-row">
                        <div class="nutrition-element">
                            <div class="image-container">
                                <img src="{{ asset('assets/icons/avocado.png') }}">
                            </div>
                            <span> {{ $recipe['protein'] ?? '' }} protein</span>
                        </div>
                    </div>

                </div>


                <div class="ingredients">
                    <ul class="nav nav-tabs|pills" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="ingredients-{{ $recipe['id'] }}-tab"
                                data-bs-toggle="tab" data-bs-target="#ingredients-{{ $recipe['id'] }}" type="button"
                                role="tab" aria-controls="ingredients-{{ $recipe['id'] }}"
                                aria-selected="true">ingredients</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="instructions-{{ $recipe['id'] }}-tab"
                                data-bs-toggle="tab" data-bs-target="#instructions-{{ $recipe['id'] }}" type="button"
                                role="tab">instructions
                            </button>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="ingredients-{{ $recipe['id'] }}" role="tabpanel"
                            aria-labelledby="ingredients-{{ $recipe['id'] }}-tab">
                            @foreach ($recipe['ingredients'] ?? [] as $Ingredient)
                                <div class="card ingredients-card">
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{ $Ingredient }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                        <div class="tab-pane" id="instructions-{{ $recipe['id'] }}" role="tabpanel"
                            aria-labelledby="instructions-{{ $recipe['id'] }}-tab">


                            <div class="mt-3 mb-3 bg-light p-3 rounded ">
                                {!! $recipe['instructions'] ?? '' !!}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
