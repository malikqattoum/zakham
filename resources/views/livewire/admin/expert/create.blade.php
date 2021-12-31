<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Expert') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.expert.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Expert')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            
            <!-- Name Input -->
            <div class='form-group'>
                <label for='inputname' class='col-sm-2 control-label'> {{ __('Name') }}</label>
                <input type='text' wire:model.lazy='name' class="form-control @error('name') is-invalid @enderror" id='inputname'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Specialty Input -->
            <div class='form-group'>
                <label for='inputspecialty' class='col-sm-2 control-label'> {{ __('Specialty') }}</label>
                <input type='text' wire:model.lazy='specialty' class="form-control @error('specialty') is-invalid @enderror" id='inputspecialty'>
                @error('specialty') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Facebook Input -->
            <div class='form-group'>
                <label for='inputfacebook' class='col-sm-2 control-label'> {{ __('Facebook') }}</label>
                <input type='text' wire:model.lazy='facebook' class="form-control @error('facebook') is-invalid @enderror" id='inputfacebook'>
                @error('facebook') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Twitter Input -->
            <div class='form-group'>
                <label for='inputtwitter' class='col-sm-2 control-label'> {{ __('Twitter') }}</label>
                <input type='text' wire:model.lazy='twitter' class="form-control @error('twitter') is-invalid @enderror" id='inputtwitter'>
                @error('twitter') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Instagram Input -->
            <div class='form-group'>
                <label for='inputinstagram' class='col-sm-2 control-label'> {{ __('Instagram') }}</label>
                <input type='text' wire:model.lazy='instagram' class="form-control @error('instagram') is-invalid @enderror" id='inputinstagram'>
                @error('instagram') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Youtube Input -->
            <div class='form-group'>
                <label for='inputyoutube' class='col-sm-2 control-label'> {{ __('Youtube') }}</label>
                <input type='text' wire:model.lazy='youtube' class="form-control @error('youtube') is-invalid @enderror" id='inputyoutube'>
                @error('youtube') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Website Input -->
            <div class='form-group'>
                <label for='inputwebsite' class='col-sm-2 control-label'> {{ __('Website') }}</label>
                <input type='text' wire:model.lazy='website' class="form-control @error('website') is-invalid @enderror" id='inputwebsite'>
                @error('website') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Linkedin Input -->
            <div class='form-group'>
                <label for='inputlinkedin' class='col-sm-2 control-label'> {{ __('Linkedin') }}</label>
                <input type='text' wire:model.lazy='linkedin' class="form-control @error('linkedin') is-invalid @enderror" id='inputlinkedin'>
                @error('linkedin') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Image Input -->
            <div class='form-group'>
                <label for='inputimage' class='col-sm-2 control-label'> {{ __('Image') }}</label>
                <input type='file' wire:model='image' class="form-control-file @error('image') is-invalid @enderror" id='inputimage'>
                @if($image and !$errors->has('image') and $image instanceof \Livewire\TemporaryUploadedFile and (in_array( $image->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                    <a href="{{ $image->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow" src="{{ $image->temporaryUrl() }}" alt=""></a>
                @endif
                @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.expert.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
