<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    </x-slot>

    <x-slot name="js_head">
        <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script defer src="{{ asset('assets/js/dashboard/table.js') }}"></script>
    </x-slot>

    <section class="section draft-pengajuan bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="my-3 text-center">Daftar Pegawai</h1>
                    
                    <a class="d-flex justify-content-center my-3">
                        <button class="btn btn-primary mb-3">
                            Tambah Pegawai
                        </button>
                    </a>

                    <table id="table-pegawai" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center col-2">Nama</th>
                                <th class="text-center col-1">NIP</th>
                                <th class="text-center col-1">Email</th>
                                <th class="text-center col-1">No. Telepon</th>
                                <th class="text-center col-1">Role</th>
                                <th class="text-center col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="text-center align-middle">{{ $user->nip }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->phone_number }}</td>
                                <td class="text-center align-middle">
                                    @foreach (json_decode($user->roles) as $role)
                                        <button class="btn btn-sm btn-primary">{{ $role }}</button>
                                    @endforeach
                                </td>
                                
                                <td class="align-middle">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <button class="btn btn-info">
                                            <a class="text-decoration-none text-light fw-semibold d-flex align-items-center justify-content-center gap-1">
                                                <i class="bi bi-pencil-square"></i>
                                                <span id="text-action-table-bau">Edit Role</span>
                                            </a>
                                        </button>
                                        <button class="btn btn-danger">
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