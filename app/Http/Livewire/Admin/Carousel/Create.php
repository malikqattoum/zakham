<?php

namespace App\Http\Livewire\Admin\Carousel;

use App\Models\carousel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $image;
    
    protected $rules = [
        'image' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Carousel') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image/carousel');
        }

        Carousel::create([
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.carousel.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Carousel') ])]);
    }
}
