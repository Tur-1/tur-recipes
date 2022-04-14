<div>


    <x-home.header />


    @include('components.home.search')

    @include('components.home.recommend-recipes')

    @include('components.home.categories')

    @include('components.home.top-recipes')


    @include('components.layouts.livewire-loading')
    <livewire:add-recipe>
        @include('components.layouts.footer')

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

        categoryItems.forEach(category => {
            category.addEventListener("click", (e) => {

                categoryItems.forEach(allcategory => {
                    allcategory.classList.remove("active--category");

                });
                category.classList.add("active--category");

            });

        });
    </script>
@endpush
