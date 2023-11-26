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

                    <form action="/dashboard/spj/pengajuan-spj" method="POST" enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Program</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="(054.01.WA)  PROGRAM DUKUNGAN MANAJEMEN"
                                    readonly
                                    name="program"
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Kegiatan</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="(0880)   PENYELENGGARAAN SEKOLAH TINGGI ILMU STATISTIK (STIS)"
                                    readonly
                                    name="kegiatan"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">KRO</label>
                                <div class="col-sm-10">
                                    <input
                                      type="text"
                                      class="form-control"
                                      value="(EBC)    LAYANAN MANAJEMEN SDM INTERNAL"
                                      readonly
                                      name="kro"
                                    />
                                  </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="inputText" class="col-sm-7 col-form-label">Rencana Output</label>
                                </div>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="(U05)    PROGRAM III"
                                    name="rencana_output"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Komponen</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="(052)    PELAKSANAAN PENDIDIKAN"
                                    readonly
                                    name="komponen"
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Akun</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="(521213)    BELANJA HONOR OUTPUT KEGIATAN"
                                    readonly
                                    name="akun"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Periode</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    placeholder="masukkan periode"
                                    name="periode"
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="inputText" class="col-sm-7 col-form-label">Tanggal Kegiatan</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="col-sm-10">
                                        <input type="date" name="tanggal_kegiatan" class="form-control font-form" style="font-size: 16px;"/>
                                      </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Jenis SPJ</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="SPJ Honor Dosen"
                                    readonly
                                    name="jenis_spj"
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="inputText" class="col-sm-12 col-form-label">Bendahara Pengeluaran</label>
                                </div>
                                <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    value="Rina Hardiyanti, SST"
                                    readonly
                                    name="bendahara"
                                />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="inputText" class="col-sm-12 col-form-label">Pejabat Pembuat Komitmen</label>
                                </div>
                                <div class="col-sm-10">
                                <select class="form-select" name="ppk">
                                    <option selected>Pilih Penandatangan</option>
                                    <option value="1">Luci Wulansari</option>
                                    <option value="2">XXX</option>
                                    <option value="3">ZZZ</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-10">
                                    <input
                                      type="hidden"
                                      class="form-control"
                                      value="Menunggu Persetujuan"
                                      readonly
                                      name="status"
                                    />
                                  </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center py-3">
                            <div class="col-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary float-right">Tambahkan Dokumen Excel</button>
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