<?php

namespace App\Http\Livewire\Admin\Initiative;

use App\Models\initiative;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $count;
    
    protected $rules = [
        'title' => 'required|min:3',
        'count' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Initiative') ])]);
        
        Initiative::create([
            'title' => $this->title,
            'count' => $this->count,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.initiative.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Initiative') ])]);
    }
}
