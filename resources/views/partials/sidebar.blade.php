<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg>
                {{ __('Dashboard') }}
            </a>
        </li>

        @if (auth()->user()->is_admin)
        <li class="c-sidebar-nav-title">{{ __('Admin') }}</li>
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.pages.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> {{ __('Pages') }}
            </a>
        </li>
        <li class="c-sidebar-nav-title">{{ __('Manage Checklists') }}</li>

        @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)

        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.edit',$group->id) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> {{ $group->name }}
            </a>
        </li>

        <ul class="c-sidebar-nav-dropdown-items">
            @foreach ($group->checklists as $checklist)
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.edit',$checklist->id) }}">
                    {{ $checklist->name }}
                </a>
            </li>
            @endforeach
        </ul>
        @endforeach

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link"
                href="{{ route('admin.checklist_groups.create') }}">{{ __('New Checklist Group') }}</a>
        </li>

        @endif
        {{-- <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
        </svg> Pages
        </a>

        </li> --}}
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-unfoldable"></button>
</div>