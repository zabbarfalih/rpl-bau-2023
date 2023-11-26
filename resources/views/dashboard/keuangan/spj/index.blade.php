<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
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
                    @foreach ($spj as $item)
                    <tr>
                      <td scope="row">{{ $loop->iteration }}</td>
                      <td>{{ $item->komponen }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td><span class="badge bg-warning">{{ $item->status }}</span></td>
                      <td>
                        <a href="{{ route('info-pengajuan-spj.show', $item->id) }}">
                           <button type="button" class="btn btn-success">Lihat</button>
                         </a>                    
                      </td>
                      <td>{{ $item->user->name }}</td>
                    </tr>
                    @endforeach

                      {{-- <tr>
                        <th scope="row">1</th>
                        <td>Dies Natalis Polteknik Statistika STIS 65</td>
                        <td>26-10-2023</td>
                        <td><span class="badge bg-warning">Dalam Proses</span></td>
                        <td>
                            <a href="{{ route('spj.detail') }}"><button type="button" class="btn btn-success">Lihat</button></a>
                        </td>
                        <td>BAAK</td>
                      </tr> --}}
                      
                  </tbody>
              </table>
            </div>
          </div>
        </div>
  </section>

      <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>