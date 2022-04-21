<?php

namespace App\Http\Livewire\Pages;

use App\Models\Recipe;
use Livewire\Component;

class MyRecipes extends Component
{
    public $myRecipes;
    public $recipeTitle, $recipeFat, $recipeCarbs, $recipeProtein, $recipeReadyInMinutes, $recipeImage,
        $recipeCalories,  $recipeInstructions, $recipeIngredients, $recipeId, $recipeDish_types;
    protected $listeners = ['update_my_recipes' => 'mount'];
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
        $this->recipeImage = $this->recipe->image;
        $this->recipeIngredients = $this->recipe->ingredients;
        $this->recipeInstructions = $this->recipe->instructions;
        $this->recipeDishTypes = $this->recipe->dish_types;



        $this->dispatchBrowserEvent('open-recipe-modal', ['recipeId' => $this->recipeId]);
    }
    public function closeRecipeModal()
    {

        $this->dispatchBrowserEvent('close-recipe-modal', ['recipeId' => $this->recipeId]);
    }
    public function mount()
    {
        $this->myRecipes =  auth()->user()->myRecipes;
    }
    public function render()
    {
        return view('livewire.pages.my-recipes');
    }
}