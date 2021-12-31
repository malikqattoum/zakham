<tr x-data="{ modalIsOpen : false }">
    <td> {{ $volunteerfield->title }} </td>
    <td><a target="_blank" href="{{ asset('storage/'.$volunteerfield->image) }}"><img class="rounded-circle img-fluid" width="50" height="50" src="{{ asset('storage/'.$volunteerfield->image) }}" alt="image"></a></td>    
    @if(getCrudConfig('volunteerfield')->delete or getCrudConfig('volunteerfield')->update)
        <td>

            @if(getCrudConfig('volunteerfield')->update)
                <a href="@route(getRouteName().'.volunteerfield.update', ['volunteerfield' => $volunteerfield->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('volunteerfield')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Volunteerfield') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Volunteerfield') ]) }}</p>
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
