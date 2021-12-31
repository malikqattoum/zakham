<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Initiative') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.initiative.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Initiative')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

            
            <!-- Title Input -->
            <div class='form-group'>
                <label for='inputtitle' class='col-sm-2 control-label'> {{ __('Title') }}</label>
                <input type='text' wire:model.lazy='title' class="form-control @error('title') is-invalid @enderror" id='inputtitle'>
                @error('title') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Count Input -->
            <div class='form-group'>
                <label for='inputcount' class='col-sm-2 control-label'> {{ __('Count') }}</label>
                <input type='text' wire:model.lazy='count' class="form-control @error('count') is-invalid @enderror" id='inputcount'>
                @error('count') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.initiative.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
