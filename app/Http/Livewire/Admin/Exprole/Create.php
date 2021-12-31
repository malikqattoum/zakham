<?php

namespace App\Http\Livewire\Admin\Exprole;

use App\Models\exprole;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $ar_name;
    
    protected $rules = [
        'name' => 'required',        'ar_name' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Exprole') ])]);
        
        Exprole::create([
            'name' => $this->name,
            'ar_name' => $this->ar_name,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.exprole.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Exprole') ])]);
    }
}
