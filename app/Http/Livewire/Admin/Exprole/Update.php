<?php

namespace App\Http\Livewire\Admin\Exprole;

use App\Models\exprole;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $exprole;

    public $name;
    public $ar_name;
    
    protected $rules = [
        'name' => 'required',        'ar_name' => 'required',        
    ];

    public function mount(Exprole $exprole){
        $this->exprole = $exprole;
        $this->name = $this->exprole->name;
        $this->ar_name = $this->exprole->ar_name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Exprole') ]) ]);
        
        $this->exprole->update([
            'name' => $this->name,
            'ar_name' => $this->ar_name,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.exprole.update', [
            'exprole' => $this->exprole
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Exprole') ])]);
    }
}
