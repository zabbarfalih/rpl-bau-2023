{{-- <x-dashboard.layouts.layouts :menus="$menus"> --}}
    {{-- <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
    </x-slot> --}}

    {{-- <style>
      #tahap2,
      #tahap3 {
        display: none;
      }
    </style> --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <section class="section dashboard">
        <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-8">
            <div class="row">
              <!-- Reports -->
              <div class="col-12">
                <section class="section profile">
                  <div class="row">
                    <div class="col-xl-4">
                      <div class="card">
                        <div
                          class="card-body profile-card pt-4 d-flex flex-column align-items-center"
                        >
                          <h6>Detail Pengajuan Surat</h6>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-8">
                      <div class="card">
                        <div class="card-body pt-3">
                          <!-- Bordered Tabs -->
                          <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                              <button
                                class="nav-link active"
                                data-bs-toggle="tab"
                                data-bs-target="#profile-overview"
                              >
                                Overview Surat Pertanggung Jawaban
                              </button>
                            </li>
                          </ul>

                          <div class="tab-content pt-2">
                            <div
                              class="tab-pane fade show active profile-overview"
                              id="profile-overview"
                            >
                              <h5 class="card-title">Informasi Surat Pertanggung Jawaban</h5>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Status SPJ
                                </div>
                                <div class="col-lg-9 col-md-8">                            
                                    {{ $spj->status }}
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nama Pengaju</div>
                                <div class="col-lg-9 col-md-8">{{ $spj->user->name }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nama Kegiatan</div>
                                <div class="col-lg-9 col-md-8">{{ $spj->kegiatan }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Tanggal Kegiatan
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  {{ $spj->tanggal_kegiatan }}
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Jenis SPJ
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  {{ $spj->jenis_spj }}
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Periode
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  {{ $spj->periode }}
                                </div>
                              </div>

                              Detail lengkap

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Total Dana
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  <p>Rp. {{ number_format($spj->total, 2, ',', '.') }}
                                  </p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Tanggal Pencairan Dana
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  {{ $spj->tanggal_transfer }}
                                </div>
                              </div>

                            </div>


                            <div
                              class="tab-pane fade profile-edit pt-3"
                              id="profile-edit"
                            >
                              <!-- Timeline -->
                            </div>
                          </div>
                          <!-- End Bordered Tabs -->
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!-- End Reports -->
            </div>
          </div>
          <!-- End Left side columns -->
        </div>
    </section> --}}
<p>{{ $spjPdf->kegiatan }}</p>
    <section>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Golongan</th>
                    <th scope="col">Rate Honor</th>
                    <th scope="col">SKS Wajib</th>
                    <th scope="col">SKS Hadir</th>
                    <th scope="col">SKS Dibayar</th>
                    <th scope="col">Jumlah Bruto</th>
                    <th scope="col">Pajak</th>
                    <th scope="col">Jumlah Diterima</th>
                    <th scope="col">Nomor Rekening</th>
                    <th scope="col">Nama Rekening</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tabelspj as $item)
                    <tr>
                      <td>{{ isset($item->nama_dosen) ? $item->nama_dosen : '' }}</td>
                      <td>{{ isset($item->golongan) ? $item->golongan : '' }}</td>
                      <td>{{ isset($item->rate_honor) ? $item->rate_honor : '' }}</td>
                      <td>{{ isset($item->sks_wajib) ? $item->sks_wajib : '' }}</td>
                      <td>{{ isset($item->sks_hadir) ? $item->sks_hadir : '' }}</td>
                      <td>{{ isset($item->sks_dibayar) ? $item->sks_dibayar : '' }}</td>
                      <td>{{ isset($item->jumlah_bruto) ? $item->jumlah_bruto : '' }}</td>
                      <td>{{ isset($item->pajak) ? $item->pajak : '' }}</td>
                      <td>{{ isset($item->jumlah_diterima) ? $item->jumlah_diterima : '' }}</td>
                      <td>{{ isset($item->nomor_rekening) ? $item->nomor_rekening : '' }}</td>
                      <td>{{ isset($item->nama_rekening) ? $item->nama_rekening : '' }}</td>
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
    
    
    {{-- <x-slot name="js_body">
    </x-slot>     --}}
    {{-- </x-dashboard.layouts.layouts> --}}