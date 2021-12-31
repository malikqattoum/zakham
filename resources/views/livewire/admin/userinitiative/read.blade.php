<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Userinitiative')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Userinitiative')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('userinitiative')->create)
                        <div class="col-md-6 right-0">
                            <a href="@route(getRouteName().'.userinitiative.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Userinitiative') ]) }}</a>
                            <a href="{{route('file-export-xlsx-userinitiative')}}" target="_blank" class="btn btn-success ml-2">Export Xlsx</a>
                            <a href="{{route('file-export-csv-userinitiative')}}" target="_blank" class="btn btn-success ml-2">Export Csv</a>
                        </div>
                        @endif
                        @if(getCrudConfig('userinitiative')->searchable())
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
                        <td style='cursor: pointer' wire:click="sort('desc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'desc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'desc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Desc') }} </td>
                        <td style='cursor: pointer' wire:click="sort('name')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'name') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'name') fa-sort-amount-up ml-2 @endif'></i> {{ __('Name') }} </td>
                        <td style='cursor: pointer' wire:click="sort('value')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'value') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'value') fa-sort-amount-up ml-2 @endif'></i> {{ __('Value') }} </td>
                        <td style='cursor: pointer' wire:click="sort('benefit')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'benefit') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'benefit') fa-sort-amount-up ml-2 @endif'></i> {{ __('Benefit') }} </td>
                        <td style='cursor: pointer' wire:click="sort('reason')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'reason') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'reason') fa-sort-amount-up ml-2 @endif'></i> {{ __('Reason') }} </td>
                        <td style='cursor: pointer' wire:click="sort('qualy')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'qualy') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'qualy') fa-sort-amount-up ml-2 @endif'></i> {{ __('Qualy') }} </td>
                        <td style='cursor: pointer' wire:click="sort('sustain')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'sustain') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'sustain') fa-sort-amount-up ml-2 @endif'></i> {{ __('Sustain') }} </td>
                        <td style='cursor: pointer' wire:click="sort('advantage')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'advantage') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'advantage') fa-sort-amount-up ml-2 @endif'></i> {{ __('Advantage') }} </td>
                        <td style='cursor: pointer' wire:click="sort('number')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'number') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'number') fa-sort-amount-up ml-2 @endif'></i> {{ __('Number') }} </td>
                        <td style='cursor: pointer' wire:click="sort('exp')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'exp') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'exp') fa-sort-amount-up ml-2 @endif'></i> {{ __('Exp') }} </td>
                        <td style='cursor: pointer' wire:click="sort('skill')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'skill') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'skill') fa-sort-amount-up ml-2 @endif'></i> {{ __('Skill') }} </td>
                        <td style='cursor: pointer' wire:click="sort('period')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'period') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'period') fa-sort-amount-up ml-2 @endif'></i> {{ __('Period') }} </td>
                        <td style='cursor: pointer' wire:click="sort('period_to')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'period_to') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'period_to') fa-sort-amount-up ml-2 @endif'></i> {{ __('Period_to') }} </td>
                        <td style='cursor: pointer' wire:click="sort('period_from')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'period_from') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'period_from') fa-sort-amount-up ml-2 @endif'></i> {{ __('Period_from') }} </td>
                        <td style='cursor: pointer' wire:click="sort('hours_freq')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'hours_freq') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'hours_freq') fa-sort-amount-up ml-2 @endif'></i> {{ __('Hours_freq') }} </td>
                        <td style='cursor: pointer' wire:click="sort('hours')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'hours') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'hours') fa-sort-amount-up ml-2 @endif'></i> {{ __('Hours') }} </td>
                        <td style='cursor: pointer' wire:click="sort('notes')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'notes') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'notes') fa-sort-amount-up ml-2 @endif'></i> {{ __('Notes') }} </td>
                        <td style='cursor: pointer' wire:click="sort('terms')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'terms') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'terms') fa-sort-amount-up ml-2 @endif'></i> {{ __('Terms') }} </td>
                        <td style='cursor: pointer' wire:click="sort('approved')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'approved') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'approved') fa-sort-amount-up ml-2 @endif'></i> {{ __('Approved') }} </td>
                        
                        @if(getCrudConfig('userinitiative')->delete or getCrudConfig('userinitiative')->update)
                            <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($userinitiatives as $userinitiative)
                        @livewire('admin.userinitiative.single', ['userinitiative' => $userinitiative], key($userinitiative->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $userinitiatives->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
