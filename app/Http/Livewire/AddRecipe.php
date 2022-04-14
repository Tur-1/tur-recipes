<?php

namespace App\Http\Livewire;

use App\Models\Reipce;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddRecipe extends Component
{
    use WithFileUploads;
    public  $selectImage  = null;
    public $ingredientsFields = [];
    public $reipce_name, $fat, $carbs, $protein, $time, $calories, $instructions, $ingredients;


    protected $rules = [
        'reipce_name' => 'required',
        'instructions' => 'nullable',
        'ingredients' => 'nullable',
        'fat' => 'required',
        'carbs' => 'required',
        'protein' => 'required',
        'time' => 'required',
        'calories' => 'required',
        'image' => ['required'],
    ];

    public function submit()
    {

        $validated = $this->validate();


        Reipce::create($validated);
    }

    public function mount()
    {
        $this->ingredientsFields[] = ['ingredient' => null];
    }
    public function addNewFields()
    {
        $this->ingredientsFields[] = ['ingredient' => null];
    }
    public function render()
    {
        return view('livewire.add-recipe');
    }
}