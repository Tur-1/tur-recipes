<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Recipes extends Component
{
    public $recipes = [];

    protected $listeners = ['recipes' => 'getallRecipes'];

    public function getallRecipes($recipes)
    {
        dd($recipes);
        $this->recipes = $recipes;
    }
    public function render()
    {
        return view('livewire.recipes');
    }
}