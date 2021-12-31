<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Exprole') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.exprole.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Exprole')) }}</a></li>
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
            
            <!-- Ar_name Input -->
            <div class='form-group'>
                <label for='inputar_name' class='col-sm-2 control-label'> {{ __('Ar_name') }}</label>
                <input type='text' wire:model.lazy='ar_name' class="form-control @error('ar_name') is-invalid @enderror" id='inputar_name'>
                @error('ar_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.exprole.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
