 <div class="">


     <div class="offcanvas offcanvas-end top-recipe-offcanvas show">
         <div class="offcanvas-header">
             <div class="header-btns">

                 <a href="{{ route('home') }}" class="back-btn">
                     <i class="bi bi-chevron-left"></i>
                 </a>
                 <button type="button" class="fav-btn">
                     <i class="bi bi-heart"></i>
                 </button>
             </div>
             <div class="image-container">
                 <img src=" {{ $recipe['image'] }}" alt="...">
             </div>



         </div>
         <div class="offcanvas-body small">
             <div class="offcanvas-recipe-details-header">
                 <div class="card">

                     <div class="card-body">

                         <span class="recipe-label text-center">
                             {{ $recipe['title'] }}

                         </span>
                         <div class="recipe-time-kcal">
                             <div class="time">
                                 <i class="fa-regular fa-clock"></i>
                                 <span>{{ $recipe['readyInMinutes'] }} Minutes</span>
                             </div>
                             <span class="recipe-time-kcal-border"></span>
                             <div class="rating">
                                 <i class="fa-regular fa-star"></i>
                                 <span>3,6</span>
                             </div>
                             <span class="recipe-time-kcal-border"></span>
                             <div class="kcal">
                                 <i class="fa-solid fa-fire"></i>
                                 <span>{{ $recipe['calories'] }} Kcal</span>
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
                             <span> {{ $recipe['carbs'] }} carbs</span>
                         </div>
                         <div class="nutrition-element">
                             <div class="image-container">
                                 <img src="{{ asset('assets/icons/pizza-slice.png') }}">
                             </div>
                             <span>{{ $recipe['fat'] }} Fat</span>
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
                             <button class="nav-link active" id="ingredients-id-tab" data-bs-toggle="tab"
                                 data-bs-target="#ingredients-id" type="button" role="tab"
                                 aria-controls="ingredients-id" aria-selected="true">ingredients</button>
                         </li>
                         <li class="nav-item" role="presentation">
                             <button class="nav-link" id="instructions-id-tab" data-bs-toggle="tab"
                                 data-bs-target="#instructions-id" type="button" role="tab">instructions
                             </button>
                         </li>

                     </ul>

                     <!-- Tab panes -->
                     <div class="tab-content">
                         <div class="tab-pane active" id="ingredients-id" role="tabpanel"
                             aria-labelledby="ingredients-id-tab">
                             @foreach ($recipe['extendedIngredients'] as $Ingredient)
                                 <div class="card ingredients-card">
                                     <div class="card-body">
                                         <p class="card-text">
                                             {{ $Ingredient['original'] }}
                                         </p>
                                     </div>
                                 </div>
                             @endforeach



                         </div>
                         <div class="tab-pane" id="instructions-id" role="tabpanel"
                             aria-labelledby="instructions-id-tab">


                             <div class="mb-3">
                                 <textarea class="form-control ingredients-card" id="instructions-text-area" rows="6" readonly>
                                {{ $recipe['instructions'] }}
                            </textarea>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
