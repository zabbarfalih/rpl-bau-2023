<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
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

        <!-- Total Done -->
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

        <!-- Total Proccess -->
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

        <!-- Total Reject -->
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
    
    <section class="section info-spj bg-white">
      <div class="container">
          <div class="row">
            <div class="col-12">
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
                    @foreach ($spj as $item)
                    <tr>
                      <td scope="row">{{ $loop->iteration }}</td>
                      <td>{{ $item->komponen }}</td>
                      <td>{{ $item->created_at->format('M j, Y') }}</td>
                      <td><span class="badge bg-warning">{{ $item->status }}</span></td>
                      <td>
                        <a href="{{ route('konfirmasi-spj.show', ['spj' => $item->id]) }}">
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