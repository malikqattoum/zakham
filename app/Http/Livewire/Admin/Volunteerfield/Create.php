<?php

namespace App\Http\Livewire\Admin\Volunteerfield;

use App\Models\volunteerfield;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    
    protected $rules = [
        'title' => 'required|min:3',
        'image' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Volunteerfield') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image/volunteer_fields');
        }

        Volunteerfield::create([
            'title' => $this->title,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.volunteerfield.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Volunteerfield') ])]);
    }
}
