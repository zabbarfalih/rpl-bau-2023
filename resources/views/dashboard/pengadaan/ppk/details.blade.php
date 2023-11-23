<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>


    <section class="section dashboard">
        <div class="container">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Laporan Dokumen</h5>
                                <div class="row mb-3">
                                    <label for="inputNamaUnit" class="col-sm-2 col-form-label">Nama Unit</label>
                                    <div class="col-sm-10">
                                        <select id="inputNamaUnit" class="form-select">
                                            <option selected>Unit A</option>
                                            <option>Unit B</option>
                                            <option>Unit C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:" width="16"
                                        height="16">
                                        <use xlink:href="#info-fill" />
                                    </svg>
                                    <div>
                                        Untuk mengunduh format laporan,
                                        silahkan tekan download template
                                    </div>
                                </div>
                                <!-- List group with Advanced Contents -->
                                <div class="d-flex align-items-start">
                                    <h4 class="alert-heading">
                                        Dokumen KAK
                                    </h4>
                                    <a href="#" class="btn-link btn-sm ms-2" id="download-template">Download
                                        Template</a>
                                </div>

                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <div class="file-upload-wrapper">
                                        <input type="file" id="input-file-now" class="file-upload"
                                            onchange="handleFileChange()" />
                                        <button class="btn btn-danger btn-sm ms-2" id="remove-file"
                                            style="display:none;" onclick="removeFile()">Remove</button>
                                    </div>
                                </div>

                                <script>
                                    function handleFileChange() {
                                        // Ambil elemen input file
                                        var inputFile = document.getElementById('input-file-now');

                                        // Ambil elemen tombol remove
                                        var removeButton = document.getElementById('remove-file');

                                        // Tampilkan tombol remove dan sembunyikan tombol download template
                                        removeButton.style.display = 'inline-block';
                                        document.getElementById('download-template').style.display = 'none';

                                        // Disable input file setelah file dipilih (opsional)
                                        inputFile.disabled = true;
                                    }

                                    function removeFile() {
                                        // Ambil elemen input file
                                        var inputFile = document.getElementById('input-file-now');

                                        // Ambil elemen tombol remove
                                        var removeButton = document.getElementById('remove-file');

                                        // Sembunyikan tombol remove dan tampilkan tombol download template
                                        removeButton.style.display = 'none';
                                        document.getElementById('download-template').style.display = 'inline-block';

                                        // Reset nilai input file dan aktifkan kembali
                                        inputFile.value = '';
                                        inputFile.disabled = false;
                                    }
                                </script>

                                <div class="d-flex align-items-start">
                                    <h4 class="alert-heading">
                                        Dokumen KAK 2
                                    </h4>
                                    <a href="#" class="btn-link btn-sm ms-2" id="download-template-2">Download
                                        Template</a>
                                </div>

                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <div class="file-upload-wrapper">
                                        <input type="file" id="input-file-now-2" class="file-upload"
                                            onchange="handleFileChange2()" />
                                        <button class="btn btn-danger btn-sm ms-2" id="remove-file-2"
                                            style="display:none;" onclick="removeFile2()">Remove</button>
                                    </div>
                                </div>

                                <script>
                                    function handleFileChange2() {
                                        var inputFile = document.getElementById('input-file-now-2');
                                        var removeButton = document.getElementById('remove-file-2');

                                        // Tampilkan tombol remove dan sembunyikan tombol download template
                                        removeButton.style.display = 'inline-block';
                                        document.getElementById('download-template-2').style.display = 'none';

                                        // Disable input file setelah file dipilih (opsional)
                                        inputFile.disabled = true;
                                    }

                                    function removeFile2() {
                                        var inputFile = document.getElementById('input-file-now-2');
                                        var removeButton = document.getElementById('remove-file-2');

                                        // Sembunyikan tombol remove dan tampilkan kembali tombol download template
                                        removeButton.style.display = 'none';
                                        document.getElementById('download-template-2').style.display = 'inline-block';

                                        // Reset nilai input file dan aktifkan kembali
                                        inputFile.value = '';
                                        inputFile.disabled = false;
                                    }
                                </script>

                                <div class="d-flex align-items-start">
                                    <h4 class="alert-heading">
                                        Dokumen KAK 3
                                    </h4>
                                    <a href="#" class="btn-link btn-sm ms-2" id="download-template-3">Download
                                        Template</a>
                                </div>

                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <div class="file-upload-wrapper">
                                        <input type="file" id="input-file-now-3" class="file-upload"
                                            onchange="handleFileChange3()" />
                                        <button class="btn btn-danger btn-sm ms-2" id="remove-file-3"
                                            style="display:none;" onclick="removeFile3()">Remove</button>
                                    </div>
                                </div>

                                <script>
                                    function handleFileChange3() {
                                        var inputFile = document.getElementById('input-file-now-3');
                                        var removeButton = document.getElementById('remove-file-3');

                                        // Tampilkan tombol remove dan sembunyikan tombol download template
                                        removeButton.style.display = 'inline-block';
                                        document.getElementById('download-template-3').style.display = 'none';

                                        // Disable input file setelah file dipilih (opsional)
                                        inputFile.disabled = true;
                                    }

                                    function removeFile3() {
                                        var inputFile = document.getElementById('input-file-now-3');
                                        var removeButton = document.getElementById('remove-file-3');

                                        // Sembunyikan tombol remove dan tampilkan kembali tombol download template
                                        removeButton.style.display = 'none';
                                        document.getElementById('download-template-3').style.display = 'inline-block';

                                        // Reset nilai input file dan aktifkan kembali
                                        inputFile.value = '';
                                        inputFile.disabled = false;
                                    }
                                </script>
                                <!-- End List group Advanced Content -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
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
                            <h5 class="card-title">
                                Recent Activity <span>| Today</span>
                            </h5>

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
                                    <div class="activity-content">
                                        Voluptatem blanditiis blanditiis
                                        eveniet
                                    </div>
                                </div>
                                <!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 hrs</div>
                                    <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                                    <div class="activity-content">
                                        Voluptates corrupti molestias
                                        voluptatem
                                    </div>
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
                                    <div class="activity-content">
                                        Est sit eum reiciendis
                                        exercitationem
                                    </div>
                                </div>
                                <!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        4 weeks
                                    </div>
                                    <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                    <div class="activity-content">
                                        Dicta dolorem harum nulla eius. Ut
                                        quidem quidem sit quas
                                    </div>
                                </div>
                                <!-- End activity item-->
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Activity -->
                </div>
                <!-- End Right side columns -->

                <div class="text-center">
                    <a href="#" type="submit" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#tolakModal">Tolak</a>
                    <a href="#" type="submit" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#setujuModal">Setuju</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title modal-center fw-bolder" id="exampleModalLabel">Alasan Penolakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Alasan Penolakan</label>
                        </div>

                        <div class="col-12 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" />
                                <label class="form-check-label" for="gridCheck">
                                    Dengan revisi
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" type="button" class="btn btn-primary" data-dismiss="modal">Batal</a>
                        <a href="" type="button" class="btn btn-danger">Tolak</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="setujuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title modal-center fw-bolder" id="exampleModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ?
                    </div>
                    <div class="modal-footer">
                        <a href="#" type="button" class="btn btn-primary" data-dismiss="modal">Batal</a>
                        <a href="" type="button" class="btn btn-success">Yakin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
