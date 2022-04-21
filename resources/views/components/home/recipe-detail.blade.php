 <div wire:ignore.self class="offcanvas offcanvas-end top-recipe-offcanvas" id="recipe-detail-{{ $recipeId }}">
     <div class="offcanvas-header">
         <div class="header-btns">

             <button type="button" id="closeRecipeDetail" class="back-btn" aria-label="Close"
                 wire:click.prevent='closeRecipeModal({{ $recipeId }})'>
                 <i class="fas fa-arrow-left"></i>
             </button>
             @if (!is_null($recipeId))
                 @if (auth()->user()->myFavRecipesHas($recipeId))
                     <livewire:components.favorite-button :recipeId="$recipeId" :alreadyInFavRecipes="true" />
                 @else
                     <livewire:components.favorite-button :recipeId="$recipeId" />
                 @endif
             @endif


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
                             <img src="{{ asset('assets/icons/icons8-wheat-16.png') }}">
                         </div>
                         <span> {{ $recipeCarbs ?? '' }} carbs</span>
                     </div>
                     <div class="nutrition-element">
                         <div class="image-container">
                             <img src="{{ asset('assets/icons/icons8-pizza-80.png') }}">
                         </div>
                         <span>{{ $recipeFat ?? '' }} Fat</span>
                     </div>
                 </div>
                 <div class="nutrition-row">
                     <div class="nutrition-element">
                         <div class="image-container">
                             <img src="{{ asset('assets/icons/icons8-avocado-48.png') }}">
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
                             <div class=" ingredients-card">
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
                         <div class=" ingredients-card">
                             <div class="card-body">
                                 <p class="card-text">
                                     {!! $recipeInstructions ?? '' !!}
                                 </p>
                             </div>
                         </div>


                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
