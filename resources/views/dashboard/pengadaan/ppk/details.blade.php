<x-dashboard.layouts.layouts :menu="$menu">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
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
                                            @foreach ($roles->where('id', '!=', 2) as $role)
                                                <option>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Modal untuk Upload File --}}
                                <div class="modal fade" id="uploadFileModal" tabindex="-1"
                                    data-bs-backdrop="static" aria-labelledby="uploadModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="margin: 10px;"> <!-- Atur margin di sini -->
                                            <div class="modal-header">
                                                <h4 class="alert-heading">Dokumen [documents name]</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-secondary alert-dismissible fade show"
                                                    role="alert">
                                                    <div class="file-upload-wrapper">
                                                        <input type="file" class="file-upload"
                                                            name="uploadedFile[]" />
                                                        <button class="btn btn-danger btn-sm ms-2"
                                                            style="display:none;">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="#" type="button" class="btn btn-primary">Upload</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- End Modal Upload File --}}

                                {{-- tampilan unit --}}
                                <div id="dokumen-unit">
                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"
                                            width="16" height="16">
                                            <use xlink:href="#info-fill" />
                                        </svg>
                                        <div>Untuk mengunduh format laporan, silakan tekan download</div>
                                    </div>
                                    <p>Setelah UNIT mengajukan (saat ini status diajukan)</p>
                                    <table class="table table-hover display responsive nowrap table-striped font-body-table"
                                        style="width: 100%" {{-- id="table-bau" --}}>
                                        <thead class="header-table">
                                            <tr>
                                                <th scope="col" class="text-center align-middle">
                                                    No
                                                </th>

                                                <th scope="col" class="text-center align-middle text-wrap">
                                                    Nama Dokumen
                                                </th>

                                                <th scope="col" class="text-center align-middle text-wrap">
                                                    Template
                                                </th>
                                                <th scope="col" class="text-center align-middle">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="text-center fw-bold align-middle">
                                                    1
                                                </td>
                                                <td class="fw-bold align-middle text-wrap">
                                                    Dokumen KAK
                                                </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center fw-bold align-middle">
                                                    2
                                                </td>
                                                <td class="fw-bold align-middle text-wrap">
                                                    Dokumen Memo
                                                </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#setujuModal">Selesai</a>
                                    </div>
                                    <div class="modal fade" id="setujuModal" data-bs-backdrop="static" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title modal-center fw-bolder" id="exampleModalLabel">
                                                        Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</a>
                                                    <a href="" type="button" class="btn btn-success">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- tampilan ppk --}}

                                <div id="dokumen-ppk">
                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"
                                            width="16" height="16">
                                            <use xlink:href="#info-fill" />
                                        </svg>
                                        <div>Untuk mengunduh format laporan, silakan tekan download</div>
                                    </div>
                                    <p>Setelah PPK menyetujui (saat ini status disetujui)</p>
                                    <table class="table table-hover display responsive nowrap table-striped font-body-table"
                                        style="width: 100%" {{-- id="table-bau" --}}>
                                        <thead class="header-table">
                                            <tr>
                                                <th scope="col" class="text-center align-middle">
                                                    No
                                                </th>

                                                <th scope="col" class="text-center align-middle text-wrap">
                                                    Nama Dokumen
                                                </th>

                                                <th scope="col" class="text-center align-middle text-wrap">
                                                    Template
                                                </th>
                                                <th scope="col" class="text-center align-middle">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="text-center fw-bold align-middle">
                                                    3
                                                </td>
                                                <td class="fw-bold align-middle text-wrap">
                                                    Dokumen Identifikasi Kebutuhan
                                                </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                        data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                        Upload
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center fw-bold align-middle">
                                                    4
                                                </td>
                                                <td class="fw-bold align-middle text-wrap">
                                                    Dokumen Perencanaan Pengadaan
                                                </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                        data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                        Upload
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#setujuModalKhusus">Selesai</a>
                                    </div>
                                    <div class="modal fade" id="setujuModalKhusus" aria-hidden="true"
                                        data-bs-keyboard="false" data-bs-backdrop="static"
                                        aria-labelledby="setujuModalKhususLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Pelaksana
                                                        Pengadaan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body mb-3">
                                                    Siapa yang akan melaksanakan Pengadaan ini?
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-primary me-2" data-bs-dismiss="modal"
                                                        data-bs-target="#setujuModalKhusus2"
                                                        data-bs-toggle="modal">PPK</button>
                                                    <button class="btn btn-primary" data-bs-dismiss="modal"
                                                        data-bs-target="#setujuModalKhusus2"
                                                        data-bs-toggle="modal">PPBJ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="setujuModalKhusus2" aria-hidden="true"
                                        data-bs-keyboard="false" data-bs-backdrop="static"
                                        aria-labelledby="setujuModalKhususLabel2" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Konfirmasi
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body mb-3">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" type="button" class="btn btn-secondary"
                                                        data-bs-target="#setujuModalKhusus"
                                                        data-bs-toggle="modal">Kembali</a>
                                                    <a href="" type="button" class="btn btn-success">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p>Setelah diproses (saat ini status diproses)</p>
                                    <table
                                        class="table table-hover display responsive nowrap table-striped font-body-table"
                                        style="width: 100%" {{-- id="table-bau" --}}>
                                        <thead class="header-table">
                                            <tr>
                                                <th scope="col" class="text-center align-middle">
                                                    No
                                                </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Nama Dokumen
                                                    </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Template
                                                    </th>
                                                    <th scope="col" class="text-center align-middle">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        1
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen KAK
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        2
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Memo
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        3
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Identifikasi Kebutuhan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        4
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Perencanaan Pengadaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        5
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen HPS
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                            Upload
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        6
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Nota Dinas
                                                    </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                        data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                        Upload
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#setujuModal">Selesai</a>
                                    </div>
                                    <div class="modal fade" id="setujuModal" data-bs-backdrop="static" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title modal-center fw-bolder" id="exampleModalLabel">
                                                        Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</a>
                                                    <a href="" type="button" class="btn btn-success">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p>Setelah dilaksanakan (saat ini status dilaksanakan)</p>
                                    <table
                                        class="table table-hover display responsive nowrap table-striped font-body-table"
                                        style="width: 100%" {{-- id="table-bau" --}}>
                                        <thead class="header-table">
                                            <tr>
                                                <th scope="col" class="text-center align-middle">
                                                    No
                                                </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Nama Dokumen
                                                    </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Template
                                                    </th>
                                                    <th scope="col" class="text-center align-middle">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        1
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen KAK
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        2
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Memo
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        3
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Identifikasi Kebutuhan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        4
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Perencanaan Pengadaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        5
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen HPS
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        6
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Nota Dinas
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        7
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Undangan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                            Upload
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        8
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen SSUK SSKK
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                            Upload
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        9
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen IKP
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                            Upload
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        10
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen LDP dan Spesifikasi
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                            Upload
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        11
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Penawaran
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                            Upload
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        12
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Surat Permintaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                            Upload
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        13
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Pengadaan Langsung
                                                    </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                        data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                        Upload
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#setujuModal">Selesai</a>
                                    </div>
                                    <div class="modal fade" id="setujuModal" data-bs-backdrop="static" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title modal-center fw-bolder" id="exampleModalLabel">
                                                        Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</a>
                                                    <a href="" type="button" class="btn btn-success">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p>Setelah Selesai (saat ini status selesai)</p>
                                    <table
                                        class="table table-hover display responsive nowrap table-striped font-body-table"
                                        style="width: 100%" {{-- id="table-bau" --}}>
                                        <thead class="header-table">
                                            <tr>
                                                <th scope="col" class="text-center align-middle">
                                                    No
                                                </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Nama Dokumen
                                                    </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Template
                                                    </th>
                                                    <th scope="col" class="text-center align-middle">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        1
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen KAK
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        2
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Memo
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        3
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Identifikasi Kebutuhan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        4
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Perencanaan Pengadaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        5
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen HPS
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        6
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Nota Dinas
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        7
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Undangan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        8
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen SSUK SSKK
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        9
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen IKP
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        10
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen LDP dan Spesifikasi
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        11
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Penawaran
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        12
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Surat Permintaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        13
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Pengadaan Langsung
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        14
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen BAST
                                                    </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                        data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                                                        Upload
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#setujuModal">Selesai</a>
                                    </div>
                                    <div class="modal fade" id="setujuModal" data-bs-backdrop="static" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title modal-center fw-bolder" id="exampleModalLabel">
                                                        Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</a>
                                                    <a href="" type="button" class="btn btn-success">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p>Setelah Diserahkan (saat ini status diserahkan)</p>
                                    <table
                                        class="table table-hover display responsive nowrap table-striped font-body-table"
                                        style="width: 100%" {{-- id="table-bau" --}}>
                                        <thead class="header-table">
                                            <tr>
                                                <th scope="col" class="text-center align-middle">
                                                    No
                                                </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Nama Dokumen
                                                    </th>

                                                    <th scope="col" class="text-center align-middle text-wrap">
                                                        Template
                                                    </th>
                                                    <th scope="col" class="text-center align-middle">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        1
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen KAK
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        2
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Memo
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        3
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Identifikasi Kebutuhan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        4
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Perencanaan Pengadaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        5
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen HPS
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        6
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Nota Dinas
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        7
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Undangan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        8
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen SSUK SSKK
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        9
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen IKP
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        10
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen LDP dan Spesifikasi
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        11
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Penawaran
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        12
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Surat Permintaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        13
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Pengadaan Langsung
                                                    </td>

                                                    <td class="text-wrap">
                                                        Template
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        14
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen BAST
                                                    </td>

                                                <td class="text-wrap">
                                                    Template
                                                </td>
                                                <td class="text-center align-middle">
                                                    </button>
                                                    <button type="button"
                                                        class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                        Download
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#setujuModal">Selesai</a>
                                    </div>
                                    <div class="modal fade" id="setujuModal" data-bs-backdrop="static" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title modal-center fw-bolder" id="exampleModalLabel">
                                                        Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</a>
                                                    <a href="" type="button" class="btn btn-success">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal untuk Upload File --}}
                                    <div class="modal fade" id="uploadFileModal" tabindex="-1"
                                        data-bs-backdrop="static" aria-labelledby="uploadModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="margin: 10px;"> <!-- Atur margin di sini -->
                                                <div class="modal-header">
                                                    <h4 class="alert-heading">Dokumen [documents name]</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-secondary alert-dismissible fade show"
                                                        role="alert">
                                                        <div class="file-upload-wrapper d-inline-flex">
                                                            <input type="file" class="file-upload"
                                                                name="uploadedFile[]" />
                                                            <button class="btn btn-danger btn-sm ms-2"
                                                                style="display:none;">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <a href="#" type="button" class="btn btn-primary">Upload</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    {{-- End Modal Upload File --}}

                                {{-- tampilan pbj --}}
                                <!-- Kalau diserahkan ke PBJ -->

                                {{-- tampilan pbj --}}
                                <div id="dokumen-pbj">
                                    
                                </div>
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
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#tolakModal">Tolak</a>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#setujuModal">Setuju</a>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <div class="modal fade" id="setujuModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <script src="{{ asset('assets/js/script.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.layouts>
