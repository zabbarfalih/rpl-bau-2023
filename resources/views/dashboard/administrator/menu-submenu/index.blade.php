<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="js_head">
        <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script defer src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
        <script defer src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script defer src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.js"></script>
        <script defer src="{{ asset('assets/js/dashboard/table.js') }}"></script>
    </x-slot>
    
    <section class="section draft-pengajuan bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="my-3 text-center">Daftar Menu</h1>
                    {{-- <a href="{{ route('administrator.menu-submenu.create') }}" class="d-flex justify-content-center mb-3">
                        <button class="btn btn-primary mb-3">
                            Tambah Menu
                        </button>
                    </a> --}}
                    <a class="d-flex justify-content-center my-3">
                        <button class="btn btn-primary mb-3">
                            Tambah Menu
                        </button>
                    </a>

                    <table id="table-bau" class="table table-striped display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center col-1" scope="col">No</th>
                                <th class="text-center col-2" scope="col">Nama</th>
                                <th class="text-center col-1" scope="col">Icon</th>
                                <th class="text-center col-1" scope="col">Sidebar</th>
                                <th class="text-center col-1" scope="col">Role</th>
                                <th class="text-center col-1" scope="col">Submenu</th>
                                <th class="text-center col-4" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $index => $menu)
                            <tr>
                                <th class="text-center align-middle">
                                    <span>{{ $index + 1 }}</span>
                                </th>
                                <td class="text-center align-middle">
                                    <span>{{ $menu->name }}</span>
                                </td>
                                <td class="text-center align-middle">
                                    <span id="icon-table-bau">
                                        <i class="{{ $menu->icon }}">
                                        </i>
                                    </span>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input id="checkbox-table-bau" type="checkbox" {{ $menu->on_sidebar ? 'checked' : '' }} disabled class="form-check-input border">
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input id="checkbox-table-bau" type="checkbox" {{ $menu->has_role ? 'checked' : '' }} disabled class="form-check-input border">
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input id="checkbox-table-bau" type="checkbox" {{ $menu->has_submenu ? 'checked' : '' }} disabled class="form-check-input border">
                                    </div>
                                </td>                                                                                   
                                <td class="align-middle">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <button class="btn btn-success" data-id="{{ $menu->id }}">
                                            <a class="text-decoration-none text-light fw-semibold d-flex align-items-center justify-content-center gap-1">
                                                <i class="bi bi-eye-fill"></i>
                                                <span id="text-action-table-bau">Lihat Submenu</span>
                                            </a>
                                        </button>
                                        <button class="btn btn-info" data-id="{{ $menu->id }}">
                                            <a class="text-decoration-none text-light fw-semibold d-flex align-items-center justify-content-center gap-1">
                                                <i class="bi bi-pencil-square"></i>
                                                <span id="text-action-table-bau">Edit</span>
                                            </a>
                                        </button>
                                        <button class="btn btn-danger" data-id="{{ $menu->id }}">
                                            <a class="text-decoration-none text-light fw-semibold d-flex align-items-center justify-content-center gap-1">
                                                <i class="bi bi-trash-fill"></i>
                                                <span id="text-action-table-bau">Hapus</span>
                                            </a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>