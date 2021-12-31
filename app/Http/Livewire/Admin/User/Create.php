<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $res_country;
    public $image;
    
    protected $rules = [
        'first_name' => 'required|min:3|max:60',
        'last_name' => 'required|min:3|max:60',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
        'res_country' => '',
        'image' => '',         
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('User') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('images/users');
        }

        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
            'res_country' => $this->res_country,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.user.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('User') ])]);
    }
}
