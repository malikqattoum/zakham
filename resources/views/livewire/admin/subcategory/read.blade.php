<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Subcategory')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Subcategory')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('subcategory')->create)
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.subcategory.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Subcategory') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('subcategory')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td style='cursor: pointer' wire:click="sort('name')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'name') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'name') fa-sort-amount-up ml-2 @endif'></i> {{ __('Name') }} </td>
                        <td style='cursor: pointer' wire:click="sort('ar_name')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ar_name') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ar_name') fa-sort-amount-up ml-2 @endif'></i> {{ __('Arabic Name') }} </td>
                        <td style='cursor: pointer' wire:click="sort('cat_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'cat_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'cat_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Main Category') }} </td>
                        
                        @if(getCrudConfig('subcategory')->delete or getCrudConfig('subcategory')->update)
                            <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($subcategorys as $subcategory)
                        <?php $subcategory->cat_id = $categories[$subcategory->cat_id]??$subcategory->cat_id ?>
                        @livewire('admin.subcategory.single', ['subcategory' => $subcategory], key($subcategory->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $subcategorys->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
