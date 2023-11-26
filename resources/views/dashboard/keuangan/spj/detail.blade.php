<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>
    <x-slot name="js_head">
    </x-slot>
    <section class="section dashboard">
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
                          <img
                            src="{{ asset('/assets/img/surat.png') }}"
                            alt="Surat"
                            class="ri-rounded-corner"
                          />
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
                                  <p class="card-text mt-2"><a href="{{ route('spjtemplatedownload') }}" class="btn btn-primary rounded-pill">Download</a>
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

          <!-- Right side columns -->
          <div class="col-lg-4">
            <!-- Recent Activity -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Perkembangan Proses Pengajuan</h5>

                <div class="activity">
                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 1</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-success align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Unggah file</strong>
                      <div class="finish">
                        <div class="download">
                          <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#basicModal">
                            Basic Modal
                          </button>
                          <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Unggah File Excel</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('importspjnew') }}" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label mb-2">
                                        {{ csrf_field() }}
                                          <div class="form-group">
                                              <input class="custom-file-input" type="file" name="file" required>
                                          </div>
                                      </div>
                                      <div class="col-sm-10">
                                        <input
                                          type="hidden"
                                          class="form-control"
                                          value="{{ $spj->id }}"
                                          readonly
                                          name="spj_id"
                                        />
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                    </form>
                                </div>
                            
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="activity-item d-flex">
                      <div class="activite-label">Tahap 1</div>
                      <i
                        class="bi bi-circle-fill activity-badge text-success align-self-start"
                      ></i>
                      <div class="activity-content">
                        <strong>Verifikasi</strong>
                        <p>SKP telah disetujui oleh Tim Keuangan</p>
                        <div class="finish">
                          <div class="download">
                            <a href="#"><button type="button" class="btn btn-danger rounded-pill">Perbaiki</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 2</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-danger align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Pencairan Dana</strong>
                      <p>Proses pencairan dana telah selesai</p>
                    </div>
                  </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 3</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-warning align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>SPJ Telah Selesai</strong>
                      <p>Proses pengajuan SPJ telah selsai</p>
                      <div class="finish">
                        <div class="download">
                          <a href="#"><button type="button" class="btn btn-primary rounded-pill">Cetak</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End activity item-->
                  <!-- End activity item-->
                  <!-- End activity item-->
                </div>
              </div>
            </div>
            <!-- End Recent Activity -->
          </div>
          <!-- End Right side columns -->
        </div>
      </section>

      <section>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->
                @if(!$tabelspj->isEmpty())
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
              @else
              <div class="alert alert-danger" role="alert">
                Anda Belum Mengunggah Excel, Silakan Unggah Excel.
              </div>
              @endif
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>