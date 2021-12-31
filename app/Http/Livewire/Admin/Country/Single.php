<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\country;
use Livewire\Component;

class Single extends Component
{

    public $country;

    public function mount(Country $country){
        $this->country = $country;
    }

    public function delete()
    {
        $this->country->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Country') ]) ]);
        $this->emit('countryDeleted');
    }

    public function render()
    {
        return view('livewire.admin.country.single')
            ->layout('admin::layouts.app');
    }
}
