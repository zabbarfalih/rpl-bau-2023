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
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center fw-bold fs-3">Daftar Pengajuan</h5>


                <!-- Table with stripped rows -->
                <table class="table table-hover datatable" id="table-bau">
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
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                      <td class="text-center">{{ $user->name }}</td>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td class="text-center">32 Agustus 2023</td>
                      <td class="text-center">
                        <span class="badge rounded-pill bg-info text-dark">Diproses PPK</span>
                      </td>
                      <td>
                        <button type="button" class="badge rounded-pill bg-warning text-dark"> Belum Selesai</button>
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
      </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
