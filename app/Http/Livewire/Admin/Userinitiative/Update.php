<?php

namespace App\Http\Livewire\Admin\Userinitiative;

use App\Models\UserInitiative;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $userinitiative;

    public $user_id;
    public $desc;
    public $name;
    public $video;
    public $value;
    public $benefit;
    public $reason;
    public $qualy;
    public $sustain;
    public $advantage;
    public $number;
    public $exp;
    public $skill;
    public $period;
    public $hours_freq;
    public $hours;
    public $notes;
    public $terms;
    public $approved;
    
    protected $rules = [
        'desc' => 'required|max:100',
        'name' => 'required',        'value' => 'required',        'benefit' => 'required',        'reason' => 'required',        'qualy' => 'required',        'sustain' => 'required',        'advantage' => 'required',        'number' => 'required',        'exp' => 'required',        'skill' => 'required',        'period' => 'required',        'hours_freq' => 'required',        'hours' => 'required',        'terms' => 'required',        'video' => 'file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:100040',
        'user_id' => 'required',        
    ];

    public function mount(Userinitiative $userinitiative){
        $this->userinitiative = $userinitiative;
        $this->user_id = $this->userinitiative->user_id;
        $this->desc = $this->userinitiative->desc;
        $this->name = $this->userinitiative->name;
        $this->video = $this->userinitiative->video;
        $this->value = $this->userinitiative->value;
        $this->benefit = $this->userinitiative->benefit;
        $this->reason = $this->userinitiative->reason;
        $this->qualy = $this->userinitiative->qualy;
        $this->sustain = $this->userinitiative->sustain;
        $this->advantage = $this->userinitiative->advantage;
        $this->number = $this->userinitiative->number;
        $this->exp = $this->userinitiative->exp;
        $this->skill = $this->userinitiative->skill;
        $this->period = $this->userinitiative->period;
        $this->hours_freq = $this->userinitiative->hours_freq;
        $this->hours = $this->userinitiative->hours;
        $this->notes = $this->userinitiative->notes;
        $this->terms = $this->userinitiative->terms;
        $this->approved = $this->userinitiative->approved;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Userinitiative') ]) ]);
        
        if($this->getPropertyValue('video') and is_object($this->video)) {
            $this->video = $this->getPropertyValue('video')->store('videos');
        }

        $this->userinitiative->update([
            'user_id' => $this->user_id,
            'desc' => $this->desc,
            'name' => $this->name,
            'video' => $this->video,
            'value' => $this->value,
            'benefit' => $this->benefit,
            'reason' => $this->reason,
            'qualy' => $this->qualy,
            'sustain' => $this->sustain,
            'advantage' => $this->advantage,
            'number' => $this->number,
            'exp' => $this->exp,
            'skill' => $this->skill,
            'period' => $this->period,
            'hours_freq' => $this->hours_freq,
            'hours' => $this->hours,
            'notes' => $this->notes,
            'terms' => $this->terms,
            'approved' => $this->approved,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.userinitiative.update', [
            'userinitiative' => $this->userinitiative
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Userinitiative') ])]);
    }
}
