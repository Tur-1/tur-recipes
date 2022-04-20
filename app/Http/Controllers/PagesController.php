<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    public function myAccountPage()
    {
        return view('pages.my-account');
    }
    public function favRecipes()
    {
        return view('pages.fav-recipes');
    }
    public function myRecipes()
    {
        return view('pages.my-recipes');
    }
}