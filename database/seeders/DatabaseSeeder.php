<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use App\services\SpoonacularApiService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $reecipes = (new SpoonacularApiService())->getRecipes();

        foreach ($reecipes as $key => $recipe) {
            if (!Recipe::where('id', $recipe['idd'])->exists()) {
                Recipe::create(
                    [

                        'title' => $recipe['title'],
                        'ready_in_minutes' => $recipe['readyInMinutes'],
                        'instructions' =>  $recipe['instructions'],
                        'ingredients' => $recipe['ingredients'],
                        'image' => $recipe['image'],
                        'calories' => intval($recipe['calories']),
                        'carbs' => intval($recipe['carbs']),
                        'fat' => intval($recipe['fat']),
                        'protein' => intval($recipe['protein']),
                        'dish_types' => $recipe['dish_types'],
                    ]
                );
            }
        }




        // \App\Models\User::factory(10)->create();
    }
}