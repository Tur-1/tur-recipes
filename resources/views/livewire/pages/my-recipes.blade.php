<div wire:ignore.self class="allRecipes allRecipes-end show" id="allRecipes" style="visibility: visible">
    <div class="header">
        <a href="{{ route('home') }}" id="closeAllRecipes">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h5 class="allRecipesLabel ">My Recipes</h5>
        <div></div>
    </div>
    <div class="allRecipes-body">
        <div class="row">
            @forelse ($myRecipes as $recipe)
                <div class="my-recipe-card">
                    <div class="card-action ">
                        <button type="button" class="btn-close btn-close-white" aria-label="Close"
                            wire:click.prevent="openDeleteConfirmModal({{ $recipe['id'] }})"></button>
                    </div>

                    <a role="button" href="#" class="card"
                        wire:click.prevent='openRecipeModal({{ $recipe['id'] }})'>
                        <img src="{{ $recipe['image_url'] }}">

                        <div class="recipe-item-details">

                            <div class="title ">
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


    <!-- Modal -->

    <div wire:ignore.self class="modal fade deleteConfirmModal" id="deleteConfirmModal" tabindex="-1" role="dialog"
        style="z-index: 199999999999999999999999999 !important;" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <p>{{ $confirmMessage ?? ' Are you sure ?  ' }} </p>
                </div>
                <div class="modal-footer ">
                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal">cancel</button>

                    <button type="button" wire:click.prevent="deleteRecipe()" class="delete-btn"
                        data-bs-dismiss="modal">Yes,
                        Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>
@push('script')
    <script>
        $(document).ready(function() {
            window.addEventListener("open-recipe-modal", (e) => {

                $('#recipe-detail-' + e.detail.recipeId).offcanvas('show');


            });
            window.addEventListener("close-recipe-modal", (e) => {

                $('#recipe-detail-' + e.detail.recipeId).offcanvas('hide');


            });
            window.addEventListener("open-delete-confirm-modal", (e) => {

                $("#deleteConfirmModal").modal('show');

            });
            window.addEventListener("close-delete-confirm-modal", (e) => {

                $("#deleteConfirmModal").modal('hide');

            });
        });
    </script>
@endpush
