<div class="header-container fixed-top shadow">
    <header class="header navbar navbar-expand-sm expand-header">
        <div class="header-left d-flex">
            <a href="#" class="sidebarCollapse">
                <i class="fas fa-bars text-muted"></i>
            </a>
            <div class="logo">
                Play ON
            </div>
        </div>
        <ul class="navbar-item flex-row ml-auto">
            <!-- ==========Notification=========== -->
            {{-- @dd(auth()->user()) --}}
            <!-- =========Profile=========== -->
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="#" class="nav-link user" id="notify" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/admin/img/profile.png') }}" alt="Pic" class="icon">
                </a>
                <div class="dropdown-menu">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="{{ auth()->user()->image == null ? asset('assets/admin/img/profile.png') : asset(auth()->user()->image) }}"
                                class="img-fluid">
                            <div class="media-body">
                                <h5>{{ auth()->user()->name }}</h5>
                                <p>{{ auth()->user()->role->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dp-main-menu">
                        <a href="{{ route('admin.profile.index') }}" class="dropdown-item"><span
                                class="fas fa-user spa"></span>Profile</a>
                        <a href="#" class="dropdown-item"><span class="fas fa-inbox spa"></span>Inbox</a>
                        <a href="#" onclick="$('#logout').submit()" class="dropdown-item"><span
                                class="fas fa-sign-out-alt spa"></span>Logout</a>
                        <form action="{{ route('admin.logout') }}" method="POST" id="logout">@csrf</form>
                    </div>
                </div>
            </li>
            <!-- =========Profile End=========== -->
            <!-- =========Settings=========== -->
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="#" class="nav-link user" id="notify" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/admin/img/setting.png') }}" alt="Pic" class="icon">
                </a>
                <div class="dropdown-menu">
                    <div class="dp-main-menu">
                        <a href="#" class="dropdown-item"><span class="fas fa-users spa"></span>Admins</a>
                        <a href="#" class="dropdown-item"><span class="fas fa-object-ungroup spa"></span>Design
                            Type</a>
                        <a href="#" class="dropdown-item"><span class="fas fa-palette spa"></span>Color</a>
                    </div>
                </div>
            </li>
            <!-- =========Settings End=========== -->
        </ul>
    </header>
</div>
