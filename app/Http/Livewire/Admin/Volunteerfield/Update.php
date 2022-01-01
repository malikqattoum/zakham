<?php

namespace App\Http\Livewire\Admin\Volunteerfield;

use App\Models\VolunteerField;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $volunteerfield;

    public $title;
    public $image;
    
    protected $rules = [
        'title' => 'required|min:3',
        'image' => 'required',        
    ];

    public function mount(Volunteerfield $volunteerfield){
        $this->volunteerfield = $volunteerfield;
        $this->title = $this->volunteerfield->title;
        $this->image = $this->volunteerfield->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Volunteerfield') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image/volunteer_fields');
        }

        $this->volunteerfield->update([
            'title' => $this->title,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.volunteerfield.update', [
            'volunteerfield' => $this->volunteerfield
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Volunteerfield') ])]);
    }
}
