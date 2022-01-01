<tr x-data="{ modalIsOpen : false }">
    <td> {{ $achievement->title }} </td>
    <td> {{ $achievement->count }} </td>
    <td> <a target="_blank" href="{{ asset('storage/'.$achievement->icon) }}"><img class="rounded-circle img-fluid" width="50" height="50" src="{{ asset('storage/'.$achievement->icon) }}" alt="image"></a> </td>    
    @if(getCrudConfig('achievement')->delete or getCrudConfig('achievement')->update)
        <td>

            @if(getCrudConfig('achievement')->update)
                <a href="@route(getRouteName().'.achievement.update', ['Achievement' => $achievement->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('achievement')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Achievement') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Achievement') ]) }}</p>
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
