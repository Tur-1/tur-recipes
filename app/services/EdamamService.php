<?php

namespace App\services;

use App\Exceptions\RecipeResponseException;
use Illuminate\Support\Facades\Http;

class EdamamService
{
    private $apiId;
    private $apiKey;
    private $edamamAccessPoint;


    public function __construct()
    {
        $this->edamamAccessPoint = 'https://api.edamam.com/api/recipes/v2';
        $this->apiId = config('recipes.edamam.app_id');
        $this->apiKey = config('recipes.edamam.app_keys');
    }

    public function getRecipes($recipeName)
    {
        $response = Http::timeout(10)->get($this->edamamAccessPoint, $this->getQuery($recipeName));

        if ($response->failed()) {
            throw new RecipeResponseException("response failed");
        }

        return $response['hits'];
    }

    public function getQuery($recipeName)
    {
        return [
            'type' =>  'public',
            'q' => $recipeName,
            'app_id' =>  $this->apiId,
            'app_key' =>  $this->apiKey,

            'field' => [
                'label',
                'image',
                'ingredientLines',
                'totalTime',
                'calories',
            ],

        ];
    }
}