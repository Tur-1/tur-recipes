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

        foreach ($reecipes as $key => $value) {

            Recipe::create($value);
        }




        // \App\Models\User::factory(10)->create();
    }
}