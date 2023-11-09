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

                    <tr>
                      <th scope="row">5</th>
                      <td>PKKMB-PKBN Polteknik Statistika STIS 64</td>
                      <td>26-10-2023</td>
                      <td><span class="badge bg-warning">Dalam Proses</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>PPPM</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">6</th>
                      <td>Seminar Nasional Official Statistics 2023</td>
                      <td>26-10-2023</td>
                      <td><span class="badge bg-danger">Ditolak</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>PPPM</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">7</th>
                      <td>Seminar Internasional Data Sains 2022</td>
                      <td>26-10-2023</td>
                      <td><span class="badge bg-warning">Dalam Proses</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>PPPM</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">8</th>
                      <td>Rapat Akbar BPS</td>
                      <td>26-10-2023</td>
                      <td><span class="badge bg-danger">Ditolak</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>PPPM</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">9</th>
                      <td>Seminar Internasional Data Sains 2023</td>
                      <td>26-10-2023</td>
                      <td><span class="badge bg-warning">Dalam Proses</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>PPPM</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>

                    <tr>
                      <th scope="row">10</th>
                      <td>Survei Ubinan</td>
                      <td>26-10-2023</td>
                      <td><span class="badge bg-warning">Dalam Proses</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>PPPM</td>
                      <!-- <td>28</td>
                      <td>2016-05-25</td> -->
                    </tr>
                    <tr>
                      <th scope="row">11</th>
                      <td>Regsosek</td>
                      <td>26-11-2023</td>
                      <td><span class="badge bg-success">Selesai</span></td>
                      <td>
                        <a href="detail-pengajuan-surat.html"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                      </td>
                      <td>BAAK</td>
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

      <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>