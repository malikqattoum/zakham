<tr x-data="{ modalIsOpen : false }">
    <td> {{ $expert->name }} </td>
    <td> {{ $expert->specialty }} </td>
    <td> {{ $expert->facebook }} </td>
    <td> {{ $expert->twitter }} </td>
    <td> {{ $expert->instagram }} </td>
    <td> {{ $expert->youtube }} </td>
    <td> {{ $expert->website }} </td>
    <td> {{ $expert->linkedin }} </td>
    <td><a target="_blank" href="{{ asset('storage/'.$expert->image) }}"><img class="rounded-circle img-fluid" width="50" height="50" src="{{ asset('storage/'.$expert->image) }}" alt="image"></a></td>    
    @if(getCrudConfig('expert')->delete or getCrudConfig('expert')->update)
        <td>

            @if(getCrudConfig('expert')->update)
                <a href="@route(getRouteName().'.expert.update', ['expert' => $expert->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('expert')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Expert') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Expert') ]) }}</p>
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
