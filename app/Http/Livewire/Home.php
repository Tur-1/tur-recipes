<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\services\EdamamService;
use Illuminate\Support\Facades\Http;
use App\Exceptions\RecipeResponseException;

class Home extends Component
{
    public $categories;
    public $SearchValue;
    public $recipes = [];
    public $recipeIngredients = [];
    public $baseUri = '';
    public $recipeName = null;

    public function updated()
    {

        if ($this->SearchValue != "") {
            $this->categories = $this->categories->filter(fn ($item) =>  str_contains($item['name'],  $this->SearchValue));
            $this->recipeName = $this->SearchValue;

            $this->getRecipes();
        } else {
            $this->categories = $this->getCategories();
        }
    }
    public function getRecipes($categoryId = null)
    {

        if (!is_null($categoryId)) {
            $this->recipeName =   $this->categories->where("id", $categoryId)->first()['name'];
        }

        try {
            $this->recipes =  (new EdamamService())->getRecipes($this->recipeName);
        } catch (RecipeResponseException $ex) {
            dd($ex->getMessage());
        }
    }

    public function getRecipeIngredients($recipeId)
    {
    }
    // public function getRecipes($categoryId)
    // {


    //     $this->recipeName =   $this->categories->where("id", $categoryId)->first()['name'];
    //     $url = 'https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/search';
    //     $query = [
    //         'query' =>   $this->recipeName,
    //         'number' => '30',
    //         'offset' => '0',
    //     ];
    //     $headers = [
    //         'X-RapidAPI-Host' => 'spoonacular-recipe-food-nutrition-v1.p.rapidapi.com',
    //         'X-RapidAPI-Key' => 'aa7845b4bdmshbebc21dcf2b07afp15d676jsnfa4dc2612468'
    //     ];

    //     $res = Http::withHeaders($headers)->get($url, $query);

    //     if ($res->successful()) {
    //         $this->recipes =  $res->json('results');
    //         $this->baseUri =  $res['baseUri'];
    //     }
    // }
    // public function getRecipeIngredients($recipeId)
    // {
    //     $url = 'https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/' . $recipeId . '/ingredientWidget.json';

    //     $headers = [
    //         'X-RapidAPI-Host' => 'spoonacular-recipe-food-nutrition-v1.p.rapidapi.com',
    //         'X-RapidAPI-Key' => 'aa7845b4bdmshbebc21dcf2b07afp15d676jsnfa4dc2612468'
    //     ];

    //     $res = Http::withHeaders($headers)->get($url);

    //     if ($res->successful()) {
    //         $this->recipeIngredients =  $res->json('ingredients');
    //         $this->dispatchBrowserEvent('show-recipe-ingredients', ['recipeId' => $recipeId]);
    //     }
    // }
    public function getCategories()
    {
        return collect([
            ['id' => 1, 'name' => 'pizza', 'imageUrl' => asset('assets/images/pizza-clip-art-15.png')],
            ['id' => 2, 'name' => 'burger ', 'imageUrl' => asset('assets/images/burgur.png')],
            ['id' => 3, 'name' => 'dessert', 'imageUrl' => asset('assets/images/8-86854_food-dessert-cupcake-muffin-clipart-hd-png-download.png')],
            ['id' => 4, 'name' => 'drinks', 'imageUrl' => asset('assets/images/drinks.jpg')],
            ['id' => 5, 'name' => 'steak', 'imageUrl' => asset('assets/images/steak.png')],
            ['id' => 6, 'name' => 'pasta', 'imageUrl' => asset('assets/images/5-57766_pasta-png-spaghetti-png.png')],

        ]);
    }

    public function mount()
    {
        $this->categories =  $this->getCategories();
    }
    public function render()
    {



        return view('livewire.home');
    }
}