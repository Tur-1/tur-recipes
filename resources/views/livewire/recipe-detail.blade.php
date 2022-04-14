<div class="recipe-detail-container">
    <div class="offcanvas offcanvas-end top-recipe-offcanvas show" style="visibility:visible" tabindex="-1"
        data-bs-backdrop="false" id="recipe-23">
        <div class="offcanvas-header">
            <div class="header-btns">

                <button type="button" class="back-btn" data-bs-dismiss="offcanvas" data-bs-target="#recipe-23"
                    aria-label="Close">
                    <i class="bi bi-chevron-left"></i>
                </button>

            </div>
            <div class="image-container">
                <img src=" " alt="...">
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
                                dfgdfgdf

                            </span>
                            <div class="recipe-time-kcal">
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i>
                                    <span>545Minute</span>
                                </div>
                                <span class="recipe-time-kcal-border"></span>
                                <div class="rating">
                                    <i class="fa-regular fa-star"></i>
                                    <span>3,6</span>
                                </div>
                                <span class="recipe-time-kcal-border"></span>
                                <div class="kcal">
                                    <i class="fa-solid fa-fire"></i>
                                    <span>645 Kcal</span>
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
                            <span>453
                                carbs</span>
                        </div>
                        <div class="nutrition-element">
                            <div class="image-container">
                                <img src="{{ asset('assets/icons/pizza-slice.png') }}">
                            </div>
                            <span>345345
                                Fat</span>
                        </div>
                    </div>
                    <div class="nutrition-row">
                        <div class="nutrition-element">
                            <div class="image-container">
                                <img src="{{ asset('assets/icons/avocado.png') }}">
                            </div>
                            <span> 4534 protein</span>
                        </div>
                    </div>

                </div>


                {{-- <div class="ingredients">
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
                </div> --}}

            </div>
        </div>
    </div>
</div>
