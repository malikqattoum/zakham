<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $subcategory;

    public $name;
    public $ar_name;
    public $cat_id;
    
    protected $rules = [
        'name' => 'required|min:3|max:60',
        'ar_name' => 'max:60',
        'cat_id' => 'required',        
    ];

    public function mount(Subcategory $subcategory){
        $this->subcategory = $subcategory;
        $this->name = $this->subcategory->name;
        $this->ar_name = $this->subcategory->ar_name;
        $this->cat_id = $this->subcategory->cat_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Subcategory') ]) ]);
        
        $this->subcategory->update([
            'name' => $this->name,
            'ar_name' => $this->ar_name,
            'cat_id' => $this->cat_id,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.subcategory.update', [
            'subcategory' => $this->subcategory
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Subcategory') ])]);
    }
}
