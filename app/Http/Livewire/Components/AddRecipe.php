<?php

namespace App\Http\Livewire\Components;

use App\Traits\AlertMessages;
use Livewire\Component;

use App\Traits\FileUpload;
use Livewire\WithFileUploads;

class AddRecipe extends Component
{
    use WithFileUploads, FileUpload, AlertMessages;

    public $ingredients = [];
    public $categories = [];
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
        'dish_types' => 'required',
        'image' => ['required'],
    ];

    public function submit()
    {


        $str =  collect($this->dish_types)->__toString();
        $this->dish_types = str_replace(['"', '[', ']'], ' ', $str);


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
            'dish_types' => $this->dish_types,
        ];
        auth()->user()->myRecipes()->create($validated);


        $this->showTostSuccessMessage('recipe was successfully added');
        $this->dispatchBrowserEvent('close-form-recipe-modal');
    }

    public function getCategories()
    {
        return [
            ['id' => 1, 'name' => 'pizza', 'imageUrl' => asset('assets/images/pizza-clip-art-15.png')],
            ['id' => 2, 'name' => 'burger ', 'imageUrl' => asset('assets/images/burgur.png')],
            ['id' => 3, 'name' => 'dessert', 'imageUrl' => asset('assets/images/8-86854_food-dessert-cupcake-muffin-clipart-hd-png-download.png')],
            ['id' => 4, 'name' => 'drinks', 'imageUrl' => asset('assets/images/drinks2.jpg')],
            ['id' => 5, 'name' => 'steak', 'imageUrl' => asset('assets/images/steak.png')],
            ['id' => 7, 'name' => 'pasta', 'imageUrl' => asset('assets/images/5-57766_pasta-png-spaghetti-png.png')],
            ['id' => 8, 'name' => 'Sandwiches', 'imageUrl' => asset('assets/images/sandow.jpg')],
            ['id' => 9, 'name' => 'Muffins', 'imageUrl' => asset('assets/images/Muffins.jpg')],
            ['id' => 10, 'name' => 'Coolkies', 'imageUrl' => asset('assets/images/coolkie.jpg')],


        ];
    }
    public function mount()
    {
        $this->ingredients[] = [];
        $this->categories =  $this->getCategories();
    }
    public function addNewFields()
    {
        $this->ingredients[] = [];
        $this->dispatchBrowserEvent('input-field-was-added');
    }
    public function render()
    {
        return view('livewire.components.add-recipe');
    }
}