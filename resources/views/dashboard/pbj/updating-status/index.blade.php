<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
        <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">
    </x-slot>

    <x-slot name="js_head">
        <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script defer src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
        <script defer src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script defer src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.js"></script>
        <script defer src="{{ asset('assets/js/dashboard/table.js') }}"></script>
    </x-slot>

    <section class="section draft-pengajuan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Pengajuan</h5>
                            <div class="d-flex justify-content-end mb-3">
                                <button
                                    class="btn btn-primary me-2 btn-info btn-sm rounded-pill bg-success text-light"
                                >
                                    + Tambah Pengajuan
                                </button>
                            </div>

                            <!-- Table with stripped rows -->
                            <table
                            class="table table-hover display responsive nowrap" style="width:100%" id="table-bau"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama</th>
                                        <th scope="col" class="text-center">Nama Paket Pengadaan</th>
                                        <th scope="col" class="text-center">Tanggal Pengadaan</th>
                                        <th scope="col" class="text-center">Status Pengajuan</th>
                                        <th scope="col" class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                        <th scope="row">{{ $user->name }}</th>
                                        <td scope="row" class="text-center">Nama Pengadaan {{ $loop->iteration }}</td>
                                        <td class="text-center">22 September 2024</td>
                                        <td class="text-center">
                                            <span
                                                class="badge rounded-pill bg-warning text-dark"
                                                >Menunggu Persetujuan</span
                                            >
                                        </td>
                                        <td class="text-center">
                                            <button
                                                type="button"
                                                class="btn btn-info btn-sm rounded-pill"
                                                onclick="window.location.href='details.html'"
                                            >
                                                Details
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section draft-pengajuan bg-white">
        <div class="container">
            <div class="row">
              <div class="col-12">
                <h1 class="py-5 text-center">Updating Status</h1>

                <table id="table-bau" class="table table-striped display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center col-1">No</th>
                            <th class="text-center col-3">Nama</th>
                            <th class="text-center col-2">Nama Pengadaan</th>
                            <th class="text-center col-2">Tanggal Pengajuan</th>
                            <th class="text-center col-2">Aksi</th>
                            <th class="text-center col-2">Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $user->name }}</td>
                            <td class="text-center align-middle">Nama Pengadaan {{ $loop->iteration }}</td>
                            <td class="text-center align-middle">21-09-2021</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                  <button class="btn btn-success" th:data-id="${mahasiswa.id}">
                                    <a class="text-decoration-none text-light fw-semibold" href="
                                      <i class="fa-solid fa-eye"></i>
                                      <span>Lihat</span>
                                    </a>
                                  </button>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <span class="text-primary">Status</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

              </div>
            </div>
          </div>
    </section> --}}

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
