<?php

namespace App\Http\Livewire\Pages;

use App\Models\Recipe;
use App\services\HomePageService;
use Livewire\Component;

class Home extends Component
{
    public $categories = [];
    public $category;
    public $amount = 10;
    public $recipe;
    private $homePageService;
    public $recipes = [];
    public $topRecipes = [];
    public $recommendRecipes = [];
    public $showRecipeModal = false;
    public $searchValue;
    public $recipeTitle, $recipeFat, $recipeCarbs, $recipeProtein, $recipeReadyInMinutes, $recipeImage,
        $recipeCalories,  $recipeInstructions, $recipeIngredients, $recipeId, $recipeDish_types;


    public function __construct()
    {
        $this->homePageService = new HomePageService();
    }




    public function mount()
    {
        $this->categories = $this->homePageService->getCategories();
        $this->recommendRecipes = $this->homePageService->getRecommendMeals();
        $this->recipes  = $this->homePageService->getRecipes($this->amount);
        $this->topRecipes = $this->recipes->take(5);
    }



    public function updatedSearchValue()
    {
        if ($this->searchValue != "") {

            $this->recipes  = $this->homePageService->getRecipes($this->amount, $this->searchValue);
            $this->topRecipes = $this->recipes->take(5);
        }
    }




    public function getRecipesByCategory($categoryId)
    {


        if (!is_null($this->category) && $this->category['id'] == $categoryId) {

            $this->recipes  = $this->homePageService->getRecipes($this->amount);
            $this->topRecipes = $this->recipes->take(5);
            $this->category = null;
            return;
        }

        if (!is_null($categoryId)) {
            $this->category =   collect($this->categories)->where("id", $categoryId)->first();
        }

        if (!is_null($this->category)) {
            $this->recipes  = $this->homePageService->getRecipes($this->amount, $this->category['name']);
            $this->topRecipes = $this->recipes->take(5);
        }
    }


    public function loadMore()
    {
        $this->amount += 10;
        $searchValue = $this->category['name'] ?? $this->searchValue;
        $this->recipes  = $this->homePageService->getRecipes($this->amount,  $searchValue);
        $this->topRecipes = $this->recipes->take(5);
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

    public function render()
    {



        return view('livewire.pages.home')->extends('layouts.app')
            ->section('body');
    }
}