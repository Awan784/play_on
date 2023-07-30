<div class="left-menu">
    <div class="menubar-content">
        <nav class="animated inOut">
            <ul id="sidebar">
                <li class="{{ str_contains(url()->current(), 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <span class="font-hide">Dashboard</span>
                    </a>
                </li>
                @can('allow', ['admin'])
                    <li class="{{ str_contains(url()->current(), 'role') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fas fa-home"></i>
                            <span class="font-hide">Role</span>
                        </a>
                    </li>
                    <li class="{{ str_contains(url()->current(), 'permissions') ? 'active' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fas fa-home"></i>
                            <span class="font-hide">Permission</span>
                        </a>
                    </li>
                    <li class="{{ str_contains(url()->current(), 'user') ? 'active' : '' }}">
                        <a href="{{ route('admin.user.index') }}">
                            <i class="fas fa-home"></i>
                            <span class="font-hide">user</span>
                        </a>
                    </li>
                    <li class="{{ str_contains(url()->current(), 'manager') ? 'active' : '' }}">
                        <a href="{{ route('admin.manager.index') }}">
                            <i class="fas fa-home"></i>
                            <span class="font-hide">Manager</span>
                        </a>
                    </li>
                @endcan
                <li class="{{ str_contains(url()->current(), 'venue') ? 'active' : '' }}">
                    <a href="{{ route('admin.venue.index') }}">
                        <i class="fas fa-home"></i>
                        <span class="font-hide">Venue</span>
                    </a>
                </li>
                <li class="{{ str_contains(url()->current(), 'order') ? 'active' : '' }}">
                    <a href="{{ route('admin.order.index') }}">
                        <i class="fas fa-home"></i>
                        <span class="font-hide">order</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</div>
