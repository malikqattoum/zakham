<?php

namespace App\Http\Livewire\Admin\Volunteerarea;

use App\Models\VolunteerArea;
use Livewire\Component;

class Single extends Component
{

    public $volunteerarea;

    public function mount(VolunteerArea $volunteerarea){
        $this->volunteerarea = $volunteerarea;
    }

    public function delete()
    {
        $this->volunteerarea->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Volunteerarea') ]) ]);
        $this->emit('volunteerareaDeleted');
    }

    public function render()
    {
        return view('livewire.admin.volunteerarea.single')
            ->layout('admin::layouts.app');
    }
}
