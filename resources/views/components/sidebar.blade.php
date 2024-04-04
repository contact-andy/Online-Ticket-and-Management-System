<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        @role('admin')
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}"
                    class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Users
                        <span class="badge badge-info right">{{ $userCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.role.index') }}"
                    class="nav-link {{ Route::is('admin.role.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>Role
                        <span class="badge badge-success right">{{ $RoleCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.theatre.index') }}"
                    class="nav-link {{ Route::is('admin.theatre.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-theater-masks"></i>
                    <p>Theatre
                        <span class="badge badge-danger right">{{ $TheatreCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.show.index') }}"
                    class="nav-link {{ Route::is('admin.show.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-microphone"></i>
                    <p>Show
                        <span class="badge badge-warning right">{{ $ShowCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.events.index') }}"
                    class="nav-link {{ Route::is('admin.events.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>Events
                    <span class="badge badge-primary right">{{ $EventCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reservation.index') }}"
                    class="nav-link {{ Route::is('admin.reservation.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-check-circle"></i>
                    <p>Reservation
                        <!-- <span class="badge badge-secondary right">{{ $reservationCount }}</span> -->
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.validation.index') }}"
                    class="nav-link {{ Route::is('admin.validation.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-ticket-alt"></i>
                    <p>Validation
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.product.index') }}"
                    class="nav-link {{ Route::is('admin.product.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Payment
                    </p>
                </a>
            </li>
        @endrole
        <li class="nav-item">
                <a href="{{ route('admin.report.index') }}"
                    class="nav-link {{ Route::is('admin.report.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Report
                    </p>
                </a>
            </li>
        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}"
                class="nav-link {{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Profile</p>
            </a>
        </li>

    </ul>
</nav>
