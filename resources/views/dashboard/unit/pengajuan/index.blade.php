<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    </x-slot>

    <x-slot name="js_head">
        <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script defer src="{{ asset('assets/js/dashboard/table.js') }}"></script>
    </x-slot>

    <section class="section draft-pengajuan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                  <div class="card">
                    <div class="card-body text-center">
                      <h5 class="card-title">Pengajuan</h5>
                      <div class="d-flex justify-content-end mb-3">
                        <a href="form_pengajuan-unit.html" class="btn btn-primary me-2 btn-info btn-sm rounded-pill bg-success text-light">+ Tambah Pengajuan</a>
                      </div>

                      <!-- Table with stripped rows -->
                      <table class="table table-hover datatable" id="pengajuan-table">
                        <thead>
                          <tr>
                            <th scope="col" >No</th>
                            <th scope="col" >Nama Paket Pengadaan</th>
                            <th scope="col" >Tanggal Pengadaan</th>
                            <th scope="col" >Status Pengajuan</th>
                            <th scope="col" ></th>
                            <!-- <th scope="col" class="text-center">Aksi</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>Nama Pengadaan {{$loop->iteration}}</td>
                            <td>22 September 2024</td>
                            <td>
                              <span class="badge rounded-pill bg-warning text-dark">Menunggu Persetujuan</span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-info btn-sm rounded-pill" onclick="window.location.href='details-unit.html'" >Details</button>
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

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
