<?php

use App\Http\Controllers\PagesController;
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
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/my-account', 'myAccountPage')->name('myAccountPage');
});