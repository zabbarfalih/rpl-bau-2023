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
                                Overview Surat Keterangan Penghasilan
                              </button>
                            </li>
                          </ul>

                          <div class="tab-content pt-2">
                            <div
                              class="tab-pane fade show active profile-overview"
                              id="profile-overview"
                            >
                              <h5 class="card-title">Informasi Surat Keterangan Penghasilan</h5>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nama</div>
                                <div class="col-lg-9 col-md-8">Fulan bin Fulanuddin</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">NIP</div>
                                <div class="col-lg-9 col-md-8">2222222</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Bulan Dasar
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  Januari 2023
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Jenis Penghasilan
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  Gaji Pokok
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Keperluan Pengajuan
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  Pengajuan SKP digunakan untuk melihat detail penghasilan yang diperoleh
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label mb-2">
                                  Bukti Keperluan
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  <div class="cetak">
                                    <a href="#"><button type="button" class="btn btn-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalPreviewBukti">Lihat</button></a>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label mb-2">
                                  Preview SKP
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  <div class="cetak">
                                    <a href="#"><button type="button" class="btn btn-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalPreviewSKP">Lihat</button></a>
                                  </div>
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
                      <strong>Pengisian Formulir</strong>
                      <p>Anda telah mengisi formulir pengajuan SKP</p>
                    </div>
                  </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 2</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-danger align-self-start"
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
                    <div class="activite-label">Tahap 3</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-primary align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Proses Tanda Tangan</strong>
                      <p>SKP telah ditandatangani</p>
                    </div>
                  </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 4</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-info align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Selesai</strong>
                      <p>Proses pengajuan SKP telah selesai, silahkan ambil SKP di Bagian Administrasi Umum</p>
                    </div>
                  </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Tahap 5</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-warning align-self-start"
                    ></i>
                    <div class="activity-content">
                      <strong>Telah Diterima</strong>
                      <p>Anda telah menerima SKP</p>
                      <div class="finish">
                        <div class="cetak">
                          <a href="#"><button type="button" class="btn btn-primary rounded-pill">Cetak</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End activity item-->

                  <!-- End activity item-->
                </div>

                <div class="modal fade" id="modalPreviewBukti" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Bukti Keperluan</h4>
                      </div>
                      <div class="modal-body">
                        <embed src="offztut.pdf" frameborder="0" width="100%" height="400px">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="modalPreviewSKP" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Preview SKP</h4>
                      </div>
                      <div class="modal-body">
                        <embed src="offztut.pdf" frameborder="0" width="100%" height="400px">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Recent Activity -->
          </div>
          <!-- End Right side columns -->
        </div>
      </section>
      
      <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
