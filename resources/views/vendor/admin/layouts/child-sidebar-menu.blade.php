<li class="list-divider"></li>
<li class="nav-small-cap"><span class="hide-menu">{{ __('Menu') }}</span></li>
<?php $homePageSections = ['Volunteerfield', 'Initiative', 'Achievement', 'Expert', 'Carousel']; ?>
@foreach(\EasyPanel\Models\CRUD::active() as $crud)
    @if (!in_array($crud->name, $homePageSections))    
        <li class='sidebar-item @isActive([getRouteName().".{$crud->route}.read", getRouteName().".{$crud->route}.create", getRouteName().".{$crud->route}.update"], "selected")'>
            <a class='sidebar-link has-arrow' href="javascript:void(0)" aria-expanded="false">
                <i data-feather="{{ get_icon($crud->name) }}" class="feather-icon"></i>
                <span class="hide-menu">{{ __(\Illuminate\Support\Str::plural(ucfirst($crud->name))) }}</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level base-level-line">
                <li class="sidebar-item @isActive(getRouteName().'.'.$crud->route.'.read')">
                    <a href="@route(getRouteName().'.'.$crud->route.'.read')" class="sidebar-link @isActive(getRouteName().'.'.$crud->route.'.read')">
                        <span class="hide-menu"> {{ __('List') }} </span>
                    </a>
                </li>
                @if(getCrudConfig($crud->name)->create && $crud->name != "Country")
                    <li class="sidebar-item @isActive(getRouteName().'.'.$crud->route.'.create')">
                        <a href="@route(getRouteName().'.'.$crud->route.'.create')" class="sidebar-link @isActive(getRouteName().'.'.$crud->route.'.create')">
                            <span class="hide-menu"> {{ __('Create') }} </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endforeach

@if(config('easy_panel.todo'))
    <li class="sidebar-item @isActive([getRouteName().'.todo.lists', getRouteName().'.todo.create'], 'selected')">
        <a class="sidebar-link @isActive([getRouteName().'.todo.lists', getRouteName().'.todo.create'], 'active') " href="@route(getRouteName().'.todo.lists')" aria-expanded="false">
            <i data-feather="grid" class="feather-icon"></i>
            <span class="hide-menu">{{ __('Todo') }}</span>
        </a>
    </li>
@endif

<li class='sidebar-item'>
    <a class='sidebar-link has-arrow' href="javascript:void(0)" aria-expanded="false">
        <i data-feather="grid" class="feather-icon"></i>
        <span class="hide-menu">Home page sections</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level base-level-line">
        @foreach(\EasyPanel\Models\CRUD::active() as $crud)
            @if (in_array($crud->name, $homePageSections))
                <li class='sidebar-item @isActive([getRouteName().".{$crud->route}.read", getRouteName().".{$crud->route}.create", getRouteName().".{$crud->route}.update"], "selected")'>
                    <a class='sidebar-link has-arrow' href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="{{ get_icon($crud->name) }}" class="feather-icon"></i>
                        <span class="hide-menu">{{ __(\Illuminate\Support\Str::plural(ucfirst($crud->name))) }}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item @isActive(getRouteName().'.'.$crud->route.'.read')">
                            <a href="@route(getRouteName().'.'.$crud->route.'.read')" class="sidebar-link @isActive(getRouteName().'.'.$crud->route.'.read')">
                                <span class="hide-menu"> {{ __('List') }} </span>
                            </a>
                        </li>
                        @if(getCrudConfig($crud->name)->create)
                            <li class="sidebar-item @isActive(getRouteName().'.'.$crud->route.'.create')">
                                <a href="@route(getRouteName().'.'.$crud->route.'.create')" class="sidebar-link @isActive(getRouteName().'.'.$crud->route.'.create')">
                                    <span class="hide-menu"> {{ __('Create') }} </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</li>

{{-- <li class="sidebar-item @isActive([getRouteName().'.todo.lists', getRouteName().'.todo.create'], 'selected')">
    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
        <i data-feather="home" class="feather-icon"></i>
        <span class="hide-menu">{{ __('Home Page') }}</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level base-level-line">
        <li class="sidebar-item">
            <a href="" class="sidebar-link">
                <span class="hide-menu"> {{ __('Carousel') }} </span>
            </a>
        </li>
    </ul>
</li> --}}
