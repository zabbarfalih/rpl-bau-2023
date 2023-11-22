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

    <section class="section info-spj bg-white">
      <div class="container">
          <div class="row">
            <div class="col-12">
              <h2 class="py-5 text-center">Surat Pertanggungjawaban</h2>
              <p>Berikut disajikan data-data SPJ yang diajukan.</p>
    
              <table id="table-bau" class="table table-striped display responsive nowrap" style="width:100%">
                  <thead>
                      {{-- <tr>
                          <th class="text-center col-1">No</th>
                          <th class="text-center col-3">Nama Kegiatan</th>
                          <th class="text-center col-2">Tanggal Pengajuan</th>
                          <th class="text-center col-2">Status</th>
                          <th class="text-center col-2">Aksi</th>
                          <th class="text-center col-2">Pengaju</th>
                      </tr> --}}
                      <tr>
                        <th class="text-center col-1">No.</th>
                        <th class="text-center col-3">Nama Kegiatan</th>
                        <th class="text-center col-2">Tanggal Pengajuan</th>
                        <th class="text-center col-2">Status</th>
                        <th class="text-center col-2">Aksi</th>
                        <th class="text-center col-2">Pengaju</th>
                      </tr>
                  </thead>
                  <tbody>
                      {{-- @foreach ($users as $user)
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
                      @endforeach --}}
                      <tr>
                        <th scope="row">1</th>
                        <td>Dies Natalis Polteknik Statistika STIS 65</td>
                        <td>26-10-2023</td>
                        <td><span class="badge bg-warning">Dalam Proses</span></td>
                        <td>
                            <a href="{{ route('detailpengajuanspj.detail') }}"><button type="button" class="btn btn-success">Lihat</button></a>
                        </td>
                        <td>BAAK</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>PKKMB-PKBN Polteknik Statistika STIS 65</td>
                        <td>28-10-2023</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td>
                          <a href="{{ route('detailpengajuanspj.detail') }}"><button type="button" class="btn btn-success">Lihat</button></a>
                        </td>
                        <td>BAAK</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Seminar Nasional Official Statistics 2022</td>
                        <td>03-11-2023</td>
                        <td><span class="badge bg-danger">Ditolak</span></td>
                        <td>
                          <a href="{{ route('detailpengajuanspj.detail') }}"><button type="button" class="btn btn-success">Lihat</button></a>
                        </td>
                        <td>BAAK</td>
                      </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
  </section>

      <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>