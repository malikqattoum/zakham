<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $user;

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $res_country;
    public $image;
    
    protected $rules = [
        'first_name' => 'required|min:3|max:60',
        'last_name' => 'required|min:3|max:60',
        'email' => 'required|email',
        'password' => 'required|string|min:8',
        'res_country' => '',
        'image' => '',        
    ];

    public function mount(User $user){
        $this->user = $user;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->res_country = $this->user->res_country;
        $this->image = $this->user->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('User') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('images/users');
        }

        $this->user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
            'res_country' => $this->res_country,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.user.update', [
            'user' => $this->user
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('User') ])]);
    }
}
