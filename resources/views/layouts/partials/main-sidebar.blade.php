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
                        <a class="nav-link menu-link" href="#folder" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-apps-2-line text-uppercase"></i> <span data-key="t-apps"
                                class="text-uppercase">{{ trans('translation.navigation_navigation_folders') }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="folder">
                            <ul class="nav nav-sm flex-column">
                                @can('user-list')
                                    <li class="nav-item">
                                        <a href="{{ route('clients.index') }}" class="nav-link" data-key="users">
                                            <span class="text-uppercase">{{ trans('translation.navigation_navigation_clients') }}</span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">
                                                {{ getSidebar()['users'] }}
                                            </span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('suppliers.index') }}" class="nav-link" data-key="suppliers"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_suppliers') }}
                                            </span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                <li class="nav-item">
                                    <a href="{{route('garanties.index')}}" class="nav-link" data-key="suppliers"> <span
                                            class="text-uppercase">{{ trans('translation.navigation_navigation_garanties') }}
                                        </span>
                                        {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                    </a>
                                </li>
                            @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('employes.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_employes') }}
                                            </span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('sidebar-manage-users')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#achat" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-apps-2-line text-uppercase"></i> <span data-key="t-apps"
                                class="text-uppercase">Achat</span>
                        </a>
                        <div class="collapse menu-dropdown" id="achat">
                            <ul class="nav nav-sm flex-column">
                                @can('user-list')
                                    <li class="nav-item">
                                        <a href="{{ route('devis.index') }}" class="nav-link" data-key="users">
                                            <span class="text-uppercase">Demande de prix</span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">
                                                {{ getSidebar()['users'] }}
                                            </span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">Bon de récéption
                                            </span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">Bon de retour
                                            </span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('sidebar-manage-users')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#stock" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-apps-2-line text-uppercase"></i> <span data-key="t-apps"
                                class="text-uppercase">{{ trans('translation.navigation_navigation_stock') }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="stock">
                            <ul class="nav nav-sm flex-column">
                                @can('user-list')
                                    <li class="nav-item">
                                        <a href="{{ route('products.index') }}" class="nav-link" data-key="users">
                                            <span class="text-uppercase">{{ trans('translation.navigation_navigation_products') }}</span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1
                                            </span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_inventory') }}
                                            </span>
                                            <span class="badge badge-pill bg-danger" data-key="users">1</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                <li class="nav-item">
                                    <span class="text-uppercase">
                                        <a href="{{ route('categories.index') }}"
                                            class="nav-link">{{ trans('translation.navigation_navigation_categories') }}</a>
                                    </span>
                                </li>
                                @endcan
                                @can('role-list')
                                <li class="nav-item">
                                    <span class="text-uppercase">
                                        <a href="{{ route('brands.index') }}"
                                            class="nav-link">{{ trans('translation.navigation_navigation_brands') }}</a>
                                    </span>
                                </li>
                                @endcan
                                @can('role-list')
                                <li class="nav-item">
                                    <span class="text-uppercase">
                                        <a href="{{ route('warehouses.index') }}"
                                            class="nav-link">{{ trans('translation.navigation_navigation_warehouses') }}</a>
                                    </span>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('sidebar-manage-users')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#vente" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-apps-2-line text-uppercase"></i> <span data-key="t-apps"
                                class="text-uppercase">{{ trans('translation.navigation_navigation_ventes') }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="vente">
                            <ul class="nav nav-sm flex-column">
                                @can('user-list')
                                    <li class="nav-item">
                                        <a href="{{ route('devis.index') }}" class="nav-link" data-key="users">
                                            <span class="text-uppercase">{{ trans('translation.navigation_navigation_devis') }}</span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">
                                                {{ getSidebar()['users'] }}
                                            </span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('commands.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_bon_command') }}
                                            </span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_bon_livraison') }}
                                            </span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_bon_avoir') }}
                                            </span>
                                            {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                <li class="nav-item">
                                    <a href="{{ route('reglements.index') }}" class="nav-link" data-key="reglements"> <span
                                            class="text-uppercase">{{ trans('translation.navigation_navigation_reglements') }}
                                        </span>
                                        {{-- <span class="badge badge-pill bg-danger" data-key="users">1</span> --}}
                                    </a>
                                </li>
                            @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('sidebar-manage-users')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#comptability" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-apps-2-line text-uppercase"></i> <span data-key="t-apps"
                                class="text-uppercase">{{ trans('translation.navigation_navigation_comptability') }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="comptability">
                            <ul class="nav nav-sm flex-column">
                                @can('user-list')
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link" data-key="users">
                                            <span class="text-uppercase">{{ trans('translation.navigation_navigation_facture') }}</span>
                                            <span class="badge badge-pill bg-danger" data-key="users">
                                                {{-- {{ getSidebar()['users'] }} --}}
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_depense') }}
                                            </span>
                                            <span class="badge badge-pill bg-danger" data-key="users">1</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link" data-key="roles"> <span
                                                class="text-uppercase">{{ trans('translation.navigation_navigation_manage_check') }}
                                            </span>
                                            <span class="badge badge-pill bg-danger" data-key="users">1</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
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
                                            <span class="badge badge-pill bg-danger" data-key="users">
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
                                            <span class="badge badge-pill bg-danger" data-key="users">1</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#transport" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-settings-2-line"></i> <span data-key="t-authentication"
                            class="text-uppercase">{{ trans('translation.navigation_navigation_transport') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="transport">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <span class="text-uppercase">
                                    <a href="{{ route('cars.index') }}" class="nav-link" data-key="t-starter">
                                        {{ trans('translation.navigation_navigation_cars') }}
                                        {{-- <span class="badge badge-pill bg-danger" data-key="cars">1</span> --}}
                                    </a>
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="text-uppercase">
                                    <a href="{{ route('car-documents.index') }}" class="nav-link" data-key="t-starter">
                                        {{ trans('translation.navigation_navigation_car_documents') }}
                                        {{-- <span class="badge badge-pill bg-danger" data-key="cars">1</span> --}}
                                    </a>
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="text-uppercase">
                                    <a href="{{ route('drivers.index') }}"
                                        class="nav-link">{{ trans('translation.navigation_navigation_drivers') }}</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </li>
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
                                    <li class="nav-item">
                                        <span class="text-uppercase">
                                            <a href="{{ route('settings.edit', 'update-system-settings') }}"
                                                class="nav-link">{{ trans('translation.navigation_navigation_settings') }}</a>
                                        </span>
                                    </li>
                                    @can('systemlanguage-list')
                                        <li class="nav-item">
                                            <span class="text-uppercase">
                                                <a href=" {{ route('systemLanguages.index') }}" class="nav-link"
                                                    data-key="t-starter">
                                                    {{ trans('translation.navigation_navigation_manage_language') }}
                                                    <span class="badge badge-pill bg-danger" data-key="countries">1</span>
                                                </a>
                                            </span>
                                        </li>
                                    @endcan
                                    <li class="nav-item">
                                        <span class="text-uppercase">
                                            <a href="{{ route('numerotations.index') }}"
                                                class="nav-link">{{ trans('translation.navigation_navigation_numerotations') }}</a>
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <span class="text-uppercase">
                                            <a href="{{ route('exercices.index') }}"
                                                class="nav-link">{{ trans('translation.navigation_navigation_exercices') }}</a>
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <span class="text-uppercase">
                                            <a href="{{ route('payments.index') }}"
                                                class="nav-link">{{ trans('translation.navigation_navigation_mdreglement') }}</a>
                                        </span>
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
