<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{
    public $categories = [];
    public $category;
    public $recipes = [];
    public $topRecipes = [];
    public $recommendRecipes = [];
    public $showRecipeModal = false;
    public $searchValue;
    public $recipeTitle, $recipeFat, $recipeCarbs, $recipeProtein, $recipeReadyInMinutes, $recipeImage,
        $recipeCalories,  $recipeInstructions, $recipeIngredients, $recipeId, $recipeDish_types;

    public function updated()
    {
        $this->searchRecipes();
    }

    public function searchRecipes()
    {
        if ($this->searchValue != "") {
            $this->recipes = $this->getAllRecipes($this->searchValue);
        }
    }
    public function getCategories()
    {
        return [
            ['id' => 1, 'name' => 'pizza', 'imageUrl' => asset('assets/images/pizza-clip-art-15.png')],
            ['id' => 2, 'name' => 'burger ', 'imageUrl' => asset('assets/images/burgur.png')],
            ['id' => 3, 'name' => 'dessert', 'imageUrl' => asset('assets/images/8-86854_food-dessert-cupcake-muffin-clipart-hd-png-download.png')],
            ['id' => 4, 'name' => 'drinks', 'imageUrl' => asset('assets/images/drinks2.jpg')],
            ['id' => 5, 'name' => 'steak', 'imageUrl' => asset('assets/images/steak.png')],
            ['id' => 7, 'name' => 'pasta', 'imageUrl' => asset('assets/images/5-57766_pasta-png-spaghetti-png.png')],
            ['id' => 8, 'name' => 'Sandwiches', 'imageUrl' => asset('assets/images/sandow.jpg')],
            ['id' => 9, 'name' => 'Muffins', 'imageUrl' => asset('assets/images/Muffins.jpg')],
            ['id' => 10, 'name' => 'Coolkies', 'imageUrl' => asset('assets/images/coolkie.jpg')],


        ];
    }


    public function getRecipesByCategory($categoryId)
    {


        if (!is_null($this->category) && $this->category['id'] == $categoryId) {
            $this->recipes = $this->getAllRecipes();
            return;
        }
        if (!is_null($categoryId)) {
            $this->category =   collect($this->categories)->where("id", $categoryId)->first();
        }



        if (!is_null($this->category)) {

            $this->recipes = $this->getAllRecipes($this->category['name']);
        }
    }

    public function getAllRecipes($value = null)
    {

        $recipes = Recipe::SearchRecipe($value)->inRandomOrder()->get();
        $this->topRecipes =  $recipes->take(5);

        return $recipes;
    }

    public function getRecommendMeal()
    {
        $startMorning = Carbon::createFromTime(0, 0, 0, 'GMT+3');
        $endMorning = Carbon::createFromTime(12, 0, 0, 'GMT+3');

        $startAfterNoon = Carbon::createFromTime(12, 1, 0, 'GMT+3');
        $endAfterNoon = Carbon::createFromTime(18, 30, 0, 'GMT+3');

        $startEvning = Carbon::createFromTime(18, 31, 0, 'GMT+3');
        $endEvning = Carbon::createFromTime(23, 59, 0, 'GMT+3');



        $timeNow = Carbon::now('GMT+3');

        if ($timeNow->between($startMorning, $endMorning, true)) {
            $recommendMeal = 'breakfast';
        }

        if ($timeNow->between($startAfterNoon, $endAfterNoon, true)) {
            $recommendMeal = 'lunch';
        }
        if ($timeNow->between($startEvning, $endEvning, true)) {
            $recommendMeal = 'dinner';
        }
        return  $recommendMeal;
    }


    public function mount()
    {

        $this->recommendRecipes =  $this->getAllRecipes($this->getRecommendMeal());
        $this->categories =  $this->getCategories();

        $this->recipes  = $this->getAllRecipes();
    }

    public function openRecipeModal($recipeId)
    {

        if (is_null($recipeId))   return;

        $recipe = Recipe::find($recipeId);
        if (is_null($recipe))  return;

        $this->recipeId = $recipe->id;
        $this->recipeTitle = $recipe->title;
        $this->recipeFat = $recipe->fat;
        $this->recipeReadyInMinutes = $recipe->ready_in_minutes;
        $this->recipeCarbs = $recipe->carbs;
        $this->recipeProtein = $recipe->protein;
        $this->recipeCalories = $recipe->calories;
        $this->recipeImage = $recipe->image;
        $this->recipeIngredients = $recipe->ingredients;
        $this->recipeInstructions = $recipe->instructions;
        $this->recipeDishTypes = $recipe->dish_types;


        $this->showRecipeModal = true;

        $this->dispatchBrowserEvent('open-recipe-modal', ['recipeId' => $this->recipeId]);
    }
    public function closeRecipeModal()
    {

        $this->dispatchBrowserEvent('close-recipe-modal', ['recipeId' => $this->recipeId]);
        $this->showRecipeModal = false;
    }
    public function render()
    {

        return view('livewire.home');
    }
}