<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">

        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">

            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Master') }}</li>
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>{{ __('Dashboard') }}</span></a></li>

            <li class="menu-header">{{ __('Management Data') }}</li>
            <li class="{{ Request::routeIs('logger.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('logger.index') }}"><i class="fas fa-plug"></i> <span>{{ __('Logger') }}</span></a></li>
        </ul>
    </aside>
</div>