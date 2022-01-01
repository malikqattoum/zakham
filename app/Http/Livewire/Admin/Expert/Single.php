<?php

namespace App\Http\Livewire\Admin\Expert;

use App\Models\Expert;
use Livewire\Component;

class Single extends Component
{

    public $expert;

    public function mount(Expert $expert){
        $this->expert = $expert;
    }

    public function delete()
    {
        $this->expert->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Expert') ]) ]);
        $this->emit('expertDeleted');
    }

    public function render()
    {
        return view('livewire.admin.expert.single')
            ->layout('admin::layouts.app');
    }
}
