<div>

    <div wire:ignore.self class="offcanvas offcanvas-bottom " tabindex="-1" data-bs-backdrop="false" id="addRecipe">
        <div class="offcanvas-header">


            <button type="button" class="btn-close back-btn" data-bs-dismiss="offcanvas" data-bs-target="#addRecipe"
                aria-label="Close">

            </button>
            <a role="button" href="#" class=" form-submit-icon" wire:click.prevent="submit">
                <i class="fa-solid fa-check"></i>
            </a>

        </div>
        <div class="offcanvas-body small p-3 ">

            <form enctype="multipart/form-data">
                <div class="imageContainer ">
                    <label wire:loading.remove wire:target='image' for="reipce-image" class="text-center">
                        <i class="fa fa-plus-circle "></i>
                        @if (!is_null($image))
                            <img src="{{ $image->temporaryUrl() }}" alt="">
                        @else
                            <img class="upload-image" src="{{ asset('assets/images/upload.svg') }}">
                        @endif
                    </label>

                    <div id="image-spinner" wire:loading wire:loading.class='card-body text-center' wire:target='image'>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                    </div>
                    <input type="file" class="recipe-input form-control d-none" id="reipce-image" wire:model="image"
                        name="image">
                </div>
                <div class="card border-0">
                    <div class="card-body mb-5">
                        <div class="text-danger m-3">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="form-group">
                                <label for="title" class="form-label">title</label>
                                <input type="text" placeholder="title"
                                    class="recipe-input form-control  recipe-input form-control-sm   @error('title') is-invalid @enderror"
                                    id="title" wire:model.lazy='title'>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="ready_in_minutes" class="form-label"> Time</label>
                                <input type="number" placeholder="10 " wire:model.lazy='ready_in_minutes'
                                    class="recipe-input form-control  recipe-input form-control-sm   @error('ready_in_minutes') is-invalid @enderror"
                                    id="ready_in_minutes">

                            </div>
                            <div class="col-6">
                                <label for="calories" class="form-label"> Calories </label>
                                <input wire:model.lazy='calories' type="number" placeholder="397 "
                                    class="recipe-input form-control  recipe-input form-control-sm  @error('calories') is-invalid @enderror"
                                    id="calories">

                            </div>



                        </div>
                        <div class="row d-flex justify-content-around  mb-4 mt-4">
                            <div class="col-4">
                                <label for="carbs" class="form-label"> Carbs</label>
                                <input type="number" placeholder="25" wire:model.lazy='carbs'
                                    class="recipe-input form-control  recipe-input form-control-sm  @error('carbs') is-invalid @enderror"
                                    id="carbs">
                            </div>
                            <div class="col-4">
                                <label for="fat" class="form-label"> Fat</label>
                                <input type="number" placeholder="3 " wire:model.lazy='fat'
                                    class="recipe-input form-control  recipe-input form-control-sm  @error('fat') is-invalid @enderror"
                                    id="fat">
                            </div>
                            <div class="col-4">
                                <label for="protin" class="form-label"> protein</label>
                                <input type="number" placeholder="13 " wire:model.lazy='protein'
                                    class="recipe-input form-control  recipe-input form-control-sm  @error('protein') is-invalid @enderror"
                                    id="protein">
                            </div>



                        </div>
                        <div class="row">

                            <div class="form-group">
                                <label for="dish_types" class="form-label">Categories</label>
                                <select multiple wire:model.lazy='dish_types' name="dish_types"
                                    class="form-select form-select-sm rounded-1  @error('dish_types') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['name'] }}"> {{ $category['name'] }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>


                        <div class="ingredients  mt-4">
                            <ul class="nav nav-tabs|pills" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="new-ingredients-tab" data-bs-toggle="tab"
                                        data-bs-target="#new-ingredients" type="button" role="tab"
                                        aria-controls="new-ingredients" aria-selected="true">ingredients</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="new-instructions-tab" data-bs-toggle="tab"
                                        data-bs-target="#new-instructions" type="button" role="tab">instructions
                                    </button>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="new-ingredients" role="tabpanel">

                                    @foreach ($ingredients as $field)
                                        <input type="text" placeholder="1 cup"
                                            class="input-ingredients form-control ingredients-card "
                                            id=" ingredients-card" wire:model.lazy='ingredients.{{ $loop->index }}'>
                                    @endforeach



                                    <a role="button" class="icon-primary" href="#" wire:click.prevent='addNewFields'>
                                        <i class="fas fa-plus-circle "> </i>
                                    </a>
                                </div>
                                <div class="tab-pane" id="new-instructions" role="tabpanel"
                                    aria-labelledby="new-instructions">

                                    <div class="mb-3">
                                        <textarea class=" form-control ingredients-card" id="instructions-text-area" rows="6"></textarea>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>


</div>
@push('script')
    <script>
        window.addEventListener("input-field-was-added", (e) => {

            const lastTnputField = document.querySelector("#new-ingredients").lastElementChild
                .previousElementSibling;

            lastTnputField.scrollIntoView();

        });
    </script>
@endpush
