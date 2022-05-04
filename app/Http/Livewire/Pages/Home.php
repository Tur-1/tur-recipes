<?php

namespace App\Http\Livewire\Pages;

use Carbon\Carbon;
use App\Models\Recipe;
use Livewire\Component;
use App\services\SpoonacularApiService;

class Home extends Component
{
    public $categories = [];
    public $category;
    public $amount = 10;
    public $recipe;

    public $recipes = [];
    public $topRecipes = [];
    public $recommendRecipes = [];
    public $showRecipeModal = false;
    public $searchValue;
    public $recipeTitle, $recipeFat, $recipeCarbs, $recipeProtein, $recipeReadyInMinutes, $recipeImage,
        $recipeCalories,  $recipeInstructions, $recipeIngredients, $recipeId, $recipeDish_types;

    public function updatedSearchValue()
    {
        $this->searchRecipes();
    }

    public function searchRecipes()
    {
        if ($this->searchValue != "") {
            $this->searchValue = $this->searchValue;
        }
    }

    public function render()
    {


        $this->recipes  = $this->getAllRecipes();

        $this->recommendRecipes = $this->getRecommendMeal();
        $this->categories =  $this->getCategories();

        return view('livewire.pages.home')->extends('layouts.app')
            ->section('body');
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

            $this->searchValue = null;
            return;
        }

        if (!is_null($categoryId)) {
            $this->category =   collect($this->categories)->where("id", $categoryId)->first();
        }

        if (!is_null($this->category)) {

            $this->searchValue =  $this->category['name'];
        }
    }

    public function getAllRecipes()
    {

        $recipes =  Recipe::SearchRecipe($this->searchValue)->latest()->take($this->amount)->get();
        $this->topRecipes =  $recipes->take(5);

        return $recipes;
    }
    public function loadMore()
    {
        $this->amount += 10;
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

        $recommendRecipes = Recipe::SearchRecipe($recommendMeal)->take(20)->get();
        return $recommendRecipes;
    }


    public function openRecipeModal($recipeId)
    {

        if (is_null($recipeId))   return;

        $this->recipe = Recipe::find($recipeId);

        if (is_null($this->recipe))  return;



        $this->recipeId = $this->recipe->id;
        $this->recipeTitle = $this->recipe->title;
        $this->recipeFat = $this->recipe->fat;
        $this->recipeReadyInMinutes = $this->recipe->ready_in_minutes;
        $this->recipeCarbs = $this->recipe->carbs;
        $this->recipeProtein = $this->recipe->protein;
        $this->recipeCalories = $this->recipe->calories;
        $this->recipeImage = $this->recipe->image_url;
        $this->recipeIngredients = $this->recipe->ingredients;
        $this->recipeInstructions = $this->recipe->instructions;
        $this->recipeDishTypes = $this->recipe->dish_types;


        $this->showRecipeModal = true;

        $this->dispatchBrowserEvent('open-recipe-modal', ['recipeId' => $this->recipeId]);
    }
    public function closeRecipeModal()
    {

        $this->dispatchBrowserEvent('close-recipe-modal', ['recipeId' => $this->recipeId]);
        $this->showRecipeModal = false;
    }
}