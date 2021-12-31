<?php

namespace App\Http\Livewire\Admin\Volunteerfield;

use App\Models\volunteerfield;
use Livewire\Component;

class Single extends Component
{

    public $volunteerfield;

    public function mount(Volunteerfield $volunteerfield){
        $this->volunteerfield = $volunteerfield;
    }

    public function delete()
    {
        $this->volunteerfield->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Volunteerfield') ]) ]);
        $this->emit('volunteerfieldDeleted');
    }

    public function render()
    {
        return view('livewire.admin.volunteerfield.single')
            ->layout('admin::layouts.app');
    }
}
