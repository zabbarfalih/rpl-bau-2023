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
        <div class="row">
            <div class="col-lg-12">

              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title text-center fw-bold fs-3">Daftar Pengajuan</h5>
                  <div class="d-flex justify-content-end mb-3">
                    <a href={{ route('pengajuan.create') }} class="btn btn-primary me-2">+ Tambah Pengajuan</a>
                  </div>

                  <!-- Table with stripped rows -->
                  <table class="table-bau table table-hover datatable" id="pengajuan-table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Nama Pengadaan</th>
                        <th scope="col" class="text-center">Tanggal Pengadaan</th>
                        <th scope="col" class="text-center">Status Pengajuan</th>
                        <th scope="col" class="text-center"></th>
                        <!-- <th scope="col" class="text-center">Aksi</th> -->
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                      <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <th scope="row" class="text-center">{{ $user->name }}</th>
                        <td class="text-center">Nama Pengadaan {{ $loop->iteration }}</td>
                        <td class="text-center">22 September 2024</td>
                        <td class="text-center">
                          <span class="badge rounded-pill bg-warning text-dark">Menunggu Persetujuan</span>
                        </td>
                        <td>
                          <button type="button" class="btn btn-info btn-sm rounded-pill" onclick="window.location.href='detail_pengajuan.html'">Details</button>
                          <button type="button" class="btn btn-success btn-sm rounded-pill">Unduh</button>
                        </td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->

                </div>
              </div>

            </div>
          </div>

        {{-- <div class="container">
            <div class="row">
              <div class="col-12">
                <h1 class="py-5 text-center">Daftar Pengajuan</h1>
                <a class="d-flex justify-content-center mb-3" href="{{ route('pengajuan.create') }}">
                    <button class="btn btn-primary mb-3">
                        Tambah Pengajuan
                    </button>
                </a>

                <table id="table-bau" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center col-1">No</th>
                            <th class="text-center col-3">Nama</th>
                            <th class="text-center col-4">Nama Pengadaan</th>
                            <th class="text-center col-2">Status Pengajuan</th>
                            <th class="text-center col-2">Dokumen</th>

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
                            <td class="text-center align-middle">
                                <button class="btn btn-sm btn-success">Unduh</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div> --}}
    </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
