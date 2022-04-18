 <div class="offcanvas offcanvas-end top-recipe-offcanvas" id="recipe-detail-{{ $recipeId }}">
     <div class="offcanvas-header">
         <div class="header-btns">

             <button type="button" id="closeRecipeDetail" class="back-btn" aria-label="Close"
                 wire:click.prevent='closeRecipeModal({{ $recipeId }})'>
                 <i class="fas fa-arrow-left"></i>
             </button>
             <button type="button" class="fav-btn">
                 <svg xmlns="http://www.w3.org/2000/svg" class="fav-icon " viewBox="0 0 24 24">
                     <path
                         d="M12 21.35l-1.45-1.32c-5.15-4.67-8.55-7.75-8.55-11.53 0-3.08 2.42-5.5 5.5-5.5 1.74 0 3.41.81 4.5 2.09 1.09-1.28 2.76-2.09 4.5-2.09 3.08 0 5.5 2.42 5.5 5.5 0 3.78-3.4 6.86-8.55 11.54l-1.45 1.31z">
                     </path>


                 </svg>
             </button>
         </div>
         <div class="image-container">
             <img src=" {{ $recipeImage ?? '' }}" alt="...">
         </div>
         <div class="offcanvas-recipe-details-header">
             <div class="card">

                 <div class="card-body">

                     <span class="recipe-label text-center">
                         {{ $recipeTitle ?? '' }}

                     </span>
                     <div class="recipe-time-kcal">
                         <div class="time">
                             <i class="fa-regular fa-clock"></i>
                             <span>{{ $recipeReadyInMinutes ?? '' }} Minutes</span>
                         </div>

                         <div class="kcal">
                             <i class="fa-solid fa-fire"></i>
                             <span>{{ $recipeCalories ?? '' }} Kcal</span>
                         </div>


                     </div>
                 </div>
             </div>

         </div>


     </div>
     <div class="offcanvas-body small">

         <div class="offcanvas-recipe-details">

             <div class="nutrients">
                 <div class="nutrition-row">
                     <div class="nutrition-element">
                         <div class="image-container">
                             <img src="{{ asset('assets/icons/wheat.png') }}">
                         </div>
                         <span> {{ $recipeCarbs ?? '' }} carbs</span>
                     </div>
                     <div class="nutrition-element">
                         <div class="image-container">
                             <img src="{{ asset('assets/icons/pizza-slice.png') }}">
                         </div>
                         <span>{{ $recipeFat ?? '' }} Fat</span>
                     </div>
                 </div>
                 <div class="nutrition-row">
                     <div class="nutrition-element">
                         <div class="image-container">
                             <img src="{{ asset('assets/icons/avocado.png') }}">
                         </div>
                         <span> {{ $recipeProtein ?? '' }} protein</span>
                     </div>
                 </div>

             </div>


             <div class="ingredients">
                 <ul class="nav nav-tabs|pills" id="myTab" role="tablist">
                     <li class="nav-item" role="presentation">
                         <button class="nav-link active" id="ingredients-{{ $recipeId }}-tab" data-bs-toggle="tab"
                             data-bs-target="#ingredients-{{ $recipeId }}" type="button" role="tab"
                             aria-controls="ingredients-{{ $recipeId }}" aria-selected="true">ingredients</button>
                     </li>
                     <li class="nav-item" role="presentation">
                         <button class="nav-link" id="instructions-{{ $recipeId }}-tab" data-bs-toggle="tab"
                             data-bs-target="#instructions-{{ $recipeId }}" type="button" role="tab">instructions
                         </button>
                     </li>

                 </ul>

                 <!-- Tab panes -->
                 <div class="tab-content">
                     <div class="tab-pane active" id="ingredients-{{ $recipeId }}" role="tabpanel"
                         aria-labelledby="ingredients-{{ $recipeId }}-tab">
                         @foreach ($recipeIngredients ?? [] as $Ingredient)
                             <div class="card ingredients-card">
                                 <div class="card-body">
                                     <p class="card-text">
                                         {{ $Ingredient }}
                                     </p>
                                 </div>
                             </div>
                         @endforeach



                     </div>
                     <div class="tab-pane" id="instructions-{{ $recipeId }}" role="tabpanel"
                         aria-labelledby="instructions-{{ $recipeId }}-tab">


                         <div class="mt-3 mb-3 bg-light p-3 rounded ">
                             {!! $recipeInstructions ?? '' !!}

                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
