<?php

namespace App\Http\Livewire\Admin\Achievement;

use App\Models\achievement;
use Livewire\Component;

class Single extends Component
{

    public $achievement;

    public function mount(Achievement $achievement){
        $this->achievement = $achievement;
    }

    public function delete()
    {
        $this->achievement->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Achievement') ]) ]);
        $this->emit('achievementDeleted');
    }

    public function render()
    {
        return view('livewire.admin.achievement.single')
            ->layout('admin::layouts.app');
    }
}
