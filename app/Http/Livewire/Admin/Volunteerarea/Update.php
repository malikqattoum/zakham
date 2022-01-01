<?php

namespace App\Http\Livewire\Admin\Volunteerarea;

use App\Models\VolunteerArea;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $volunteerarea;

    public $title;
    public $image;
    
    protected $rules = [
        'title' => 'required|min:3|max:60',
        'image' => 'required',        
    ];

    public function mount(Volunteerarea $volunteerarea){
        $this->volunteerarea = $volunteerarea;
        $this->title = $this->volunteerarea->title;
        $this->image = $this->volunteerarea->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Volunteerarea') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image/volunteer_areas');
        }

        $this->volunteerarea->update([
            'title' => $this->title,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.volunteerarea.update', [
            'volunteerarea' => $this->volunteerarea
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Volunteerarea') ])]);
    }
}
