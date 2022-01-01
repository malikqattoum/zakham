<?php

namespace App\Http\Livewire\Admin\Carousel;

use App\Models\Carousel;
use Livewire\Component;

class Single extends Component
{

    public $carousel;

    public function mount(Carousel $carousel){
        $this->carousel = $carousel;
    }

    public function delete()
    {
        $this->carousel->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Carousel') ]) ]);
        $this->emit('carouselDeleted');
    }

    public function render()
    {
        return view('livewire.admin.carousel.single')
            ->layout('admin::layouts.app');
    }
}
