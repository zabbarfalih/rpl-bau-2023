<x-dashboard.layouts.layouts :menu="$menu">
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
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Jumlah Surat Tugas Berdasarkan Status</h4>
                  {!! $suratTugasChart->container() !!}
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Surat Tugas</h5>
                  <p>Berikut disajikan data-data surat tugas yang diajukan.</p>

                  <!-- Table with stripped rows -->
                  <table class="table table-hover display responsive nowrap table-striped font-body-table">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Keterangan</th>
                        <!-- <th scope="col">Age</th>
                        <th scope="col">Start Date</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pengajuanSuratTugas as $pengajuan)
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $pengajuan->nama_kegiatan }}</td>
                          <td>
                            <a href="{{ route('detailpengajuansurtug.detail', ['id' => $pengajuan->id]) }}">
                              <button type="button" class="btn btn-info">Lihat Detail</button>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->

                  {{ $pengajuanSuratTugas->links() }}

                </div>
              </div>
            </div>
          </div>

          <script src="{{ $suratTugasChart->cdn() }}"></script>

          {{ $suratTugasChart->script() }}

        </section>
    <x-slot name="js_body">
      
    </x-slot>
</x-dashboard.layouts.layouts>