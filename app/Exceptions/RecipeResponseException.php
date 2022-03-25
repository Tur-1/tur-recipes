<?php

namespace App\Exceptions;

use Exception;

class RecipeResponseException extends Exception
{

    public function render($request)
    {
        return response($this->getMessage());
    }
}