<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show c-sidebar-minimized" id="sidebar">
    <ul class="c-sidebar-nav">
        @if (auth()->user()->is_admin)

        <li class="c-sidebar-nav-title">{{ __('Manage Checklists') }}</li>

        @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
            <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.edit',$group) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-calendar-check') }}"></use>
                </svg> <strong>{{ $group->name }}</strong>
                <span class="badge badge-light badge-pill">{{ $group->checklists->count() }}</span>
            </a>

            <ul class="c-sidebar-nav-dropdown-items">
                @foreach ($group->checklists as $checklist)
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link"
                        href="{{ route('admin.checklist_groups.checklists.edit',[$group,$checklist]) }}">
                        {{ $checklist->name }}
                    </a>
                </li>
                @endforeach
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.checklists.create',$group) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
                        </svg>

                        {{ __('New Checklist') }}
                    </a>
                </li>
            </ul>
        </li>
        @endforeach

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.create') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
                </svg>
                {{ __('New Checklist Group') }}
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-calendar-check') }}"></use>
                </svg>
            </a>
        </li>



        <li class="c-sidebar-nav-title">{{ __('Pages') }}</li>
        @foreach (\App\Models\Page::all() as $page)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.pages.edit',$page) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> {{ $page->title }}
            </a>
        </li>
        @endforeach

        <li class="c-sidebar-nav-title">{{ __('Manage Data') }}</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.users.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                </svg> {{ __('Users') }}
            </a>
        </li>

        @endif

    </ul>
    <button id="sidebar_button_toggler" class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>

</div>


@section('scripts')
<script>
    const sidebar = document.querySelector('#sidebar')
    const buttonToggler = document.querySelector('#sidebar_button_toggler')
    
    document.addEventListener('DOMContentLoaded', () =>{
        localStorage.getItem('checklister_sidebar') === 'on' 
            ? sidebar.classList.remove('c-sidebar-minimized') 
            : sidebar.classList.add('c-sidebar-minimized')  
    })

    buttonToggler.addEventListener('mouseup',function (e) {
        let switcher = sidebar.classList.contains('c-sidebar-minimized') ? 'on' : 'off'
        localStorage.setItem('checklister_sidebar',switcher)
    })
</script>
@endsection