<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $ar_name;
    public $active;
    
    protected $rules = [
        'name' => 'required|min:3|max:60',
        'ar_name' => 'max:60',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Category') ])]);
        
        Category::create([
            'name' => $this->name,
            'ar_name' => $this->ar_name,
            'active' => $this->active,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.category.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Category') ])]);
    }
}
