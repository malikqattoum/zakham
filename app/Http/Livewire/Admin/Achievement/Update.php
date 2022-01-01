<?php

namespace App\Http\Livewire\Admin\Achievement;

use App\Models\Achievement;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $achievement;

    public $title;
    public $count;
    public $icon;
    
    protected $rules = [
        'title' => 'required|min:3',
        'count' => 'required',        'icon' => 'required',        
    ];

    public function mount(Achievement $achievement){
        $this->achievement = $achievement;
        $this->title = $this->achievement->title;
        $this->count = $this->achievement->count;
        $this->icon = $this->achievement->icon;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Achievement') ]) ]);
        
        if($this->getPropertyValue('icon') and is_object($this->icon)) {
            $this->icon = $this->getPropertyValue('icon')->store('icon');
        }

        $this->achievement->update([
            'title' => $this->title,
            'count' => $this->count,
            'icon' => $this->icon,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.achievement.update', [
            'achievement' => $this->achievement
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Achievement') ])]);
    }
}
