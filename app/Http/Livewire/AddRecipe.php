<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Recipe;

class AddRecipe extends Component
{
    use WithFileUploads;

    public $ingredientsFields = [];
    public $categories = [];
    public $dish_types = [];
    public $title, $fat, $carbs, $protein, $ready_in_minutes, $image,
        $calories,  $instructions, $ingredients;


    protected $rules = [
        'reipce_name' => 'required',
        'instructions' => 'nullable',
        'ingredients' => 'nullable',
        'fat' => 'required',
        'carbs' => 'required',
        'protein' => 'required',
        'time' => 'required',
        'calories' => 'required',
        'dish_types' => 'required',
        'image' => ['required'],
    ];

    public function submit()
    {


        $str =  collect($this->dish_types)->__toString();
        $this->dish_types = str_replace(['"', '[', ']'], ' ', $str);
        dd($this->dish_types);

        $this->validate();

        $validated = [
            'title' => $this->title,
            'ready_in_minutes' => $this->ready_in_minutes,
            'instructions' => $this->instructions,
            'ingredients' => $this->ingredients,
            'image' => $this->image,
            'calories' => $this->calories,
            'carbs' =>  $this->carbs,
            'fat' =>  $this->fat,
            'protein' => $this->protein,
            'dish_types' => $this->dish_types,
        ];
        Recipe::create($validated);
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
        $this->ingredientsFields[] = ['ingredient' => null];
        $this->categories =  $this->getCategories();
    }
    public function addNewFields()
    {
        $this->ingredientsFields[] = ['ingredient' => null];
        $this->dispatchBrowserEvent('input-field-was-added');
    }
    public function render()
    {
        return view('livewire.add-recipe');
    }
}