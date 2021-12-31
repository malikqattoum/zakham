<?php

namespace App\Http\Livewire\Admin\Carousel;

use App\Models\carousel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $carousel;

    public $image;
    
    protected $rules = [
        'image' => 'required',        
    ];

    public function mount(Carousel $carousel){
        $this->carousel = $carousel;
        $this->image = $this->carousel->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Carousel') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image/carousel');
        }

        $this->carousel->update([
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.carousel.update', [
            'carousel' => $this->carousel
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Carousel') ])]);
    }
}
