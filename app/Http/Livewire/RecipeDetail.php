<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\services\SpoonacularApiService;
use App\Exceptions\RecipeResponseException;

class RecipeDetail extends Component
{
    public $recipe;
    public function mount($id)
    {
        try {
            $this->recipe =  (new SpoonacularApiService())->getRecipeById($id);
        } catch (RecipeResponseException $ex) {
            dd($ex->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.recipe-detail');
    }
}