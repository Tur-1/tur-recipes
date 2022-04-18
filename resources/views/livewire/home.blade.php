<div>


    <x-home.header />


    @include('components.home.search')

    @include('components.home.recommend-recipes')

    @include('components.home.categories')

    @include('components.home.top-recipes')

    @include('components.home.all-recipes')

    @include('components.home.recipe-detail')

    @include('components.layouts.livewire-loading')

    @include('components.layouts.footer')

    <livewire:add-recipe>

</div>





@push('script')
    <script>
        let seeAllRecipesBtn = document.getElementById('seeAllRecipes');
        let closeAllRecipesBtn = document.getElementById('closeAllRecipes');


        seeAllRecipesBtn.addEventListener("click", (e) => {
            let allRecipes = document.getElementById('allRecipes');

            allRecipes.classList.add("show");
            allRecipes.style.visibility = "visible";

        });

        closeAllRecipesBtn.addEventListener("click", (e) => {
            let allRecipes = document.getElementById('allRecipes');

            allRecipes.classList.remove("show");


        });

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

        $(document).ready(function() {
            window.addEventListener("open-recipe-modal", (e) => {

                $('#recipe-detail-' + e.detail.recipeId).offcanvas('show');


            })
            window.addEventListener("close-recipe-modal", (e) => {

                $('#recipe-detail-' + e.detail.recipeId).offcanvas('hide');


            })
        });
    </script>
@endpush
