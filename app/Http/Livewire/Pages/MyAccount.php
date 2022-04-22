<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Traits\AlertMessages;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class MyAccount extends Component
{
    use WithFileUploads, FileUpload, AlertMessages;

    public $name, $email;
    public $avatar;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;


    protected $listeners = ['updated_account_info' => 'mount'];


    public function updatedAvatar()
    {
        $this->validate(['avatar' => 'required']);


        if ($this->avatar) {

            $oldImagePath = 'avatars/' . auth()->user()->avatar;
            $this->deletePreviousImage($oldImagePath);

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
    public function changePassword()
    {
        $this->validate($this->passwordRules());

        auth()->user()->update(['password' => $this->new_password]);


        $this->emit('updated_account_info');
        $this->dispatchBrowserEvent('updated_account_info');
        $this->resetFields();
    }
    protected function passwordRules()
    {
        return  [
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('current password does not match.');
                }
            }],
            'new_password' => 'required|string|min:1|same:new_password_confirmation|different:current_password',
            'new_password_confirmation' => 'required',
        ];
    }
    public function resetFields()
    {
        $this->resetValidation([
            'current_password',
            'new_password',
            'new_password_confirmation',
        ]);
        $this->reset([
            'current_password',
            'new_password',
            'new_password_confirmation',
        ]);
    }
    public function OpenPasswordModal()
    {
        $this->ShowModal = true;
        $this->dispatchBrowserEvent('OpenPasswordModal');
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