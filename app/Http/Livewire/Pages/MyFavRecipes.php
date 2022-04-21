<?php

namespace App\Http\Livewire\Pages;

use App\Models\Recipe;
use Livewire\Component;

class MyFavRecipes extends Component
{
    public $myFavRecipes;
    public $recipeTitle, $recipeFat, $recipeCarbs, $recipeProtein, $recipeReadyInMinutes, $recipeImage,
        $recipeCalories,  $recipeInstructions, $recipeIngredients, $recipeId, $recipeDish_types;
    protected $listeners = ['update_favorite_recipes' => 'mount'];
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
    public function mount()
    {
        $this->myFavRecipes =  auth()->user()->myFavRecipes;
    }
    public function render()
    {

        return view('livewire.pages.my-fav-recipes')->extends('layouts.app')
            ->section('body');
    }
}