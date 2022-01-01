<?php

namespace App\Http\Livewire\Admin\Initiative;

use App\Models\Initiative;
use Livewire\Component;

class Single extends Component
{

    public $initiative;

    public function mount(Initiative $initiative){
        $this->initiative = $initiative;
    }

    public function delete()
    {
        $this->initiative->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Initiative') ]) ]);
        $this->emit('initiativeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.initiative.single')
            ->layout('admin::layouts.app');
    }
}
