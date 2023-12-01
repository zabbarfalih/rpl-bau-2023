<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @foreach($menu->where('on_sidebar', true) as $menu)
            @can('admin')
                @if ($menu->name === 'Administrator')
                    <li class="nav-heading">Administrator</li>
                @endif
            @endcan
            @if ($menu->name === 'Unit')
                <li class="nav-heading">Pengadaan</li>
            @elseif ($menu->name === 'SPJ')
                <li class="nav-heading">Keuangan</li>
            @endif
            @can('admin')
                @if ($menu->name === 'Administrator')
                    <li class="nav-item">
                        @if($menu->submenu->isNotEmpty())
                            <a class="nav-link {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? '' : 'collapsed' }}" data-bs-target="#{{ $menu->url }}-nav" data-bs-toggle="collapse" href="#">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="{{ $menu->url }}-nav" class="nav-content collapse {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                                @foreach($menu->submenu as $submenu)
                                    <li>
                                        <a href="/dashboard/{{ $menu->url }}/{{ $submenu->url }}" class="{{ request()->url() === url("/dashboard/{$menu->url}/{$submenu->url}") ? 'active' : '' }}">
                                            <i class="{{ $submenu->icon }}"></i>
                                            <span>{{ $submenu->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a class="nav-link {{ request()->url() === url("/dashboard/{$menu->url}") ? '' : 'collapsed' }}" href="/dashboard/{{ $menu->url }}">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                            </a>
                        @endif
                    </li>
                @endif
            @endcan
            @can('pbj')
                @if ($menu->name === 'PBJ')
                    <li class="nav-item">
                        @if($menu->submenu->isNotEmpty())
                            <a class="nav-link {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? '' : 'collapsed' }}" data-bs-target="#{{ $menu->url }}-nav" data-bs-toggle="collapse" href="#">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="{{ $menu->url }}-nav" class="nav-content collapse {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                                @foreach($menu->submenu as $submenu)
                                    <li>
                                        <a href="/dashboard/{{ $menu->url }}/{{ $submenu->url }}" class="{{ request()->url() === url("/dashboard/{$menu->url}/{$submenu->url}") ? 'active' : '' }}">
                                            <i class="{{ $submenu->icon }}"></i>
                                            <span>{{ $submenu->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a class="nav-link {{ request()->url() === url("/dashboard/{$menu->url}") ? '' : 'collapsed' }}" href="/dashboard/{{ $menu->url }}">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                            </a>
                        @endif
                    </li>
                @endif
            @endcan
            @can('ppk')
                @if ($menu->name === 'PPK')
                    <li class="nav-item">
                        @if($menu->submenu->isNotEmpty())
                            <a class="nav-link {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? '' : 'collapsed' }}" data-bs-target="#{{ $menu->url }}-nav" data-bs-toggle="collapse" href="#">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="{{ $menu->url }}-nav" class="nav-content collapse {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                                @foreach($menu->submenu as $submenu)
                                    <li>
                                        <a href="/dashboard/{{ $menu->url }}/{{ $submenu->url }}" class="{{ request()->url() === url("/dashboard/{$menu->url}/{$submenu->url}") ? 'active' : '' }}">
                                            <i class="{{ $submenu->icon }}"></i>
                                            <span>{{ $submenu->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a class="nav-link {{ request()->url() === url("/dashboard/{$menu->url}") ? '' : 'collapsed' }}" href="/dashboard/{{ $menu->url }}">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                            </a>
                        @endif
                    </li>
                @endif
            @endcan

            @if($menu->name !== 'Administrator' && $menu->name !== 'PBJ' && $menu->name !== 'PPK')
                <li class="nav-item">
                    @if($menu->submenu->isNotEmpty())
                        <a class="nav-link {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? '' : 'collapsed' }}" data-bs-target="#{{ $menu->url }}-nav" data-bs-toggle="collapse" href="#">
                            <i class="{{ $menu->icon }}"></i>
                            <span>{{ $menu->name }}</span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="{{ $menu->url }}-nav" class="nav-content collapse {{ Str::contains(request()->url(), "/dashboard/{$menu->url}") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                            @foreach($menu->submenu as $submenu)
                                <li>
                                    <a href="/dashboard/{{ $menu->url }}/{{ $submenu->url }}" class="{{ request()->url() === url("/dashboard/{$menu->url}/{$submenu->url}") ? 'active' : '' }}">
                                        <i class="{{ $submenu->icon }}"></i>
                                        <span>{{ $submenu->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        @if ($menu->url === 'dashboard')
                            <a class="nav-link {{ request()->url() === url("/{$menu->url}") ? '' : 'collapsed' }}" href="/{{ $menu->url }}">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                            </a>
                        @else
                            <a class="nav-link {{ request()->url() === url("/dashboard/{$menu->url}") ? '' : 'collapsed' }}" href="/dashboard/{{ $menu->url }}">
                                <i class="{{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                            </a>
                        @endif
                    @endif
                </li>
            @endif
        @endforeach
        {{-- <li class="nav-heading">Administrator</li>
        <li class="nav-heading">Pengadaan</li> --}}
    </ul>
</aside>
<!-- ======= End Sidebar ======= -->