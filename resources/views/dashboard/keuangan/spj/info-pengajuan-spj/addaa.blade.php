<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    <section class="section draft-pengajuan bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="py-5 text-center">Silakan isi formulir</h1>

                    <form class="row">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label" id="nama" name="Nama">Pengaju</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Masukkan nama lengkap pengaju SPJ"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label" id="nama_kegiatan" name="Nama Kegiatan">Nama Kegiatan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Masukkan nama kegiatan surat"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputDate" class="col-sm-2 col-form-label" id="tanggal_mulai" name="Tanggal Mulai">Tanggal Mulai</label>
                                <input type="date" class="form-control1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputDate" class="col-sm-2 col-form-label" id="tanggal_selesai" name="Tanggal Selesai">Tanggal Selesai</label>
                                <input type="date" class="form-control1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputDate" class="col-sm-2 col-form-label" id="tanggal_pengajuan_spj" name="Tanggal Pengajuan SPJ">Tanggal Selesai</label>
                                <input type="date" class="form-control1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-2 col-form-label">Jenis SPJ</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih jenis SPJ</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title">Download Template</h5>
                                    <p class="card-text">Download template SPJ lalu isi sesuai dengan yang diminta</p>
                                    <p class="card-text"><a href="#" class="btn btn-primary rounded-pill">Download</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title">Upload Template</h5>
                                    <p class="card-text">Upload template SPJ yang sudah siap dicetak dalam format excel</p>
                                    <p class="card-text"><a href="#" class="btn btn-primary rounded-pill">Upload</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title">Prreview Template</h5>
                                    <p class="card-text">Pastikan dokumen yang dikirim sudah benar</p>
                                    <p class="card-text"><a href="#" class="btn btn-danger rounded-pill">Preview Dokumen</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center py-3">
                            <div class="col-4 d-flex justify-content-center">
                                <button type="button" class="btn btn-primary px-4 float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
      
    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>