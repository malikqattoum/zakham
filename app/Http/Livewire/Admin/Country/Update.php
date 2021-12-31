<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\country;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $country;

    
    protected $rules = [
        
    ];

    public function mount(Country $country){
        $this->country = $country;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Country') ]) ]);
        
        $this->country->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.country.update', [
            'country' => $this->country
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Country') ])]);
    }
}
