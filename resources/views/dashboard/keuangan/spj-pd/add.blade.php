<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>
    <style>
        .readonly-field {
            background-color: #cacaca; 
        }
    </style>

    <section class="section draft-pengajuan bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="py-5 text-center">Silakan isi formulir</h1>

                    <form action="/dashboard/spj/pengajuan-perjalanan-dinas" method="POST" enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control"
                                    name="judul"
                                    placeholder="BIAYA PERJALANAN DINAS DALAM RANGKA ......"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Program</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control readonly-field"
                                    value="(054.01.01) Program Dukungan Manajemen"
                                    readonly
                                    name="program"
                                    />
                                </div>
                            </div>
                        <div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Kegiatan</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control readonly-field"
                                    value="(2888) Penyelenggaraan Sekolah Tinggi Ilmu Statistik"
                                    readonly
                                    name="kegiatan"
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">KRO/RO</label>
                                <div class="col-sm-10">
                                    <input
                                      type="text"
                                      class="form-control readonly-field"
                                      value="(2888.968) Layanan Pendidikan Kedinasan"
                                      readonly
                                      name="kro"
                                    />
                                  </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="inputText" class="col-sm-7 col-form-label">Komponen</label>
                                </div>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control readonly-field"
                                    value="(051) Tanpa Komponen"
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
                                    class="form-control readonly-field"
                                    value="(524111) Belanja Perjalanan Dinas Biasa"
                                    readonly
                                    name="akun"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="inputText" class="col-sm-12 col-form-label">Bendahara Pengeluaran</label>
                                </div>
                                <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control readonly-field"
                                    value="Rina Hardiyanti, SST"
                                    readonly
                                    name="bendahara"
                                />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-2 col-form-label">Jenis SPJ</label>
                                <div class="col-sm-10">
                                    <input
                                    type="text"
                                    class="form-control readonly-field"
                                    value="SPJ Perjalanan Dinas"
                                    readonly
                                    name="jenis_spj"
                                    required
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
                                <select class="form-select" name="ppk" required>
                                    <option selected>Pilih Penandatangan</option>
                                    <option value="Luci Wulansari, S.Si, MSE.">Luci Wulansari, S.Si, MSE.</option>
                                    <option value="Nurseto Wisnumurti, S.Si., M.Stat.">Nurseto Wisnumurti, S.Si., M.Stat.</option>
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
                            <div class="col-sm-6">
                                <label for="inputText" class="col-sm-7 col-form-label">Tanggal Tugas</label>
                                <div class="col-sm-10">
                                    <div class="col-sm-10">
                                        <input type="date" name="tanggal_tugas" class="form-control font-form" style="font-size: 16px;"required/>
                                      </div>
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