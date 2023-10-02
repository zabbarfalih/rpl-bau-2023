<div class="pagetitle">
    @if (request()->url() === url("/dashboard"))
        <h1>Dashboard</h1>
    @else
        @if (isset($menus))
            @php $currentUrl = request()->url(); $menuMatch = false; @endphp
            @foreach($menus as $menu)
                @foreach ($menu->submenus as $submenu)
                    @if (request()->is("dashboard/{$menu->url}/{$submenu->url}*"))
                        <h1>{{ $submenu->name }}</h1>
                        @php $menuMatch = true; @endphp
                    @endif
                @endforeach
                @if (!$menuMatch && request()->is("dashboard/{$menu->url}*"))
                    <h1>{{ $menu->name }}</h1>
                @endif
            @endforeach
        @endif
    @endif
    <nav>
        <ol id="breadcrumb-web-bau" class="breadcrumb">
            <li class="breadcrumb-item {{ request()->url() === url("/dashboard") ? 'active' : '' }}">
                <a href="{{ route('home.index') }}">Dashboard</a>
            </li>
            @if (isset($menus))
                @php $currentUrl = request()->url(); @endphp
                @foreach($menus as $menu)
                    @if (request()->is("dashboard/{$menu->url}*"))
                        <li class="breadcrumb-item {{ $menu->has_submenu === 1 ? 'menu-has-submenu' : 'active' }}">
                            @if ($menu->has_submenu === 1)
                                <a>
                                    {{ $menu->name }}
                                </a>
                                @foreach ($menu->submenus as $submenu)
                                    @if (request()->is("dashboard/{$menu->url}/{$submenu->url}*"))
                                        <li class="breadcrumb-item {{ request()->is("dashboard/{$menu->url}/{$submenu->url}*") ? 'active' : '' }}">
                                            <a href="/dashboard/{{ $menu->url }}/{{ $submenu->url }}">
                                                {{ $submenu->name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <a href="/dashboard/{{ $menu->url }}">
                                    {{ $menu->name }}
                                </a>
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif
        </ol>
    </nav>
</div>
