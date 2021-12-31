<?php

namespace App\Http\Livewire\Admin\Exprole;

use App\Models\exprole;
use Livewire\Component;

class Single extends Component
{

    public $exprole;

    public function mount(Exprole $exprole){
        $this->exprole = $exprole;
    }

    public function delete()
    {
        $this->exprole->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Exprole') ]) ]);
        $this->emit('exproleDeleted');
    }

    public function render()
    {
        return view('livewire.admin.exprole.single')
            ->layout('admin::layouts.app');
    }
}
