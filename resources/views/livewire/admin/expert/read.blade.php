<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Expert')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Expert')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('expert')->create)
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.expert.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Expert') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('expert')->searchable())
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
                        <td style='cursor: pointer' wire:click="sort('specialty')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'specialty') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'specialty') fa-sort-amount-up ml-2 @endif'></i> {{ __('Specialty') }} </td>
                        <td style='cursor: pointer' wire:click="sort('facebook')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'facebook') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'facebook') fa-sort-amount-up ml-2 @endif'></i> {{ __('Facebook') }} </td>
                        <td style='cursor: pointer' wire:click="sort('twitter')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'twitter') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'twitter') fa-sort-amount-up ml-2 @endif'></i> {{ __('Twitter') }} </td>
                        <td style='cursor: pointer' wire:click="sort('instagram')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'instagram') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'instagram') fa-sort-amount-up ml-2 @endif'></i> {{ __('Instagram') }} </td>
                        <td style='cursor: pointer' wire:click="sort('youtube')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'youtube') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'youtube') fa-sort-amount-up ml-2 @endif'></i> {{ __('Youtube') }} </td>
                        <td style='cursor: pointer' wire:click="sort('website')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'website') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'website') fa-sort-amount-up ml-2 @endif'></i> {{ __('Website') }} </td>
                        <td style='cursor: pointer' wire:click="sort('linkedin')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'linkedin') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'linkedin') fa-sort-amount-up ml-2 @endif'></i> {{ __('Linkedin') }} </td>
                        <td style='cursor: pointer' wire:click="sort('image')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'image') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'image') fa-sort-amount-up ml-2 @endif'></i> {{ __('Image') }} </td>
                        
                        @if(getCrudConfig('expert')->delete or getCrudConfig('expert')->update)
                            <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($experts as $expert)
                        @livewire('admin.expert.single', ['expert' => $expert], key($expert->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $experts->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
