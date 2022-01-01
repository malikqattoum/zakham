<?php

namespace App\Http\Livewire\Admin\Achievement;

use App\Models\Achievement;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $count;
    public $icon;
    
    protected $rules = [
        'title' => 'required|min:3',
        'count' => 'required',        'icon' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Achievement') ])]);
        
        if($this->getPropertyValue('icon') and is_object($this->icon)) {
            $this->icon = $this->getPropertyValue('icon')->store('icon');
        }

        Achievement::create([
            'title' => $this->title,
            'count' => $this->count,
            'icon' => $this->icon,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.achievement.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Achievement') ])]);
    }
}
