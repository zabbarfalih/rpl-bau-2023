<x-dashboard.layouts.layouts :menu="$menu">
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
                                <div class="col-lg-9 col-md-8">Fulan bin Fulanuddin</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nama Kegiatan</div>
                                <div class="col-lg-9 col-md-8">Seminar Internasional Data Sains 2023</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Tanggal Kegiatan
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  26-10-2023
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                  Jenis SPJ
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  SPJ Pegawai
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label mb-2">
                                  Dokumen SPJ 
                                </div>
                                <div class="col-lg-9 col-md-8">
                                  <div class="cetak">
                                    <a href="#"><button type="button" class="btn btn-secondary rounded-pill">Lihat</button></a>
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
      
      <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>