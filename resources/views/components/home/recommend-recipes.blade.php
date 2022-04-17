<div class="recommend-recipes">
    <strong>Recommend recipes</strong>
    <div wire:ignore class="recommend-recipes-row">


        @foreach ($recommendRecipes as $recipe)
            <a role="button" href="#" class="card" data-bs-toggle="offcanvas"
                data-bs-target="#recipe-detail-{{ $recipe['id'] }}">
                <div class="card-image-container">
                    <img src="{{ $recipe['image'] }}" alt="...">
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <span>
                            {{ $recipe['title'] }}
                        </span>
                    </div>
                    <div class="recipe-kcal-Time">
                        <div>
                            <i class="bi bi-stopwatch"></i>
                            <span>{{ $recipe['ready_in_minutes'] }} </span>
                        </div>
                        <div>
                            <i class="fa-solid fa-fire"></i>
                            <span>{{ intval($recipe['calories']) }} Kcal</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>


</div>
