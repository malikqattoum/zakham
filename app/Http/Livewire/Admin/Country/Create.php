<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    
    protected $rules = [
        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Country') ])]);
        
        Country::create([
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.country.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Country') ])]);
    }
}
