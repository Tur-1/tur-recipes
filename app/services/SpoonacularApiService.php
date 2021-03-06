<?php

namespace App\services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Exceptions\RecipeResponseException;

class SpoonacularApiService
{
    private $apiKey = '4f983cf763974d19aa58c0c4333b68e8';
    private $baseUrl = 'https://api.spoonacular.com/recipes';



    public function getRecipes()
    {
        $randomRecipesAccessPoint = '/random';
        $infoPoint = '/informationBulk';

        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($randomRecipesAccessPoint, $this->getRecipesQuery());


        if ($response->failed()) {
            dd('response failed');
        }

        $ids = collect($response['recipes'])->pluck('id');
        $ids = $ids->toJson();

        $responseInfo = Http::withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($infoPoint, ['apiKey' => $this->apiKey, 'ids' =>   $ids, 'includeNutrition' => 'true']);




        $responseInfo = collect($responseInfo->json())->filter(function ($recipe) {
            return isset($recipe['image']) && isset($recipe['id']);
        })->toArray();



        $recipes = collect($responseInfo)->map(function ($recipe) {
            $ingre =  collect($recipe['extendedIngredients'])->map(function ($inr) {
                return  $inr['original'];
            })->toArray();


            return [
                'idd' => $recipe['id'],
                'title' => $recipe['title'],
                'ready_in_minutes' => $recipe['readyInMinutes'],
                'instructions' =>  $recipe['instructions'],
                'ingredients' => $ingre,
                'image' => $recipe['image'],
                'calories' => intval($recipe['nutrition']['nutrients'][0]['amount']),
                'carbs' => intval($recipe['nutrition']['nutrients'][3]['amount']),
                'fat' => intval($recipe['nutrition']['nutrients'][1]['amount']),
                'protein' => intval($recipe['nutrition']['nutrients'][8]['amount']),
                'meal_types' => $recipe['dishTypes'],
            ];
        })->toArray();



        return $recipes;
    }

    public function getRecipesQuery()
    {


        return [
            'apiKey' => $this->apiKey,
            'number' => 100
        ];
    }
}