<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                @if (getSettings()['logo'])
                    <img src="{{ URL::asset('storage/images/settings/' . getSettings()['logo']) }}" alt=""
                        height="17">
                @else
                    <img src="{{ URL::asset('storage/images/settings/default-logo.png') }}" alt=""
                        height="17">
                @endif
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @can('sidebar-dashboard')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards"
                                class="text-uppercase">{{ trans('translation.navigation_navigation_dashboard') }}</span>
                        </a>
                    </li> <!-- end Dashboard Menu -->
                @endcan
                @can('sidebar-manage-users')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line text-uppercase"></i> <span data-key="t-apps"
                            class="text-uppercase">{{ trans('translation.navigation_navigation_manage_users') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @can('user-list')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link" data-key="users">
                                        <span
                                            class="text-uppercase">{{ trans('translation.navigation_navigation_users_list') }}</span>
                                        <span class="badge badge-pill bg-danger"
                                            data-key="users">
                                            {{-- {{ getSidebar()['users'] }} --}}
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                            class="text-uppercase">{{ trans('translation.navigation_navigation_roles_list') }}
                                        </span>
                                        <span class="badge badge-pill bg-danger"
                                            data-key="users">1</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan


                @can('sidebar-settings')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#other_settings" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAuth">
                            <i class="ri-settings-2-line"></i> <span data-key="t-authentication"
                                class="text-uppercase">{{ trans('translation.navigation_navigation_settings') }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="other_settings">
                            <ul class="nav nav-sm flex-column">


                                @can('sidebar-languages')
                                    @can('systemlanguage-list')
                                        <li class="nav-item">
                                            <span class="text-uppercase">
                                                <a href=" {{ route('systemLanguages.index') }}" class="nav-link"
                                                    data-key="t-starter">
                                                    {{ trans('translation.navigation_navigation_manage_language') }}
                                                    <span class="badge badge-pill bg-danger"
                                                        data-key="countries">1</span>
                                                </a>
                                            </span>
                                        </li>
                                    @endcan
                                    <li class="nav-item">
                                        <a href="{{ route('settings.edit', 'update-system-settings') }}"
                                            class="nav-link">{{ trans('translation.navigation_navigation_settings') }}</a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
