<?php

namespace App\Http\Livewire\Admin\Expert;

use App\Models\expert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $expert;

    public $name;
    public $specialty;
    public $facebook;
    public $twitter;
    public $instagram;
    public $youtube;
    public $website;
    public $linkedin;
    public $image;
    
    protected $rules = [
        'name' => 'required|min:3|max:60',
        'specialty' => 'required|min:3|max:100',
        'facebook' => 'max:255',
        'twitter' => 'max:255',
        'instagram' => 'max:255',
        'youtube' => 'max:255',
        'website' => 'max:255',
        'linkedin' => 'max:255',
        'image' => 'required',        
    ];

    public function mount(Expert $expert){
        $this->expert = $expert;
        $this->name = $this->expert->name;
        $this->specialty = $this->expert->specialty;
        $this->facebook = $this->expert->facebook;
        $this->twitter = $this->expert->twitter;
        $this->instagram = $this->expert->instagram;
        $this->youtube = $this->expert->youtube;
        $this->website = $this->expert->website;
        $this->linkedin = $this->expert->linkedin;
        $this->image = $this->expert->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Expert') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image/experts');
        }

        $this->expert->update([
            'name' => $this->name,
            'specialty' => $this->specialty,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'website' => $this->website,
            'linkedin' => $this->linkedin,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.expert.update', [
            'expert' => $this->expert
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Expert') ])]);
    }
}
