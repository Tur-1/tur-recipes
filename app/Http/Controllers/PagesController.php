<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    public function recipe($recipe_id)
    {
        return view('pages.recipe');
    }
}