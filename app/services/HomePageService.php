<?php

namespace App\services;

use App\Models\Recipe;
use Carbon\Carbon;

class HomePageService
{

    public function getRecipes($amount, $searchValue = null)
    {

        return Recipe::SearchRecipeBy($searchValue)->take($amount)->latest()->get();
    }

    public function getRecommendMeals()
    {

        return $this->getRecipes(20, $this->getRecommendMealType());
    }
    public function getRecommendMealType()
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

    public function getCategories()
    {
        return [
            ['id' => 1, 'name' => 'pizza', 'imageUrl' => asset('assets/images/pizza-clip-art-15.png')],
            ['id' => 2, 'name' => 'burger', 'imageUrl' => asset('assets/images/burgur.png')],
            ['id' => 3, 'name' => 'dessert', 'imageUrl' => asset('assets/images/8-86854_food-dessert-cupcake-muffin-clipart-hd-png-download.png')],
            ['id' => 4, 'name' => 'drinks', 'imageUrl' => asset('assets/images/drinks2.jpg')],
            ['id' => 5, 'name' => 'steak', 'imageUrl' => asset('assets/images/steak.png')],
            ['id' => 7, 'name' => 'pasta', 'imageUrl' => asset('assets/images/5-57766_pasta-png-spaghetti-png.png')],
            ['id' => 8, 'name' => 'Sandwiches', 'imageUrl' => asset('assets/images/sandow.jpg')],
            ['id' => 9, 'name' => 'Muffins', 'imageUrl' => asset('assets/images/Muffins.jpg')],
            ['id' => 10, 'name' => 'Cookies', 'imageUrl' => asset('assets/images/coolkie.jpg')],
        ];
    }
}