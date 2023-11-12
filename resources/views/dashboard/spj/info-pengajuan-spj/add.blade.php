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
                                <x-elements.input id="nama" value="" name="Nama" Placeholder="nama pengaju"/>
                            </div>
                            <div class="col-sm-6">
                                <x-elements.input id="nama_kegiatan" value="" name="Nama Kegiatan" Placeholder="nama kegiatan"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <x-elements.input-date id="tanggal_mulai" value="" name="Tanggal Mulai" Placeholder="tanggal mulai"/>
                            </div>
                            <div class="col-sm-3">
                                <x-elements.input-date id="tanggal_selesai" value="" name="Tanggal Selesai" Placeholder="tanggal selesai"/>
                            </div>
                            <div class="col-sm-6">
                                <x-elements.input-date id="tanggal_pengajuan_spj" value="" name="Tanggal Pengajuan SPJ" Placeholder="tanggal pengajuan"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <x-elements.input id="kategori_spj" value="" name="Kategori SPJ" Placeholder="kategori spj"/>
                            </div>
                            {{-- <div class="col-sm-6">
                                <x-elements.select id="jenis_spj"  name="Jenis SPJ" Placeholder="Jenis SPJ">
                                    <option selected>Pilih jenis SPJ</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </x-elements.select>
                            </div> --}}
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