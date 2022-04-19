<?php

namespace App\Http\Livewire;

use App\Traits\AlertMessages;
use Livewire\Component;
use Illuminate\Support\Str;

class UserAccountSettings extends Component
{
    use AlertMessages;

    public $name, $email;


    protected $listeners = ['updated_account_info' => 'mount'];

    protected function rules()
    {
        return  [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),

        ];
    }

    public function updateAccountInfo()
    {

        $this->validate();

        auth()->user()->update(
            [

                'name' =>  Str::title($this->name),
                'email' => $this->email,
            ]
        );

        $this->showTostSuccessMessage('Account information has been updated successfully');

        $this->emit('updated_account_info');
    }
    public function mount()
    {
        $this->name  = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.user-account-settings');
    }
}