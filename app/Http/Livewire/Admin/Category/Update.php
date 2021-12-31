<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $category;

    public $name;
    public $ar_name;
    public $active;
    
    protected $rules = [
        'name' => 'required|min:3|max:60',
        'ar_name' => 'max:60',        
    ];

    public function mount(Category $category){
        $this->category = $category;
        $this->name = $this->category->name;
        $this->ar_name = $this->category->ar_name;
        $this->active = $this->category->active;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Category') ]) ]);
        
        $this->category->update([
            'name' => $this->name,
            'ar_name' => $this->ar_name,
            'active' => $this->active,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.category.update', [
            'category' => $this->category
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Category') ])]);
    }
}
