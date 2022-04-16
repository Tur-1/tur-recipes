<?php

namespace App\services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Exceptions\RecipeResponseException;

class SpoonacularApiService
{
    private $apiKey = '6ca57dbf85bf4601b5c70201444b91a3';
    private $baseUrl = 'https://api.spoonacular.com/recipes';



    public function getRecipes()
    {
        $randomRecipesAccessPoint = '/complexSearch';
        $infoPoint = '/informationBulk';

        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($randomRecipesAccessPoint, $this->getRecipesQuery());

        $ids = collect($response['results'])->pluck('id');
        $ids = $ids->toJson();

        $responseInfo = Http::withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($infoPoint, ['apiKey' => $this->apiKey, 'ids' =>   $ids, 'includeNutrition' => 'true']);



        $recipes = collect($responseInfo->json())->map(function ($recipe) {
            $ingre =  collect($recipe['extendedIngredients'])->map(function ($inr) {
                return  $inr['original'];
            })->toArray();

            $dish_types =  collect($recipe['dishTypes'])->__toString();

            return [
                'title' => $recipe['title'],
                'ready_in_minutes' => $recipe['readyInMinutes'],
                'instructions' =>  $recipe['instructions'],
                'ingredients' => $ingre,
                'image' => $recipe['image'],
                'calories' => intval($recipe['nutrition']['nutrients'][0]['amount']),
                'carbs' => intval($recipe['nutrition']['nutrients'][3]['amount']),
                'fat' => intval($recipe['nutrition']['nutrients'][1]['amount']),
                'protein' => intval($recipe['nutrition']['nutrients'][8]['amount']),
                'dish_types' => $dish_types,
            ];
        })->toArray();

        return $recipes;
    }

    public function getRecipesQuery()
    {
        $cats = collect([
            ['id' => 1, 'name' => 'pizza', 'imageUrl' => asset('assets/images/pizza-clip-art-15.png')],
            ['id' => 2, 'name' => 'burger ', 'imageUrl' => asset('assets/images/burgur.png')],
            ['id' => 3, 'name' => 'dessert', 'imageUrl' => asset('assets/images/8-86854_food-dessert-cupcake-muffin-clipart-hd-png-download.png')],
            ['id' => 4, 'name' => 'drinks', 'imageUrl' => asset('assets/images/drinks.jpg')],
            ['id' => 5, 'name' => 'steak', 'imageUrl' => asset('assets/images/steak.png')],
            ['id' => 6, 'name' => 'pasta', 'imageUrl' => asset('assets/images/5-57766_pasta-png-spaghetti-png.png')],

        ]);

        return [

            'apiKey' => $this->apiKey,
            'query' =>   $cats->pluck('name')->__toString(),
            'tags' => ['breakfast', 'lunch', 'dinner'],
            'number' => 1000
        ];
    }
}