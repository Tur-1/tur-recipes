<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use App\services\SpoonacularApiService;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{
    public $categories = [];
    public $category = null;
    public $recipes = [];
    public $topRecipes = [];

    public $recommendRecipes = [];
    public $recipe;
    public $showRecipe = false;
    public $searchValue;

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
            ['id' => 4, 'name' => 'drinks', 'imageUrl' => asset('assets/images/drinks.jpg')],
            ['id' => 5, 'name' => 'steak', 'imageUrl' => asset('assets/images/steak.png')],
            ['id' => 6, 'name' => 'pasta', 'imageUrl' => asset('assets/images/5-57766_pasta-png-spaghetti-png.png')],

        ];
    }


    public function getRecipesByCategory($categoryId)
    {
        if (!is_null($categoryId)) {

            $category =   collect($this->categories)->where("id", $categoryId)->first()['name'];
        }

        if (!is_null($category)) {

            $this->recipes = $this->getAllRecipes($category);
        }
    }

    public function getAllRecipes($value = null)
    {

        $recipes = Recipe::SearchRecipe($value)->get();
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
        $this->recipes = $this->getAllRecipes();
    }

    public function render()
    {

        return view('livewire.home');
    }
}