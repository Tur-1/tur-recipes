@extends('layouts.app')

@section('content')
    <div class="recipe-page">

        <div class="recipe-page-header">
            <div class="header-btns">

                <button type="button" class="back-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button type="button" class="btn-fav">
                    <i class="bi bi-heart"></i>
                </button>
            </div>

            <div id="image-container" class="carousel slide" data-bs-ride="carousel">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSb6nWOpqFydDuv_hC8e_iYl3g2KevWYms-Og&usqp=CAU"
                    alt="...">
            </div>

        </div>
        <div class="recipe-page-body ">

            <div class="recipe-details">
                <span class="header-border"></span>
                <span class="recipe-label">
                    Pasta Frittata recipes

                </span>

            </div>
            <div class="recipe-time-kcal">
                <div class="time">
                    <i class="bi bi-clock-fill"></i>
                    <span>25 Minute</span>
                </div>
                <span class="recipe-time-kcal-border"></span>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <span>3,6</span>
                </div>
                <span class="recipe-time-kcal-border"></span>
                <div class="kcal">
                    <i class="fa-solid fa-fire-flame-curved"></i>
                    <span>1130 Kcal</span>
                </div>


            </div>
            <div class="nutrients">
                <div class="nutrition-row">
                    <div class="nutrition-element">
                        <div class="image-container">
                            <img src="http://tur-recipes.com/assets/icons/wheat.png">
                        </div>
                        <span>71 g
                            carbs</span>
                    </div>
                    <div class="nutrition-element">
                        <div class="image-container">
                            <img src="http://tur-recipes.com/assets/icons/pizza-slice.png">
                        </div>
                        <span>
                            56 g

                            Fat</span>
                    </div>
                </div>
                <div class="nutrition-row">
                    <div class="nutrition-element">
                        <div class="image-container">
                            <img src="http://tur-recipes.com/assets/icons/avocado.png">
                        </div>
                        <span>
                            80 g

                            protin</span>
                    </div>
                </div>

            </div>

            <div class="ingredients">
                <ul class="nav nav-tabs|pills" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="ingredients-pasta-frittata-recipes-8-tab" data-bs-toggle="tab"
                            data-bs-target="#ingredients-pasta-frittata-recipes-8" type="button" role="tab"
                            aria-controls="ingredients-pasta-frittata-recipes-8" aria-selected="true">ingredients</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="instructions-pasta-frittata-recipes-8-tab" data-bs-toggle="tab"
                            data-bs-target="#instructions-pasta-frittata-recipes-8" type="button" role="tab">instructions
                        </button>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="ingredients-pasta-frittata-recipes-8" role="tabpanel"
                        aria-labelledby="ingredients-pasta-frittata-recipes-8-tab">
                        <div class="card ingredients-card">
                            <div class="card-body">
                                <p class="card-text">
                                    6 Eggs
                                </p>
                            </div>
                        </div>
                        <div class="card ingredients-card">
                            <div class="card-body">
                                <p class="card-text">
                                    salt
                                </p>
                            </div>
                        </div>
                        <div class="card ingredients-card">
                            <div class="card-body">
                                <p class="card-text">
                                    freshly ground pepper
                                </p>
                            </div>
                        </div>
                        <div class="card ingredients-card">
                            <div class="card-body">
                                <p class="card-text">
                                    1 teaspoon Italian Seasoning
                                </p>
                            </div>
                        </div>
                        <div class="card ingredients-card">
                            <div class="card-body">
                                <p class="card-text">
                                    1-1/2 cup To 2 Cups Cooked Pasta
                                </p>
                            </div>
                        </div>
                        <div class="card ingredients-card">
                            <div class="card-body">
                                <p class="card-text">
                                    2/3 cups Grated Parmesan Cheese
                                </p>
                            </div>
                        </div>
                        <div class="card ingredients-card">
                            <div class="card-body">
                                <p class="card-text">
                                    1 teaspoon Butter Or Oil
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="instructions-pasta-frittata-recipes-8" role="tabpanel"
                        aria-labelledby="instructions-pasta-frittata-recipes-8-tab">
                        ......... instructions
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
