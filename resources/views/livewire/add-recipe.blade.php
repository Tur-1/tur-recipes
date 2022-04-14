<div>

    <div wire:ignore.self class="offcanvas offcanvas-bottom top-recipe-offcanvas" tabindex="-1" data-bs-backdrop="false"
        id="addRecipe">
        <div class="offcanvas-header">
            <div class="header-btns">

                <button type="button" class="back-btn" data-bs-dismiss="offcanvas"
                    data-bs-target="#top-recipe-offcanvas-dinner-tonight-custardy-popovers-4" aria-label="Close">
                    <i class="bi bi-chevron-down"></i>
                </button>

            </div>
            <div class="image-container">
                <label wire:loading.remove wire:target='image' for="reipce-image">
                    <i class="fa fa-plus-circle "></i>
                    @if (!is_null($image))
                        <img src="{{ $image->temporaryUrl() }}" alt="">
                    @else
                        <img src="{{ asset('assets/images/upload.svg') }}" alt="" srcset="">
                    @endif
                </label>

                <div id="image-spinner" wire:loading wire:loading.class='card-body text-center' wire:target='image'>
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                </div>
            </div>



        </div>
        <div class="offcanvas-body small p-3 ">

            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="text-danger m-3">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="">
                            <input type="file" class="form-control d-none" id="reipce-image" wire:model="image"
                                name="image">

                            <div class="mb-3">
                                <label for="reipce_name" class="form-label">reipce name</label>
                                <input type="text"
                                    class="form-control  form-control-sm  @error('reipce_name') is-invalid @enderror"
                                    id="reipce_name" wire:model.lazy='reipce_name'>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="protin" class="form-label"> Time</label>
                                    <input type="number" placeholder="10 "
                                        class="form-control  form-control-sm  @error('time') is-invalid @enderror"
                                        id="Time">

                                </div>
                                <div class="col-6">
                                    <label for="protin" class="form-label"> Calories </label>
                                    <input type="number" placeholder="397 "
                                        class="form-control  form-control-sm @error('calories') is-invalid @enderror"
                                        id="Calories">


                                </div>



                            </div>

                        </div>
                        <div class="row d-flex justify-content-center  mb-2">
                            <div class="col-3">
                                <label for="protin" class="form-label"> Carbs</label>
                                <input type="number" placeholder="25" wire:model.lazy='carbs'
                                    class="form-control  form-control-sm @error('carbs') is-invalid @enderror"
                                    id="carbs">
                            </div>
                            <div class="col-3">
                                <label for="protin" class="form-label"> Fat</label>
                                <input type="number" placeholder="3 " wire:model.lazy='fat'
                                    class="form-control  form-control-sm @error('fat') is-invalid @enderror" id="Fat">
                            </div>
                            <div class="col-3">
                                <label for="protin" class="form-label"> protein</label>
                                <input type="number" placeholder="13 " wire:model.lazy='protein'
                                    class="form-control  form-control-sm @error('protein') is-invalid @enderror"
                                    id="protein">
                            </div>



                        </div>


                        <div class="ingredients ">
                            <ul class="nav nav-tabs|pills" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active"
                                        id="ingredients-dinner-tonight-custardy-popovers-4-tab" data-bs-toggle="tab"
                                        data-bs-target="#ingredients-dinner-tonight-custardy-popovers-4" type="button"
                                        role="tab" aria-controls="ingredients-dinner-tonight-custardy-popovers-4"
                                        aria-selected="true">ingredients</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link"
                                        id="instructions-dinner-tonight-custardy-popovers-4-tab" data-bs-toggle="tab"
                                        data-bs-target="#instructions-dinner-tonight-custardy-popovers-4" type="button"
                                        role="tab">instructions
                                    </button>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="ingredients-dinner-tonight-custardy-popovers-4"
                                    role="tabpanel"
                                    aria-labelledby="ingredients-dinner-tonight-custardy-popovers-4-tab">

                                    @foreach ($ingredientsFields as $field)
                                        <input type="text" placeholder="1 Egg" class="form-control  ingredients-card "
                                            id="ingredients-card"
                                            wire:model.debounce.500ms='ingredientsFields.{{ $loop->index }}.ingredient'>
                                    @endforeach


                                    <div class="mt-4">
                                        <button type="button" wire:click.prevent='addNewFields' class="btn btn-primary">
                                            <i class="fa fa-plus-circle me-2"></i>new ingredients</button>
                                    </div>
                                </div>
                                <div class="tab-pane" id="instructions-dinner-tonight-custardy-popovers-4"
                                    role="tabpanel"
                                    aria-labelledby="instructions-dinner-tonight-custardy-popovers-4-tab">

                                    <div class="mb-3">
                                        <textarea class="form-control ingredients-card" id="instructions-text-area" rows="6"></textarea>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer bg-transparent">
                        <button type="submit" class="btn btn-primary  float-end">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
