 <div class="d-flex justify-content-center">
     <div class="col-lg-2 col-12">

         <div class="search">
             <i class="fa fa-search icon" aria-hidden="true"></i>
             <input type="text" name="" wire:model.lazy='SearchValue' placeholder="text" aria-label="Recipient's"
                 aria-describedby="my-addon">
         </div>

         <div class="recipes-container">

             <div class="recipe-card shadow-sm">
                 <div class="recipe-image-container">
                     <img src="{{ asset('assets/images/pizza-clip-art-15.png') }}" alt="">
                 </div>
                 <div class="recipe-card-detail">
                     <span class="recipe-card-info-title">
                         recipe food ecipe recipe
                     </span>

                     <div class="recipe-total-Time">
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
             <div class="recipe-card shadow-sm">
                 <div class="recipe-image-container">
                     <img src="{{ asset('assets/images/pizza-clip-art-15.png') }}" alt="">
                 </div>
                 <div class="recipe-card-detail">
                     <span class="recipe-card-info-title">
                         recipe food ecipe recipe
                     </span>

                     <div class="recipe-total-Time">
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

         <div class="categories">
             <div class="header">
                 <h6>Category Food</h6>
                 <button class="see-all-btn">
                     See All
                 </button>
             </div>
             <div wire:ignore class="categories-row">
                 @foreach ($categories as $category)
                     <a class="category-item shadow-sm" wire:click.prevent='getRecipes({{ $category['id'] }})'>
                         <div class="category-image">
                             <img src="{{ $category['imageUrl'] }}" class="rounded-circle" alt="">
                         </div>
                         <span class="category-name"> </span>
                     </a>
                 @endforeach


             </div>

         </div>


         <div class="recommend-recipes">
             <div class="header">
                 <h6> Top Recipes</h6>
                 <button class="see-all-btn">
                     See All
                 </button>
             </div>
             <div class="container">
                 <div class="row">
                     @foreach ($recipes as $recipe)
                         <div class="col-6">
                             <a class="card" data-bs-toggle="offcanvas"
                                 data-bs-target="#offcanvas-{{ Str::slug($recipe['recipe']['label']) }}">
                                 <div class="recipe-imge">
                                     <img src="{{ $recipe['recipe']['image'] }}">
                                 </div>
                                 <div class="card-body">
                                     <div class="recipe-title">
                                         <span> {{ $recipe['recipe']['label'] }} </span>
                                     </div>

                                     <div class="recipe-kcal-Time">
                                         <div class="me-4">
                                             <i
                                                 class="bi
                                               bi-stopwatch"></i>
                                             <span>{{ $recipe['recipe']['totalTime'] }} </span>
                                         </div>

                                         <div>
                                             <i
                                                 class="fa-solid
                                               fa-fire"></i>
                                             <span>{{ intval($recipe['recipe']['calories']) }} </span>
                                         </div>
                                     </div>
                                 </div>

                             </a>
                         </div>
                     @endforeach
                 </div>
             </div>


             @foreach ($recipes as $recipe)
                 <div class="recipe-offcanvas offcanvas offcanvas-bottom" tabindex="-1"
                     id="offcanvas-{{ Str::slug($recipe['recipe']['label']) }}"
                     aria-labelledby="offcanvasBottomLabel">
                     <div class="offcanvas-header">
                         <div class="offcanvas-header-btns">
                             <button type="button" class="close-btn" data-bs-dismiss="offcanvas"
                                 aria-label="Close">
                                 <i class="bi bi-x-lg"></i>
                             </button>
                             <button type="button" class="btn-fav">
                                 <i class="bi bi-heart"></i>
                             </button>
                         </div>

                         <div class="offcanvas-recipe-image">
                             <img src="{{ $recipe['recipe']['image'] }}" alt="">
                         </div>
                     </div>
                     <div class="offcanvas-body">


                         <div class="header">
                             <span class="recipe-label">
                                 {{ $recipe['recipe']['label'] }}
                             </span>
                             <div>
                                 <div class="recipe-time">
                                     <i class="bi bi-stopwatch"></i>
                                     <span>{{ $recipe['recipe']['totalTime'] }} min</span>
                                 </div>
                                 <div class="kcal">
                                     <i class="fas fa-fire-alt"></i>
                                     <span>{{ intval($recipe['recipe']['calories']) }} </span>
                                 </div>
                             </div>
                         </div>

                         <div class="nutrients">
                             <div class="nutrition-row">
                                 <div class="nutrition-element ">
                                     <div class="image-container">
                                         <img src="{{ asset('assets/icons/wheat.png') }}">
                                     </div>
                                     <span>{{ intval($recipe['recipe']['totalNutrients']['CHOCDF']['quantity']) .' ' .$recipe['recipe']['totalNutrients']['CHOCDF']['unit'] }}
                                         carbs</span>
                                 </div>
                                 <div class="nutrition-element ">
                                     <div class="image-container">
                                         <img src="{{ asset('assets/icons/pizza-slice.png') }}">
                                     </div>
                                     <span>
                                         {{ intval($recipe['recipe']['totalNutrients']['FAT']['quantity']) .' ' .$recipe['recipe']['totalNutrients']['FAT']['unit'] }}

                                         Fat</span>
                                 </div>
                             </div>
                             <div class="nutrition-row">
                                 <div class="nutrition-element ">
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
                                         data-bs-target="#ingredients" type="button" role="tab" aria-controls="home"
                                         aria-selected="true">ingredients</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                     <button class="nav-link" id="instructions-tab" data-bs-toggle="tab"
                                         data-bs-target="#instructions" type="button" role="tab" aria-controls="profile"
                                         aria-selected="false">instructions
                                     </button>
                                 </li>

                             </ul>

                             <!-- Tab panes -->
                             <div class="tab-content">
                                 <div class="tab-pane active" id="ingredients" role="tabpanel"
                                     aria-labelledby="ingredients-tab">
                                     <table class="table ingredients-table">

                                         <tbody>

                                             @foreach ($recipe['recipe']['ingredientLines'] as $ingredient)
                                                 <tr>

                                                     <td>{{ $ingredient }}</td>
                                                 </tr>
                                             @endforeach
                                         </tbody>
                                     </table>
                                 </div>
                                 <div class="tab-pane" id="instructions" role="tabpanel"
                                     aria-labelledby="instructions-tab">
                                 </div>
                             </div>
                         </div>


                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </div>

 @push('script')
     <script>
         window.addEventListener("show-recipe-ingredients", (event) => {

             let myModal = new bootstrap.Collapse(document.querySelector('#content-' + event.detail.recipeId));
             myModal.show();

         });

         let categoryItems = [...document.querySelectorAll('.category-item')];
         categoryItems.forEach(category => {
             category.addEventListener("click", (e) => {
                 categoryItems.forEach(allcategory => {
                     allcategory.classList.remove("category-item--active");
                 });
                 category.classList.add("category-item--active");
             });

         });
     </script>
 @endpush
