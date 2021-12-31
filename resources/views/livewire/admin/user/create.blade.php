<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('User') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.user.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('User')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            
            <!-- First_name Input -->
            <div class='form-group'>
                <label for='inputfirst_name' class='col-sm-2 control-label'> {{ __('First name') }}</label>
                <input type='text' wire:model.lazy='first_name' class="form-control @error('first_name') is-invalid @enderror" id='inputfirst_name'>
                @error('first_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Last_name Input -->
            <div class='form-group'>
                <label for='inputlast_name' class='col-sm-2 control-label'> {{ __('Last name') }}</label>
                <input type='text' wire:model.lazy='last_name' class="form-control @error('last_name') is-invalid @enderror" id='inputlast_name'>
                @error('last_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Email Input -->
            <div class='form-group'>
                <label for='inputemail' class='col-sm-2 control-label'> {{ __('Email') }}</label>
                <input type='email' wire:model.lazy='email' class="form-control @error('email') is-invalid @enderror" id='inputemail'>
                @error('email') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Password Input -->
            <div class='form-group'>
                <label for='inputpassword' class='col-sm-2 control-label'> {{ __('Password') }}</label>
                <input type='password' wire:model.lazy='password' class="form-control @error('password') is-invalid @enderror" id='inputpassword'>
                @error('password') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Res_country Input -->
            <div class='form-group'>
                <label for='inputres_country' class='col-sm-2 control-label'> {{ __('Residence country') }}</label>
                <select wire:model='res_country' class="form-control @error('res_country') is-invalid @enderror" id='inputres_country'>
                @foreach(getCrudConfig('user')->inputs()['res_country']['select'] as $key => $value)
                    <option value='{{ $key }}'>{{ $value }}</option>
                @endforeach
            </select>
                @error('res_country') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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
            <a href="@route(getRouteName().'.user.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
