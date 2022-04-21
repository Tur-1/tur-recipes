<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\MyAccount;
use App\Http\Livewire\Pages\MyRecipes;
use App\Http\Livewire\Pages\MyFavRecipes;
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
Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/my-account', MyAccount::class)->name('myAccount');
    Route::get('/my-fav-recipes', MyFavRecipes::class)->name('myFavRecipes');
    Route::get('/my-recipes', MyRecipes::class)->name('myRecipes');
});