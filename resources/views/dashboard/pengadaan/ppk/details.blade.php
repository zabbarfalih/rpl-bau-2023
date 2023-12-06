
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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
                                            <form id="uploadForm" method="post" enctype="multipart/form-data" action="{{ route('upload.dokumen') }}">
                                                @csrf
                                                <input type="hidden" name="jenisDokumen" id="jenisDokumen" value="">
                                                <input type="hidden" name="dokumenId" id="dokumenId" value="{{$dokumenPengadaans->id}}">
                                                <div class="modal-body">
                                                    <div class="alert alert-secondary alert-dismissible fade show"
                                                        role="alert">
                                                        <div class="file-upload-wrapper d-inline-flex">
                                                            <input type="file" class="file-upload"
                                                                name="uploadedFile" />
                                                            <button class="btn btn-danger btn-sm ms-2"
                                                                style="display:none;">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary btn-sm ms-2">Upload</button>
                                                </div>
                                            </form>

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
                                                    <th scope="col" class="text-center align-middle">
                                                        Action
                                                    </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                @php $no = 1; @endphp
                                                @if($statusesWithDates->has('Diterima PPK'))
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen KAK
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                        </a>
                                                    </td>

                                                    <td class="text-center align-middle">

                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans && $dokumenPengadaans->dokumen_perencanaan_pengadaan)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_perencanaan_pengadaan) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Memo
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">

                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">

                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans && $dokumenPengadaans->dokumen_perencanaan_pengadaan)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_perencanaan_pengadaan) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                        </tbody>
                                    </table>
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
                                                    <th scope="col" class="text-center align-middle">
                                                        Action
                                                    </th>
                                            </tr>
                                        </thead>

                                            <tbody>
                                                @php $no = 1; @endphp
                                                @if($statusesWithDates->has('Diterima PPK'))
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Identifikasi Kebutuhan
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>

                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_identifikasi_kebutuhan))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="identifikasiKebutuhan" data-nama-dokumen="Dokumen Identifikasi Kebutuhan">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="identifikasiKebutuhan" data-nama-dokumen="Dokumen Identifikasi Kebutuhan">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_identifikasi_kebutuhan)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_identifikasi_kebutuhan) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Perencanaan Pengadaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_perencanaan_pengadaan))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="perencanaanPengadaan" data-nama-dokumen="Dokumen Perencanaan Pengadaan">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="perencanaanPengadaan" data-nama-dokumen="Dokumen Perencanaan Pengadaan">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans && $dokumenPengadaans->dokumen_perencanaan_pengadaan)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_perencanaan_pengadaan) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($statusesWithDates->has('Diproses'))
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen HPS
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_hps))
                                                        <button type="button"
                                                        class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                        data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="hps" data-nama-dokumen="Dokumen HPS">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="hps" data-nama-dokumen="Dokumen HPS">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_hps)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_hps) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Nota Dinas
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_nota_dinas))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="notaDInas" data-nama-dokumen="Dokumen Nota Dinas">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="notaDInas" data-nama-dokumen="Dokumen Nota Dinas">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_nota_dinas)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_nota_dinas) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($statusesWithDates->has('Dilaksanakan') && $pengadaan->penyelenggara == 4)
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Undangan
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_undangan))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="undangan" data-nama-dokumen="Dokumen Undangan">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="undangan" data-nama-dokumen="Dokumen Undangan">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_undangan)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_undangan) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen SSUK SSKK
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_ssuk_sskk))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="ssuk_sskk" data-nama-dokumen="Dokumen SSUK SSKK">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="ssuk_sskk" data-nama-dokumen="Dokumen SSUK SSKK">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&
                                                        $dokumenPengadaans->dokumen_ssuk_sskk)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_ssuk_sskk) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen IKP
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_ikp))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="ikp" data-nama-dokumen="Dokumen IKP">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="ikp" data-nama-dokumen="Dokumen IKP">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_ikp)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_ikp) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen LDP dan Spesifikasi
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_ldp_dan_spesifikasi))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="ldpDanSpesifikasi" data-nama-dokumen="Dokumen LDP dan Spesifikasi">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="ldpDanSpesifikasi" data-nama-dokumen="Dokumen LDP dan Spesifikasi">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_ldp_dan_spesifikasi)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_ldp_dan_spesifikasi) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Penawaran
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_penawaran_pakta_formulir))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="penawaranPaktaFormulir" data-nama-dokumen="Dokumen Penawaran Pakta FOrmulir">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="penawaranPaktaFormulir" data-nama-dokumen="Dokumen Penawaran Pakta FOrmulir">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_penawaran_pakta_formulir)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_penawaran_pakta_formulir) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Surat Permintaan
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_surat_permintaan))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="suratPermintaan" data-nama-dokumen="Dokumen Surat Permintaan">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="suratPermintaan" data-nama-dokumen="Dokumen Surat Permintaan">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_surat_permintaan)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_surat_permintaan) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen Pengadaan Langsung
                                                    </td>

                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_pengadaan_langsung))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="pengadaanLangsung" data-nama-dokumen="Dokumen Pengadaan Langsung">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="pengadaanLangsung" data-nama-dokumen="Dokumen Pengadaan Langsung">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_pengadaan_langsung)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_pengadaan_langsung) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($statusesWithDates->has('Selesai'))
                                                <tr>
                                                    <td class="text-center fw-bold align-middle">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="fw-bold align-middle text-wrap">
                                                        Dokumen BAST
                                                    </td>
                                                    <td class="text-wrap">
                                                        <a href="{{ route('template.download', ['filename' => 'KAK']) }}">
                                                            Template
                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if ($dokumenPengadaans && is_null($dokumenPengadaans->dokumen_bast))
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white"
                                                            data-bs-toggle="modal" data-bs-target="#uploadFileModal" data-jenis="bast" data-nama-dokumen="Dokumen BAST">
                                                            Upload
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn-upload btn-sibau-dashboard btn btn-primary rounded-pill fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editFileModal" data-jenis="bast" data-nama-dokumen="Dokumen BAST">
                                                            Edit
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dokumenPengadaans &&$dokumenPengadaans->dokumen_bast)
                                                        <a href="{{ Storage::url($dokumenPengadaans->dokumen_bast) }}"
                                                            class="btn-sibau-dashboard btn btn-success rounded-pill fw-bold text-white">
                                                            Download
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                        </tbody>
                                    </table>

                                    <div class="text-center">
                                    @if(!$statusesWithDates->has('Ditolak'))
                                        @if($statusesWithDates->has('Diproses') && (!($statusesWithDates->has('Dilaksanakan'))) )
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#setujuModalKhusus">Selesai</a>
                                        @else
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#setujuModalL">Selesai</a>
                                        @endif
                                    @endif
                                    </div>


                                    <div class="modal fade" id="setujuModalL" aria-hidden="true"
                                        data-bs-keyboard="false" data-bs-backdrop="static"
                                        aria-labelledby="setujuModalKhususLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
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

                                </div>

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
                        {{-- <div class="filter">
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
                        </div> --}}

                        <div class="card-body">
                            <h5 class="card-title">
                                Status Dokumen
                                {{-- <span>| Today</span> --}}
                            </h5>

                            <div class="activity">

                                @if($statusesWithDates->has('Diajukan'))
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{$statusesWithDates->get('Diajukan')}}</div>
                                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                    <div class="activity-content">
                                        Diajukan
                                    </div>
                                </div>
                                <!-- End activity item-->
                                @if($statusesWithDates->has('Diterima PPK'))
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{$statusesWithDates->get('Diterima PPK')}}</div>
                                    <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                                    <div class="activity-content">
                                        Voluptatem blanditiis blanditiis
                                        eveniet
                                    </div>
                                </div>
                                <!-- End activity item-->
                                @if($statusesWithDates->has('Diproses'))
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{$statusesWithDates->get('Diproses')}}</div>
                                    <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                                    <div class="activity-content">
                                        Voluptates corrupti molestias
                                        voluptatem
                                    </div>
                                </div>
                                <!-- End activity item-->
                                @if($statusesWithDates->has('Dilaksanakan'))
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{$statusesWithDates->get('DIlaksanakan')}}</div>
                                    <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                                    <div class="activity-content">
                                        Tempore autem saepe
                                        <a href="#" class="fw-bold text-dark">occaecati voluptatem</a>
                                        tempore
                                    </div>
                                </div>
                                <!-- End activity item-->
                                @if($statusesWithDates->has('Selesai'))
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{$statusesWithDates->get('Selesai')}}</div>
                                    <i class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                                    <div class="activity-content">
                                        Est sit eum reiciendis
                                        exercitationem
                                    </div>
                                </div>
                                <!-- End activity item-->
                                @if($statusesWithDates->has('Diserahkan'))
                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        {{$statusesWithDates->get('Diserahkan')}}
                                    </div>
                                    <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                    <div class="activity-content">
                                        Dicta dolorem harum nulla eius. Ut
                                        quidem quidem sit quas
                                    </div>
                                </div>
                                @endif
                                @endif
                                @endif
                                @endif
                                @endif
                                @endif
                                <!-- End activity item-->
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Activity -->
                </div>
                <!-- End Right side columns -->
                @if($statusesWithDates->has('Diajukan') && (!$statusesWithDates->has('Diterima PPK') && !$statusesWithDates->has('Ditolak')))
                <div class="text-center">
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#tolakModal">Tolak</a>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#setujuModal">Setuju</a>
                </div>
                @endif

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

    </section>

    <x-slot name="js_body">
        <script src="{{ asset('assets/js/script.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.layouts>
