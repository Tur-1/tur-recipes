<?php

namespace App\services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Exceptions\RecipeResponseException;

class SpoonacularApiService
{
    private $apiKey = 'd108bc9ce3d246df95f54544865d8ceb';
    private $baseUrl = 'https://api.spoonacular.com/recipes';



    public function getRecipes()
    {
        $randomRecipesAccessPoint = '/random';
        $infoPoint = '/informationBulk';

        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($randomRecipesAccessPoint, $this->getRecipesQuery());


        $ids = collect($response['recipes'])->pluck('id');
        $ids = $ids->toJson();

        $responseInfo = Http::withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($infoPoint, ['apiKey' => $this->apiKey, 'ids' =>   $ids, 'includeNutrition' => 'true']);




        $responseInfo = collect($responseInfo->json())->filter(function ($recipe) {
            return isset($recipe['image']);
        })->toArray();



        $recipes = collect($responseInfo)->map(function ($recipe) {
            $ingre =  collect($recipe['extendedIngredients'])->map(function ($inr) {
                return  $inr['original'];
            })->toArray();

            $str =  collect($recipe['dishTypes'])->__toString();
            $dish_types = str_replace(['"', '[', ']'], ' ', $str);

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


        return [

            'apiKey' => $this->apiKey,

            'number' => 5000,

        ];
    }
}