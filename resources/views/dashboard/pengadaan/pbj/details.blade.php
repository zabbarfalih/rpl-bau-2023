<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    <section class="section dashboard details-pengajuan">
        <div class="container">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                  <div class="row">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Dokumen Laporan Pengadaan</h5>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                          <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:" width="16" height="16">
                            <use xlink:href="#info-fill" />
                          </svg>
                          <div>Untuk mengunduh format laporan, silahkan tekan download</div>
                        </div>
                        <!-- List group with Advanced Contents -->

                        <div class="d-flex align-items-start">
                          <h4 class="alert-heading">Dokumen KAK</h4>
                        </div>

                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                          <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-primary" type="button">Download</button>
                          </div>
                        </div>

                        <div class="d-flex align-items-start">
                          <h4 class="alert-heading">Dokumen BAST</h4>
                        </div>

                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                          <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-primary" type="button">Download</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">
                  <div class="card">
                    <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>

                        <li>
                          <a class="dropdown-item" href="#">Today</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">This Month</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">This Year</a>
                        </li>
                      </ul>
                    </div>

                    <div class="card-body">
                      <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                      <div class="activity">
                        <div class="activity-item d-flex">
                          <div class="activite-label">32 min</div>
                          <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                          <div class="activity-content">
                            Quia quae rerum
                            <a href="#" class="fw-bold text-dark">explicabo officiis</a>
                            beatae
                          </div>
                        </div>
                        <!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label">56 min</div>
                          <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                          <div class="activity-content">Voluptatem blanditiis blanditiis eveniet</div>
                        </div>
                        <!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label">2 hrs</div>
                          <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                          <div class="activity-content">Voluptates corrupti molestias voluptatem</div>
                        </div>
                        <!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label">1 day</div>
                          <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                          <div class="activity-content">
                            Tempore autem saepe
                            <a href="#" class="fw-bold text-dark">occaecati voluptatem</a>
                            tempore
                          </div>
                        </div>
                        <!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label">2 days</div>
                          <i class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                          <div class="activity-content">Est sit eum reiciendis exercitationem</div>
                        </div>
                        <!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label">4 weeks</div>
                          <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                          <div class="activity-content">Dicta dolorem harum nulla eius. Ut quidem quidem sit quas</div>
                        </div>
                        <!-- End activity item-->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Right side columns -->
              </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h5 class="modal-title modal-center" id="exampleModalLabel">Alasan penolakan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3">
                    <div class="col-md-12">
                      <div class="form-floating">
                        <textarea type="text" class="form-control" id="floatingName" style="height: 100px" placeholder="Your Name"></textarea>
                        <label for="floatingName">Alasan penolakan</label>
                        <ul class="list-group">
                          <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                            Dengan Revisi
                          </li>
                        </ul>
                      </div>
                    </div>
                  </form>
                  <!-- End floating Labels Form -->
                </div>
                <div class="modal-footer">
                  <a href="#" type="button" class="btn btn-primary" data-dismiss="modal">Batal</a>
                  <a href="" type="button" class="btn btn-danger">Tolak</a>
                </div>
              </div>
            </div>
          </div>
      </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
