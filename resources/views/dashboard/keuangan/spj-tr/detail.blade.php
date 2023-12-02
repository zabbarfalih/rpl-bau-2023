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
                                <div class="col-lg-3 col-md-4 label">
                                  Status SPJ
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  <span class="badge 
                                      @if($spj->status == 'Selesai') bg-success 
                                      @elseif($spj->status == 'Ditolak') bg-danger 
                                      @else bg-warning 
                                      @endif">
                                      {{ $spj->status }}
                                  </span>

                                  @if ($spj->status === 'Ditolak') 
                                    <a href="/dashboard/spj/pengajuan-spj" class="ml-4"><button type="button" class="btn btn-outline-success ml-4" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                      Ajukan Ulang</button>
                                    </a>
                                  @endif

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
                                  <p class="card-text mt-2 td-underline">
                                    <u><a href="{{ route('spjtrtemplatedownload') }}" >Download Template Excel di sini</a></u>
                                </p>
                                
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Bulan
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  {{ $spj->bulan }}
                                </div>
                              </div>

                              {{-- Detail lengkap --}}

                              @if (!$tabelspj->isEmpty())
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
                              @endif
                

                              @if ($spj->status === 'Ditolak') 
                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Pesan Penolakan
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  {{ $spj->keterangan }}
                                </div>
                              </div>
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusspj">
                                Hapus Pengajuan
                              </button>
                              <div class="modal fade" id="hapusspj" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Hapus Pengajuan</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      Apakah Anda yakin untuk menghapus pengajuan ini?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                      <form method="post" action="{{ url('/dashboard/spj/info-pengajuan-spjtr/hapus-spj/' . $spj->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              @endif

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
                <h5 class="card-title">Perkembangan Status Pengajuan</h5>

                <div class="activity">
                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 1</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-warning align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Unggah Dokumen</strong>
                      <div class="finish">
                        <div class="download">
                          <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#basicModal" @if(!$tabelspj->isEmpty() || $spj->status == 'Ditolak') disabled @endif>
                            Unggah
                          </button>
                          <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#basicModalHapusSpj" @if($tabelspj->isEmpty() || $spj->status !== 'Menunggu Persetujuan') disabled @endif>
                            Hapus Unggahan
                          </button>

                          {{-- Modal Unggah --}}
                          <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Unggah File Excel</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('importspjtrnew') }}" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12 label mb-2">
                                        {{ csrf_field() }}
                                          <div class="form-group">
                                              <input class="custom-file-input form-control @error('file') is-invalid @enderror" type="file" name="file" required>
                                              @error('file')
                                                  <div class="invalid-feedback">
                                                    {{ $message }}
                                                  </div>
                                              @enderror
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

                          {{-- Modal Haous Unggahan --}}
                          <div class="modal fade" id="basicModalHapusSpj" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Hapus Dokumen</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda yakin untuk menghapus Dokumen Pengajuan?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                  <form method="post" action="{{ url('/dashboard/spj/info-pengajuan-spjtr/hapus-unggahan/' . $spj->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
                      <div class="activite-label">Tahap 2</div>
                      <i
                        class="bi bi-circle-fill activity-badge text-warning align-self-start"
                      ></i>
                      <div class="activity-content">
                        <strong>Menunggu Persetujuan</strong>
                        <p>Pada tahap ini pengajuan akan disetujui/ditolak oleh Tim Keuangan</p>
                      </div>
                    </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 3</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-warning align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Menunggu Pencairan Dana</strong>
                      <p>Pada tahap ini pengajuan sedang dalam proses pencairan dana</p>
                    </div>
                  </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 4</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-success align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Selesai</strong>
                      <p>Pada tahap ini pengajuan SPJ telah selesai, anda dapat mengunduh SPJ</p>
                      <div class="finish">
                        <div class="download">
                          <button type="button" class="btn btn-primary" @if($spj->status !== 'Selesai') disabled @endif>Cetak</button>
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
                      <th scope="col">Nama</th>
                      <th scope="col">Transport Per Hari</th>
                      <th scope="col">Jumlah Kegiatan</th>
                      <th scope="col">Jumlah yang Dibayarkan Wajib</th>
                      <th scope="col">Bank</th>
                      <th scope="col">Nomor Rekening</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tabelspj as $item)
                      <tr>
                        <td>{{ isset($item->nama) ? $item->nama : '' }}</td>
                        <td>{{ isset($item->transpor_per_hari) ? $item->transpor_per_hari : '' }}</td>
                        <td>{{ isset($item->jumlah_kegiatan) ? $item->jumlah_kegiatan : '' }}</td>
                        <td>{{ isset($item->jumlah_yang_dibayarkan) ? $item->jumlah_yang_dibayarkan : '' }}</td>
                        <td>{{ isset($item->bank) ? $item->bank : '' }}</td>
                        <td>{{ isset($item->nomor_rekening) ? $item->nomor_rekening : '' }}</td>
                      </tr>
                    @endforeach
                  </tbody>                
                </table>
              @else
              <div class="alert alert-danger col-lg-12 m-2 mt-3" role="alert">
                Anda Belum Mengunggah Dokumen Excel, Silakan Unggah Excel.
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