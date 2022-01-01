<?php

namespace App\Http\Livewire\Admin\Userinitiative;

use App\Models\UserInitiative;
use Livewire\Component;

class Single extends Component
{

    public $userinitiative;

    public function mount(Userinitiative $userinitiative){
        $this->userinitiative = $userinitiative;
    }

    public function delete()
    {
        $this->userinitiative->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Userinitiative') ]) ]);
        $this->emit('userinitiativeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.userinitiative.single')
            ->layout('admin::layouts.app');
    }
}
