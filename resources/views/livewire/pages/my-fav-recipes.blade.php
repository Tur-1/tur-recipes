<div wire:ignore.self class="allRecipes allRecipes-end show" id="allRecipes" style="visibility: visible">
    <div class="header">
        <a href="{{ route('home') }}" id="closeAllRecipes">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h5 class="allRecipesLabel ">My Favorite Recipes</h5>
        <div></div>
    </div>
    <div class="allRecipes-body">
        <div class="row">
            @forelse ($myFavRecipes as $recipe)
                <div class="col-6">
                    <a role="button" href="#" class="card "
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

            @empty
                <div class="col-12 text-center">
                    <h5 class="text-white">no recipes found</h5>
                </div>
            @endforelse
        </div>
    </div>
    @include('components.home.recipe-detail');
</div>
@push('script')
    <script>
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
