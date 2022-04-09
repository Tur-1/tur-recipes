<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\services\EdamamService;
use Illuminate\Support\Facades\Http;
use App\Exceptions\RecipeResponseException;
use Carbon\Carbon;

class Home extends Component
{
    public $categories;
    public $msg;
    public $SearchValue;
    public $recipes = [];
    public $recipeIngredients = [];
    public $baseUri = '';
    public $recipeName = null;
    public $recommendMeal;
    public $recommendRecipes = [];
    public $topRecipes = [];

    public function updated()
    {

        $this->searchRecipes();
    }
    public function searchRecipes()
    {

        if ($this->SearchValue != "") {

            try {
                $this->recipes =  (new EdamamService())->getRecipes($this->SearchValue);
                $this->recipes = collect($this->recipes);
                $this->topRecipes = $this->recipes->take(5);
            } catch (RecipeResponseException $ex) {
                abort(404);
            }
        }
    }
    public function getRecipes($categoryId = null)
    {


        if (!is_null($categoryId)) {
            $this->recipeName =   $this->categories->where("id", $categoryId)->first()['name'];
        }

        try {
            $this->recipes =  (new EdamamService())->getRecipes($this->recipeName);

            $this->recipes = collect($this->recipes);
            $this->topRecipes = $this->recipes->take(5);
        } catch (RecipeResponseException $ex) {
            abort(404);
        }
    }


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



        $this->recommendRecipes = $this->getRecommendRecipes();

        $this->categories =  $this->getCategories();
    }
    public function getRecommendRecipes()
    {
        $startMorning = Carbon::createFromTime(0, 0, 0, 'GMT+3');
        $endMorning = Carbon::createFromTime(12, 0, 0, 'GMT+3');

        $startAfterNoon = Carbon::createFromTime(12, 1, 0, 'GMT+3');
        $endAfterNoon = Carbon::createFromTime(18, 30, 0, 'GMT+3');

        $startEvning = Carbon::createFromTime(18, 31, 0, 'GMT+3');
        $endEvning = Carbon::createFromTime(23, 59, 0, 'GMT+3');



        $timeNow = Carbon::now('GMT+3');

        if ($timeNow->between($startMorning, $endMorning, true)) {
            $this->recommendMeal = 'breakfast';
        }

        if ($timeNow->between($startAfterNoon, $endAfterNoon, true)) {
            $this->recommendMeal = 'lunch';
        }
        if ($timeNow->between($startEvning, $endEvning, true)) {
            $this->recommendMeal = 'dinner';
        }


        try {
            $recommendRecipes =  (new EdamamService())->getRecipes($this->recommendMeal);
        } catch (RecipeResponseException $ex) {
            dd($ex->getMessage());
        }

        return $recommendRecipes;
    }
    public function render()
    {



        return view('livewire.home');
    }
}