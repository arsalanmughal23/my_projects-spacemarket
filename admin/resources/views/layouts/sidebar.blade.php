<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/admin') }}" class="brand-link">
        <img src="{{ asset(config('app.logo_icon')) }}" alt="{{ config('app.name') }} Logo"
            class="brand-image">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @role(\App\Models\Roles::ROLE_SUPER_ADMIN)
                    <li class="nav-item">
                        <a href="{{ route('io_generator_builder') }}"
                            class="nav-link {{ Request::is('generator_builder*') ? 'active' : '' }}">
                            <i class="fa fa-building"></i> <span>Generator Builder</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                            <i class="fa fa-users"></i> <span>Users</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                            <i class="fa fa-tasks"></i> <span>Roles</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}"
                            class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                            <i class="fa fa-lock"></i> <span>Permissions</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('menus.index') }}" class="nav-link {{ Request::is('menus*') ? 'active' : '' }}">
                            <i class="fa fa-list"></i> <span>Menus</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('cms.index') }}"
                        class="nav-link {{ Request::is('cms*') ? 'active' : '' }}">
                            <i class="fa fa-file-o"></i>
                            <p>Cms</p>
                        </a>
                    </li>
                @endrole

                @role([\App\Models\Roles::ROLE_SUPER_ADMIN, \App\Models\Roles::ROLE_ADMIN])
                    @include('layouts.menu')
                @endrole

                @forelse (getMenus() as $menu)
                    @canany([$menu->slug . '.index', $menu->slug . '.create', $menu->slug . '.show', $menu->slug .
                        '.edit', $menu->slug . '.destroy'])
                        <li class="nav-item">
                            <a href="{{ route($menu->slug . '.index') }}"
                                class="nav-link {{ Request::is($menu->slug . '*') ? 'active' : '' }}">
                                <i class="fa fa-{{ $menu->icon }}"></i> <span>{{ $menu->name }}</span>
                            </a>
                        </li>
                    @endcan
                @empty
                @endforelse
            </ul>
        </nav>
    </div>
</aside>
