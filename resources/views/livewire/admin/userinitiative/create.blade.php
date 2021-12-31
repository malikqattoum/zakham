<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Userinitiative') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.userinitiative.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Userinitiative')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            
            <!-- User_id Input -->
            <div class='form-group'>
                <label for='inputuser_id' class='col-sm-2 control-label'> {{ __('User_id') }}</label>
                <select wire:model='user_id' class="form-control @error('user_id') is-invalid @enderror" id='inputuser_id'>
                @foreach(getCrudConfig('userinitiative')->inputs()['user_id']['select'] as $key => $value)
                    <option value='{{ $key }}'>{{ $value }}</option>
                @endforeach
            </select>
                @error('user_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Desc Input -->
            <div class='form-group'>
                <label for='inputdesc' class='col-sm-2 control-label'> {{ __('Desc') }}</label>
                <input type='text' wire:model.lazy='desc' class="form-control @error('desc') is-invalid @enderror" id='inputdesc'>
                @error('desc') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Name Input -->
            <div class='form-group'>
                <label for='inputname' class='col-sm-2 control-label'> {{ __('Name') }}</label>
                <input type='text' wire:model.lazy='name' class="form-control @error('name') is-invalid @enderror" id='inputname'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Video Input -->
            <div class='form-group'>
                <label for='inputvideo' class='col-sm-2 control-label'> {{ __('Video') }}</label>
                <input type='file' wire:model='video' class="form-control-file @error('video') is-invalid @enderror" id='inputvideo'>
                @if($video and !$errors->has('video') and $video instanceof \Livewire\TemporaryUploadedFile and (in_array( $video->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                    <a href="{{ $video->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow" src="{{ $video->temporaryUrl() }}" alt=""></a>
                @endif
                @error('video') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Value Input -->
            <div class='form-group'>
                <label for='inputvalue' class='col-sm-2 control-label'> {{ __('Value') }}</label>
                <input type='text' wire:model.lazy='value' class="form-control @error('value') is-invalid @enderror" id='inputvalue'>
                @error('value') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Benefit Input -->
            <div class='form-group'>
                <label for='inputbenefit' class='col-sm-2 control-label'> {{ __('Benefit') }}</label>
                <input type='text' wire:model.lazy='benefit' class="form-control @error('benefit') is-invalid @enderror" id='inputbenefit'>
                @error('benefit') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Reason Input -->
            <div class='form-group'>
                <label for='inputreason' class='col-sm-2 control-label'> {{ __('Reason') }}</label>
                <input type='text' wire:model.lazy='reason' class="form-control @error('reason') is-invalid @enderror" id='inputreason'>
                @error('reason') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Qualy Input -->
            <div class='form-group'>
                <label for='inputqualy' class='col-sm-2 control-label'> {{ __('Qualy') }}</label>
                <input type='text' wire:model.lazy='qualy' class="form-control @error('qualy') is-invalid @enderror" id='inputqualy'>
                @error('qualy') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Sustain Input -->
            <div class='form-group'>
                <label for='inputsustain' class='col-sm-2 control-label'> {{ __('Sustain') }}</label>
                <input type='text' wire:model.lazy='sustain' class="form-control @error('sustain') is-invalid @enderror" id='inputsustain'>
                @error('sustain') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Advantage Input -->
            <div class='form-group'>
                <label for='inputadvantage' class='col-sm-2 control-label'> {{ __('Advantage') }}</label>
                <input type='text' wire:model.lazy='advantage' class="form-control @error('advantage') is-invalid @enderror" id='inputadvantage'>
                @error('advantage') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Number Input -->
            <div class='form-group'>
                <label for='inputnumber' class='col-sm-2 control-label'> {{ __('Number') }}</label>
                <input type='text' wire:model.lazy='number' class="form-control @error('number') is-invalid @enderror" id='inputnumber'>
                @error('number') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Exp Input -->
            <div class='form-group'>
                <label for='inputexp' class='col-sm-2 control-label'> {{ __('Exp') }}</label>
                <input type='text' wire:model.lazy='exp' class="form-control @error('exp') is-invalid @enderror" id='inputexp'>
                @error('exp') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Skill Input -->
            <div class='form-group'>
                <label for='inputskill' class='col-sm-2 control-label'> {{ __('Skill') }}</label>
                <input type='text' wire:model.lazy='skill' class="form-control @error('skill') is-invalid @enderror" id='inputskill'>
                @error('skill') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Period Input -->
            <div class='form-group'>
                <label for='inputperiod' class='col-sm-2 control-label'> {{ __('Period') }}</label>
                <select wire:model='period' class="form-control @error('period') is-invalid @enderror" id='inputperiod'>
                @foreach(getCrudConfig('userinitiative')->inputs()['period']['select'] as $key => $value)
                    <option value='{{ $key }}'>{{ $value }}</option>
                @endforeach
            </select>
                @error('period') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Hours_freq Input -->
            <div class='form-group'>
                <label for='inputhours_freq' class='col-sm-2 control-label'> {{ __('Hours_freq') }}</label>
                <select wire:model='hours_freq' class="form-control @error('hours_freq') is-invalid @enderror" id='inputhours_freq'>
                @foreach(getCrudConfig('userinitiative')->inputs()['hours_freq']['select'] as $key => $value)
                    <option value='{{ $key }}'>{{ $value }}</option>
                @endforeach
            </select>
                @error('hours_freq') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Hours Input -->
            <div class='form-group'>
                <label for='inputhours' class='col-sm-2 control-label'> {{ __('Hours') }}</label>
                <input type='number' wire:model.lazy='hours' class="form-control @error('hours') is-invalid @enderror" id='inputhours'>
                @error('hours') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Notes Input -->
            <div class='form-group'>
                <label for='inputnotes' class='col-sm-2 control-label'> {{ __('Notes') }}</label>
                <input type='text' wire:model.lazy='notes' class="form-control @error('notes') is-invalid @enderror" id='inputnotes'>
                @error('notes') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Terms Input -->
            <div class='form-group'>
                <label for='inputterms' class='col-sm-2 control-label'> {{ __('Terms') }}</label>
                <input type='text' wire:model.lazy='terms' class="form-control @error('terms') is-invalid @enderror" id='inputterms'>
                @error('terms') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Approved Input -->
            <div class='form-group'>
                <div class='form-check mt-4 mb-3'>
                    <input wire:model.lazy='approved' class='form-check-input' type='checkbox' id='inputapproved'>
                    <label class='form-check-label' for='inputapproved'>{{ __('Approved') }}</label>
                </div>
                @error('approved') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.userinitiative.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
