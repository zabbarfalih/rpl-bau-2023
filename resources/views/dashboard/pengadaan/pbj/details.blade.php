<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
          </svg>
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
                                            <option selected>Unit</option>
                                            <option>PBJ</option>
                                            <option>PPK</option>
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
                    <a href="#" type="submit" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#selesaiModal">Selesai</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title modal-center" id="exampleModalLabel">
                            Konfirmasi
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin?
                        <!-- End floating Labels Form -->
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
