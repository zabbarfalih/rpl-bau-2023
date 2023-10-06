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
                <h1 class="py-5 text-center">Daftar Pengajuan</h1>
                <a class="d-flex justify-content-center mb-3" href="{{ route('pengajuan.create') }}">
                    <button class="btn btn-primary mb-3">
                        Tambah Pengajuan
                    </button>
                </a>
      
                <table id="table-pegawai" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center col-1">No</th>
                            <th class="text-center col-5">Nama</th>
                            <th class="text-center col-4">Nama Pengadaan</th>
                            <th class="text-center col-2">Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $user->name }}</td>
                            <td class="text-center align-middle">Nama Pengadaan {{ $loop->iteration }}</td>
                            <td class="text-center align-middle">
                                <button class="btn btn-sm btn-primary">Status</button>
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