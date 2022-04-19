<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use App\Traits\FileUpload;
use App\Traits\AlertMessages;
use Livewire\WithFileUploads;

class UpdateUserAvatar extends Component
{
    use WithFileUploads, FileUpload, AlertMessages;

    public $avatar;


    protected $rules = [

        'avatar' => ['required'],
    ];

    public function updatedAvatar()
    {
        $this->validate();


        if ($this->avatar) {

            $newImageName = $this->uploadImageInStorage($this->avatar, 'avatars');
        }

        auth()->user()->update(['avatar' => $newImageName]);

        $this->showTostSuccessMessage('avatar was updated');
    }

    public function render()
    {
        return view('livewire.update-user-avatar');
    }
}