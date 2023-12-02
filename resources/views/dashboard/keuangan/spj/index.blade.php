<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    <section class="section info-spj bg-white">
      <div class="container">
          <div class="row">
            <div class="col-12">
              @if (session()->has('success'))
              <div class="alert alert-success col-lg-12 mt-4" role="alert">
                {{ session('success') }}
              </div>
              @endif

              @if (session()->has('successimport'))
              <div class="alert alert-success col-lg-12 mt-4" role="alert">
                {{ session('successimport') }}
              </div>
              @endif
              <h2 class="py-5 text-center">Surat Pertanggungjawaban</h2>
              <p>Berikut disajikan data-data SPJ yang diajukan.</p>
    
              <table id="table-bau" class="table table-striped display responsive nowrap" style="width:100%">
                  <thead>
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
                    @php
                        $startNumber = 1;
                    @endphp
                    @foreach ($spj as $item)
                    <tr>
                      <td scope="row">{{ $startNumber++ }}</td>
                      <td>{{ $item->komponen }}</td>
                      <td>{{ $item->created_at->format('M j, Y') }}</td>
                      <td>
                        <span class="badge 
                            @if($item->status == 'Selesai') bg-success 
                            @elseif($item->status == 'Ditolak') bg-danger 
                            @else bg-warning 
                            @endif">
                            {{ $item->status }}
                        </span>
                      </td>
                      <td>
                        <a href="{{ route('info-pengajuan-spj.show', $item->id) }}">
                           <button type="button" class="btn btn-success">Lihat</button>
                         </a>                    
                      </td>
                      <td>{{ $item->user->name }}</td>
                    </tr>
                    @endforeach
                    
                    @foreach ($spjTr as $item)
                    <tr>
                      <td scope="row">{{ $startNumber++ }}</td>
                      <td>{{ $item->komponen }}</td>
                      <td>{{ $item->created_at->format('M j, Y') }}</td>
                      <td>
                        <span class="badge 
                            @if($item->status == 'Selesai') bg-success 
                            @elseif($item->status == 'Ditolak') bg-danger 
                            @else bg-warning 
                            @endif">
                            {{ $item->status }}
                        </span>
                      </td>
                      <td>
                        <a href="{{ route('info-pengajuan-spjtr.show', $item->id) }}">
                           <button type="button" class="btn btn-success">Lihat</button>
                         </a>                    
                      </td>
                      <td>{{ $item->user->name }}</td>
                    </tr>
                    @endforeach   

                    @foreach ($spjPd as $item)
                    <tr>
                      <td scope="row">{{ $startNumber++ }}</td>
                      <td>{{ $item->komponen }}</td>
                      <td>{{ $item->created_at->format('M j, Y') }}</td>
                      <td>
                        <span class="badge 
                            @if($item->status == 'Selesai') bg-success 
                            @elseif($item->status == 'Ditolak') bg-danger 
                            @else bg-warning 
                            @endif">
                            {{ $item->status }}
                        </span>
                      </td>
                      <td>
                        <a href="{{ route('info-pengajuan-spj.show', $item->id) }}">
                           <button type="button" class="btn btn-success">Lihat</button>
                         </a>                    
                      </td>
                      <td>{{ $item->user->name }}</td>
                    </tr>
                    @endforeach   
                  </tbody>
              </table>
            </div>
          </div>
        </div>
  </section>

      <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>