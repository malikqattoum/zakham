<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\subcategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $ar_name;
    public $cat_id;
    
    protected $rules = [
        'name' => 'required|min:3|max:60',
        'ar_name' => 'max:60',
        'cat_id' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Subcategory') ])]);
        
        Subcategory::create([
            'name' => $this->name,
            'ar_name' => $this->ar_name,
            'cat_id' => $this->cat_id,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.subcategory.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Subcategory') ])]);
    }
}
