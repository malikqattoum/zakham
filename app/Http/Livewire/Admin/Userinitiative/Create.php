<?php

namespace App\Http\Livewire\Admin\Userinitiative;

use App\Models\UserInitiative;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Userinitiative') ])]);
        
        if($this->getPropertyValue('video') and is_object($this->video)) {
            $this->video = $this->getPropertyValue('video')->store('videos');
        }

        Userinitiative::create([
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

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.userinitiative.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Userinitiative') ])]);
    }
}
