<?php

namespace App\services;

use Illuminate\Support\Facades\Http;
use App\Exceptions\RecipeResponseException;

class SpoonacularApiService
{
    private $apiKey = '4f983cf763974d19aa58c0c4333b68e8';
    private $baseUrl = 'https://api.spoonacular.com/recipes';



    public function getRecipes($recipeName, $recipesAmount)
    {
        $randomRecipesAccessPoint = '/random';


        $response = Http::timeout(10)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($randomRecipesAccessPoint, $this->getRecipesQuery($recipeName, $recipesAmount));

        if ($response->failed()) {
            throw new RecipeResponseException("response failed");
        }

        return $response['recipes'];
    }

    public function getRecipesQuery($recipeName, $recipesAmount)
    {
        return [

            'apiKey' => $this->apiKey,
            'tags' => $recipeName,
            'number' => $recipesAmount


        ];
    }
    public function getRecipeById($recipeId)
    {

        $recipeAccessPoint =   $recipeId . '/information';
        $NutritionAccessPoint = $recipeId . '/nutritionWidget.json';


        $recipeResponse = Http::timeout(10)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($recipeAccessPoint,  ['apiKey' => $this->apiKey]);




        $nutrientsResponse = Http::timeout(10)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->baseUrl($this->baseUrl)
            ->get($NutritionAccessPoint,  ['apiKey' => $this->apiKey]);


        if ($recipeResponse->failed()) {
            throw new RecipeResponseException("response failed");
        }




        $recipe = [
            'id' => $recipeResponse->json()['id'],
            'title' => $recipeResponse->json()['title'],
            'readyInMinutes' => $recipeResponse->json()['readyInMinutes'],
            'instructions' =>  $recipeResponse->json()['instructions'],
            'extendedIngredients' => $recipeResponse->json()['extendedIngredients'],
            'image' => $recipeResponse->json()['image'],
            'calories' => $nutrientsResponse['calories'],
            'carbs' => $nutrientsResponse['carbs'],
            'fat' => $nutrientsResponse['fat'],
            'protein' => $nutrientsResponse['protein'],

        ];


        return  $recipe;
    }
}