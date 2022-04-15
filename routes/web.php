<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Recipes;
use App\Http\Livewire\RecipeDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', Home::class)->name('home');

Route::get('/recipes', Recipes::class)->name('recipes');

Route::get('/recipe/{id}', RecipeDetail::class)->name('recipeDetail');