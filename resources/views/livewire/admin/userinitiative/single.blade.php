<tr x-data="{ modalIsOpen : false }">
    <td> {{ $userinitiative->desc }} </td>
    <td> {{ $userinitiative->name }} </td>
    <td> {{ $userinitiative->value }} </td>
    <td> {{ $userinitiative->benefit }} </td>
    <td> {{ $userinitiative->reason }} </td>
    <td> {{ $userinitiative->qualy }} </td>
    <td> {{ $userinitiative->sustain }} </td>
    <td> {{ $userinitiative->advantage }} </td>
    <td> {{ $userinitiative->number }} </td>
    <td> {{ $userinitiative->exp }} </td>
    <td> {{ $userinitiative->skill }} </td>
    <td> {{ $userinitiative->period }} </td>
    <td> {{ $userinitiative->period_to }} </td>
    <td> {{ $userinitiative->period_from }} </td>
    <td> {{ $userinitiative->hours_freq }} </td>
    <td> {{ $userinitiative->hours }} </td>
    <td> {{ $userinitiative->notes }} </td>
    <td> {{ $userinitiative->terms }} </td>
    <td> {{ $userinitiative->approved }} </td>    
    @if(getCrudConfig('userinitiative')->delete or getCrudConfig('userinitiative')->update)
        <td>

            @if(getCrudConfig('userinitiative')->update)
                <a href="@route(getRouteName().'.userinitiative.update', ['userinitiative' => $userinitiative->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('userinitiative')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Userinitiative') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Userinitiative') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
