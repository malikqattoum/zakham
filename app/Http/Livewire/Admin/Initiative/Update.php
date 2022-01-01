<?php

namespace App\Http\Livewire\Admin\Initiative;

use App\Models\Initiative;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $initiative;

    public $title;
    public $count;
    
    protected $rules = [
        'title' => 'required|min:3',
        'count' => 'required',        
    ];

    public function mount(Initiative $initiative){
        $this->initiative = $initiative;
        $this->title = $this->initiative->title;
        $this->count = $this->initiative->count;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Initiative') ]) ]);
        
        $this->initiative->update([
            'title' => $this->title,
            'count' => $this->count,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.initiative.update', [
            'initiative' => $this->initiative
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Initiative') ])]);
    }
}
