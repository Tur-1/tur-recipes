 <div wire:ignore.self class="allRecipes allRecipes-end" id="allRecipes">
     <div class="header">
         <button type="button" id="closeAllRecipes">
             <i class="fas fa-arrow-left"></i>
         </button>
         <h5 class="allRecipesLabel">recipes</h5>
         <div></div>
     </div>
     <div class="allRecipes-body">
         <div class="row ">
             @foreach ($recipes as $recipe)
                 <div class="col-6">
                     <a role="button" href="#" class="card recipe-card"
                         wire:click.prevent='openRecipeModal({{ $recipe['id'] }})'>
                         <img src="{{ $recipe['image_url'] }}">
                         <div class="recipe-item-details">

                             <div class="title">
                                 <span> {{ $recipe['title'] }} </span>
                             </div>

                             <div class="recipe-kcal-Time">

                                 <div>
                                     <i class="fa-regular fa-clock me-1"></i>
                                     <span>{{ $recipe['ready_in_minutes'] }} </span>
                                 </div>
                                 <div>
                                     <i class="fa-solid fa-fire"></i>
                                     <span>{{ intval($recipe['calories']) }} Kcal</span>
                                 </div>

                             </div>
                         </div>
                     </a>
                 </div>
             @endforeach
         </div>



         <div class="row mt-3 d-flex justify-content-center">
             <div class="text-center">
                 <button class="btn btn-primary " id="loadMore" wire:click='loadMore'>
                     <span wire:loading wire:target='loadMore' class="spinner-border spinner-border-sm" role="status"
                         aria-hidden="true"></span>
                     <span class=""> load more...</span>
                 </button>
             </div>


         </div>



     </div>
 </div>
