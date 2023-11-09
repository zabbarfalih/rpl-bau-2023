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

    
    <div class="container-xxl flex-grow-1 container-p-y mt-3 mb-3">
      <div class="row">
        <!-- Total Requests -->
        <div class="col-xl-3 col-md-3 col-6 mb-4">
          <div class="card">
            <div class="card-body pd-2">
              <div class="icon mt-2">
                <span class="badge bg-primary p-2 rounded-circle">
                  <i class="bi bi-clipboard-data text-white size-16" style="font-size: 2rem; padding-top:1rem;"></i>
                </span>                  
              </div>
              <h5 class="card-title mb-1 pt-2 mt-1">Total Pengajuan SPJ</h5>
              <p class="mb-2 mt-1 fw-bolder pd-2">10</p>
            </div>
          </div>
        </div>

        <!-- Total Sales -->
        <div class="col-xl-3 col-md-3 col-6 mb-4">
          <div class="card">
            <div class="card-body pd-2">
              <div class="icon mt-2">
                <span class="badge bg-success p-2 rounded-circle">
                  <i class="bi bi-clipboard-check text-white size-16" style="font-size: 2rem; padding-top:1rem;"></i>
                </span>                  
              </div>
              <h5 class="card-title mb-1 pt-2 mt-1">Pengajuan SPJ Selesai</h5>
              <p class="mb-2 mt-1 fw-bolder pd-2">4</p>
            </div>
          </div>
        </div>

        <!-- Total Profit -->
        <div class="col-xl-3 col-md-3 col-6 mb-4">
          <div class="card">
            <div class="card-body pd-2">
              <div class="icon mt-2">
                <span class="badge bg-secondary p-2 rounded-circle">
                  <i class="bi bi-clipboard text-white size-16" style="font-size: 2rem; padding-top:1rem;"></i>
                </span>                  
              </div>
              <h5 class="card-title mb-1 pt-2 mt-1">Pengajuan SPJ Diproses</h5>
              <p class="mb-2 mt-1 fw-bolder pd-2">3</p>
            </div>
          </div>
        </div>

        <!-- Total Sales -->
        <div class="col-xl-3 col-md-3 col-6 mb-4">
          <div class="card">
            <div class="card-body pd-2">
              <div class="icon mt-2">
                <span class="badge bg-danger p-2 rounded-circle">
                  <i class="bi bi-clipboard-x text-white size-16" style="font-size: 2rem; padding-top:1rem;"></i>
                </span>                  
              </div>
              <h5 class="card-title mb-1 pt-2 mt-1">Pengajuan SPJ Ditolak</h5>
              <p class="mb-2 mt-1 fw-bolder pd-2">3</p>
            </div>
          </div>
        </div>
      </div>
    </div>
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Surat Pertanggungjawaban</h5>
                <p>Berikut disajikan data-data SPJ yang diajukan.</p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama Kegiatan</th>
                      <th scope="col">Tanggal Pengajuan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                      <th scope="col">Pengaju</th>
                      <!-- <th scope="col">Age</th>
                      <th scope="col">Start Date</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <th scope="row">1</th>
                      <td>Dies Natalis Polteknik Statistika STIS 65</td>
                      <td>26-10-2023</td>
                      <td><span class="badge bg-warning">Dalam Proses</span></td>
                      <td>
                          <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>BAAK</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>PKKMB-PKBN Polteknik Statistika STIS 65</td>
                      <td>28-10-2023</td>
                      <td><span class="badge bg-success">Selesai</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>BAU</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">3</th>
                      <td>Seminar Nasional Official Statistics 2022</td>
                      <td>03-11-2023</td>
                      <td><span class="badge bg-warning">Dalam Proses</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>PPPM</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">4</th>
                      <td>Dies Natalis Polteknik Statistika STIS 64</td>
                      <td>07-11-2023</td>
                      <td><span class="badge bg-success">Selesai</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>BAAK</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>
 
    
    {{-- <section class="section draft-pengajuan bg-white">
        <div class="container">
            <div class="row">
              <div class="col-12">
                <h1 class="py-5 text-center">Konfirmasi Pengajuan</h1>
      
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