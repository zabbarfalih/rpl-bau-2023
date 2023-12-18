<x-dashboard.layouts.layouts :menu="$menu">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    <section class="section">
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Silakan Masukkan Data Anda</h5>

                <!-- General Form Elements -->
                <form method="POST" action="{{ route('pengajuan-surat-tugas.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Nama</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="name"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan nama lengkap dan gelar Anda"
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >NIP</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="nip"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan NIP Anda"
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Golongan</label>
                        <div class="col-sm-10">
                            <select
                                name="golongan"
                                class="form-select"
                                aria-label="Default select example"
                            >
                                <option selected>
                                Pilih golongan
                                </option>
                                <option value="II/A">II/A</option>
                                <option value="II/B">II/B</option>
                                <option value="II/C">II/C</option>
                                <option value="II/D">II/D</option>
                                <option value="III/A">III/A</option>
                                <option value="III/B">III/B</option>
                                <option value="III/C">III/C</option>
                                <option value="III/D">III/D</option>
                                <option value="IV/A">IV/A</option>
                                <option value="IV/B">IV/B</option>
                                <option value="IV/C">IV/C</option>
                                <option value="IV/D">IV/D</option>
                                <option value="IV/E">IV/E</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Jabatan</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="jabatan"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan jabatan Anda sesuai sk penyelenggara akademik"
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Nama Kegiatan</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="nama_kegiatan"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan nama kegiatan"
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Lokasi</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="lokasi"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan lokasi perjalanan dinas (e.g. Surabaya, Jawa Timur)"
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Perjalanan Dinas</label>
                        <div class="col-sm-10">
                            <div class="col-sm-11">
                                <input name="tanggal_perdin_mulai" type="date" class="form-control1" />
                                <h6>s.d.</h6>
                                <input name="tanggal_perdin_selesai" type="date" class="form-control2" />
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label"
                        >Tanggal Penandatanganan
                        </label>
                        <div class="col-sm-10">
                        <input name="tanggal_ttd" type="date" class="form-control" />
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Nama Pejabat Penandatangan</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="nama_pejabat_ttd"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan nama pejabat penandatangan (tanpa gelar)"
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Penandatangan</label>
                        <div class="col-sm-10">
                            <select
                                name="jabatan_pejabat_ttd"
                                class="form-select"
                                aria-label="Default select example"
                            >
                                <option selected>
                                Pilih jabatan pejabat penandatangan
                                </option>
                                <option value="Direktur">Direktur</option>
                                <option value="Wakil Direktur I">Wakil Direktur I</option>
                                <option value="Wakil Direktur II">Wakil Direktur II</option>
                                <option value="Wakil Direktur III">Wakil Direktur III</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Lampiran</label>
                        <div class="col-sm-10">
                            <select
                                name="lampiran"
                                class="form-select"
                                aria-label="Default select example"
                            >
                                <option selected>
                                Pilih jenis lampiran
                                </option>
                                <option value="0">Tanpa lampiran perjalanan dinas</option>
                                <option value="1">Dengan lampiran perjalanan dinas dalam kota</option>
                                <option value="2">Dengan lampiran perjalanan dinas luar kota</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Moda Transportasi</label>
                        <div class="col-sm-10">
                            <select
                                name="moda_transportasi"
                                class="form-select"
                                aria-label="Default select example"
                            >
                                <option value="" selected>
                                Pilih jenis moda transportasi
                                </option>
                                <option value="Kendaraan dinas">Kendaraan dinas</option>
                                <option value="Kendaraan umum">Kendaraan umum</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label"
                        >File Undangan</label
                        >
                        <div class="col-sm-10">
                        <input name="file_path" class="form-control" type="file" id="formFile" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                        </div>
                    </div>
                </form>
                <!-- End General Form Elements -->
            </div>
            </div>
        </div>
        </div>
    </section>
    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
