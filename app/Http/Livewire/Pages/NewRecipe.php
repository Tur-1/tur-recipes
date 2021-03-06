<?php

namespace App\Http\Livewire\Pages;

use App\Traits\AlertMessages;
use Livewire\Component;

use App\Traits\FileUpload;
use Livewire\WithFileUploads;

class NewRecipe extends Component
{
    use WithFileUploads, FileUpload, AlertMessages;

    public $ingredients = [];
    public $meal_types;
    public $dish_types = [];
    public $title;
    public $fat;
    public $carbs;
    public $protein;
    public $ready_in_minutes;
    public $image;
    public $calories;
    public $instructions;


    protected $rules = [
        'title' => 'required',
        'instructions' => 'nullable',
        'ingredients' => 'nullable',
        'fat' => 'required',
        'carbs' => 'required',
        'protein' => 'required',
        'ready_in_minutes' => 'required',
        'calories' => 'required',
        'meal_types' => 'required',
        'dish_types' => 'nullable',
        'image' => ['required', 'file', 'mimes:png,jpg,jepg,pdf', 'max:102400'],
    ];

    public function submit()
    {


        $this->ingredients = array_filter($this->ingredients);


        $this->validate();


        if ($this->image) {

            $newImageName = $this->uploadImageInStorage($this->image, 'recipes');
        }


        $validated = [
            'title' => $this->title,
            'ready_in_minutes' => $this->ready_in_minutes,
            'instructions' => $this->instructions,
            'ingredients' => $this->ingredients,
            'image' => $newImageName,
            'calories' => $this->calories,
            'carbs' =>  $this->carbs,
            'fat' =>  $this->fat,
            'protein' => $this->protein,
            'meal_types' => $this->meal_types,
            'categories' => $this->dish_types,
        ];
        auth()->user()->myRecipes()->create($validated);

        $this->reset();
        $this->RedirectWithSuccessMsg('home', ' recipe was successfully added');
    }

    public function getCategories()
    {
        return [
            ['id' => 1, 'name' => 'pizza', 'imageUrl' => asset('assets/images/pizza-clip-art-15.png')],
            ['id' => 2, 'name' => 'burger', 'imageUrl' => asset('assets/images/burgur.png')],
            ['id' => 3, 'name' => 'dessert', 'imageUrl' => asset('assets/images/8-86854_food-dessert-cupcake-muffin-clipart-hd-png-download.png')],
            ['id' => 4, 'name' => 'drinks', 'imageUrl' => asset('assets/images/drinks2.jpg')],
            ['id' => 5, 'name' => 'steak', 'imageUrl' => asset('assets/images/steak.png')],
            ['id' => 7, 'name' => 'pasta', 'imageUrl' => asset('assets/images/5-57766_pasta-png-spaghetti-png.png')],
            ['id' => 8, 'name' => 'Sandwiches', 'imageUrl' => asset('assets/images/sandow.jpg')],
            ['id' => 9, 'name' => 'Muffins', 'imageUrl' => asset('assets/images/Muffins.jpg')],
        ];
    }

    public function getMealTypes()
    {
        return [
            'breakfast',
            'lunch',
            'dinner',
            'snack'
        ];
    }
    public function mount()
    {
        $this->ingredients[] = [];
    }
    public function addNewFields()
    {
        $this->ingredients[] = [];
        $this->dispatchBrowserEvent('input-field-was-added');
    }
    public function render()
    {
        $categories =  $this->getCategories();
        $mealTypes =  $this->getMealTypes();
        return view('livewire.pages.new-recipe', compact('categories', 'mealTypes'))->extends('layouts.app')
            ->section('body');
    }
}