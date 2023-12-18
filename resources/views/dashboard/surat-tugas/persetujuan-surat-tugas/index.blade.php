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
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Surat Tugas</h5>
                <p>Surat Tugas yang diajukan pegawai<a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Pemohon</th>
                      <th scope="col">Nama Kegiatan</th>
                      <th scope="col">Keterangan</th>                    
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($persetujuanSuratTugas as $persetujuan)
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $persetujuan->name }}</td>
                          <td>{{ $persetujuan->nama_kegiatan }}</td>
                          <td>
                            <a href="{{ route('detailpersetujuansurtug.detail', ['id' => $persetujuan->id]) }}">
                              <button type="button" class="btn btn-primary">Detail</button>
                            </a>
                            <a href="{{ asset($persetujuan->file_path) }}" target="_blank">
                              <button type="button" class="btn btn-success">Lampiran</button>
                            </a>
                          </td>
                        </tr>
                      @endforeach

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