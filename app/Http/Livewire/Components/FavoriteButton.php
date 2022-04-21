<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class FavoriteButton extends Component
{
    public $recipeId;

    public $recipeAddedToFavList = false;
    public $alreadyInFavRecipes;

    public function addToFavoriteRecipesList()
    {


        if (auth()->user()->myFavRecipesHas($this->recipeId)) {


            auth()->user()->myFavRecipes()->detach($this->recipeId);
            $this->recipeAddedToFavList = false;
            $this->alreadyInFavRecipes = false;
        } else {

            auth()->user()->myFavRecipes()->attach($this->recipeId);
            $this->recipeAddedToFavList = true;
        }
        $this->emit('update_favorite_recipes');
    }
    public function render()
    {
        return view('livewire.components.favorite-button');
    }
}