<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @foreach($menus as $menu)
            <li class="nav-item">
                @if($menu->has_submenu)
                    <a class="nav-link collapsed" data-bs-target="#{{ $menu->name }}-nav" data-bs-toggle="collapse" href="#">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span>
                        <i class="fa-solid fa-chevron-down ms-auto"></i>
                    </a>
                    <ul id="{{ $menu->name }}-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        @foreach($menu->submenus as $submenu)
                            <li>
                                <a href="/{{ $menu->url }}/{{ $submenu->url }}">
                                    <i class="{{ $submenu->icon }}"></i>
                                    <span>{{ $submenu->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <a class="nav-link" href="/{{ $menu->url }}">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span>
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</aside><!-- End Sidebar-->
<!-- End Sidebar-->