<tr x-data="{ modalIsOpen : false }">
    <td> {{ $country->name }} </td>
    <td> {{ $country->name_ar }} </td>
    <td> {{ $country->code }} </td>    
    @if(getCrudConfig('country')->delete or getCrudConfig('country')->update)
        <td>

            @if(getCrudConfig('country')->update)
                <a href="@route(getRouteName().'.country.update', ['Country' => $country->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('country')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Country') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Country') ]) }}</p>
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
