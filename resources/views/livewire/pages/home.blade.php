 @push('head')
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
 @endpush
 <div class="home-page">


     <x-home.header />


     @include('components.home.search')

     @include('components.home.recommend-recipes')

     @include('components.home.categories')

     @include('components.home.top-recipes')

     @include('components.home.all-recipes')


     @include('components.home.recipe-detail')

     <x-layouts.footer />

     @include('components.layouts.livewire-loading', [
         'targetMethod' => 'openRecipeModal',
     ])


 </div>





 @push('script')
     <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

     <script>
         $('.recommend-recipes-row').slick({
             centerMode: true,
             slidesToShow: 1,
             infinite: true,
             autoplay: true,
             swipe: true,
             speed: 1000,
             arrows: false,
             variableWidth: true,


         });
         /***********************  all recipes offcanvas  ****************************/
         let seeAllRecipesBtn = document.getElementById('seeAllRecipesbtn');
         let closeAllRecipesBtn = document.getElementById('closeAllRecipes');
         let allRecipes = document.getElementById('allRecipes');

         seeAllRecipesBtn.addEventListener("click", (e) => {
             allRecipes.classList.add("show");
             allRecipes.style.visibility = "visible";
         });

         closeAllRecipesBtn.addEventListener("click", (e) => {
             allRecipes.classList.remove("show");
         });


         /***********************  categoryItems  ****************************/
         const categoryItems = [...document.querySelectorAll('.category')];

         categoryItems.forEach(current_category => {
             current_category.addEventListener("click", (e) => {

                 if (!current_category.classList.contains("active--category")) {
                     current_category.classList.add("active--category");
                 } else {
                     current_category.classList.remove("active--category");



                 }

                 categoryItems.forEach(prev_category => {
                     if (prev_category.getAttribute("id") != current_category.getAttribute("id")) {
                         prev_category.classList.remove("active--category");
                     }

                 });

             });

         });




         /***********************  recipe detail offcanvas  ****************************/
         $(document).ready(function() {
             window.addEventListener("open-recipe-modal", (e) => {

                 $('#recipe-detail-' + e.detail.recipeId).offcanvas('show');


             })
             window.addEventListener("close-recipe-modal", (e) => {

                 $('#recipe-detail-' + e.detail.recipeId).offcanvas('hide');


             });


         });
     </script>
 @endpush
