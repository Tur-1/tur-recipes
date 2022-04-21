<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Traits\AlertMessages;
use Livewire\WithFileUploads;

class MyAccount extends Component
{
    use WithFileUploads, FileUpload, AlertMessages;

    public $name, $email;
    public $avatar;



    protected $listeners = ['updated_account_info' => 'mount'];


    public function updatedAvatar()
    {
        $this->validate(['avatar' => 'required']);


        if ($this->avatar) {

            $newImageName = $this->uploadImageInStorage($this->avatar, 'avatars');
        }

        auth()->user()->update(['avatar' => $newImageName]);

        $this->showTostSuccessMessage('avatar was updated');
    }
    public function submitAccountInfo()
    {

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update(
            [
                'name' =>  Str::title($this->name),
                'email' => $this->email,
            ]
        );

        $this->showTostSuccessMessage('Account information has been updated successfully');

        $this->emit('updated_account_info');
        $this->dispatchBrowserEvent('updated_account_info');
    }
    public function mount()
    {
        $this->name  = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.pages.my-account')->extends('layouts.app')
            ->section('body');
    }
}