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

    <section class="section draft-pengajuan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-center fw-bold">Draft Pengajuan</h5>
                      <table class="table table-hover display responsive nowrap" style="width:100%" id="table-bau">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama Paket Pengadaan (Draft)</th>
                            <th scope="col" class="text-center">Tanggal Pengadaan</th>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="text-center"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                          <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td class="text-center">Nama Draft Pengajuan {{ $loop->iteration }}</td>
                            <td class="text-center">10 Maret 2024</td>
                            <td class="text-center">
                              <button type="button" class="btn btn-primary btn-sm rounded-pill" onclick="window.location.href='form_pengajuan-unit.html'">Ubah Isian</button>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm rounded-pill">Hapus</button>
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
                <h1 class="py-5 text-center">Daftar Draft Pengajuan</h1>
                <table id="table-bau" class="table table-striped display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center col-1">No</th>
                            <th class="text-center col-4">Nama Draf</th>
                            <th class="text-center col-4">Nama Pengadaan</th>
                            <th class="text-center col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">Nama Draft Pengajuan {{ $loop->iteration }}</td>
                            <td class="text-center align-middle">Nama Pengadaan {{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                  <button class="btn btn-success" th:data-id="${mahasiswa.id}">
                                    <a class="text-decoration-none text-light fw-semibold" th:href="@{/mahasiswa/detail/{nim}(nim=${mahasiswa.nim})}">
                                      <i class="fa-solid fa-eye"></i>
                                      <span>Lihat</span>
                                    </a>
                                  </button>
                                  <button class="btn btn-info" th:data-id="${mahasiswa.id}">
                                    <a class="text-decoration-none text-light fw-semibold" th:href="@{/mahasiswa/edit/{nim}(nim=${mahasiswa.nim})}">
                                      <i class="fa-regular fa-pen-to-square"></i>
                                      <span>Edit</span>
                                    </a>
                                  </button>
                                  <button class="btn btn-danger" th:data-id="${mahasiswa.id}">
                                    <a class="text-decoration-none text-light fw-semibold" th:href="@{/mahasiswa/delete/{nim}(nim=${mahasiswa.nim})}">
                                      <i class="fa-solid fa-trash"></i>
                                      <span>Hapus</span>
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
    </section> --}}

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
