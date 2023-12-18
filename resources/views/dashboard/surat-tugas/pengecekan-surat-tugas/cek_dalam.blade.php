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
                <h5 class="card-title">Silakan Cek dan Lengkapi Surat Tugas Berikut Ini</h5>

                <!-- General Form Elements -->
                <form method="POST" action="{{ route('pengecekansurtug.update', ['id' => $detailPengecekanSuratTugas->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Nama</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="name"
                            value="{{ $detailPengecekanSuratTugas->name }}"
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
                            value="{{ $detailPengecekanSuratTugas->nip }}"
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
                                <option selected>Pilih golongan</option>
                                <option value="II/A" {{ $detailPengecekanSuratTugas->golongan == 'II/A' ? 'selected' : '' }} >II/A</option>
                                <option value="II/B" {{ $detailPengecekanSuratTugas->golongan == 'II/B' ? 'selected' : '' }} >II/B</option>
                                <option value="II/C" {{ $detailPengecekanSuratTugas->golongan == 'II/C' ? 'selected' : '' }} >II/C</option>
                                <option value="II/D" {{ $detailPengecekanSuratTugas->golongan == 'II/D' ? 'selected' : '' }} >II/D</option>
                                <option value="III/A" {{ $detailPengecekanSuratTugas->golongan == 'III/A' ? 'selected' : '' }} >III/A</option>
                                <option value="III/B" {{ $detailPengecekanSuratTugas->golongan == 'III/B' ? 'selected' : '' }} >III/B</option>
                                <option value="III/C" {{ $detailPengecekanSuratTugas->golongan == 'III/C' ? 'selected' : '' }} >III/C</option>
                                <option value="III/D" {{ $detailPengecekanSuratTugas->golongan == 'III/D' ? 'selected' : '' }} >III/D</option>
                                <option value="IV/A" {{ $detailPengecekanSuratTugas->golongan == 'IV/A' ? 'selected' : '' }} >IV/A</option>
                                <option value="IV/B" {{ $detailPengecekanSuratTugas->golongan == 'IV/B' ? 'selected' : '' }} >IV/B</option>
                                <option value="IV/C" {{ $detailPengecekanSuratTugas->golongan == 'IV/C' ? 'selected' : '' }} >IV/C</option>
                                <option value="IV/D" {{ $detailPengecekanSuratTugas->golongan == 'IV/D' ? 'selected' : '' }}>IV/D</option>
                                <option value="IV/E" {{ $detailPengecekanSuratTugas->golongan == 'IV/E' ? 'selected' : '' }} >IV/E</option>
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
                            value="{{ $detailPengecekanSuratTugas->jabatan }}"
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
                            value="{{ $detailPengecekanSuratTugas->nama_kegiatan }}"
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
                            value="{{ $detailPengecekanSuratTugas->lokasi }}"
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
                                <input name="tanggal_perdin_mulai" type="date" class="form-control1" id="tanggal_mulai" />
                                <h6>s.d.</h6>
                                <input name="tanggal_perdin_selesai" type="date" class="form-control2" id="tanggal_selesai"/>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Ambil data tanggal dari model (misalnya, format 'YYYY-MM-DD')
                        var tanggalMulai = '{{ $detailPengecekanSuratTugas->tanggal_perdin_mulai }}';
                        var tanggalSelesai = '{{ $detailPengecekanSuratTugas->tanggal_perdin_selesai }}';
                    
                        // Set nilai field tanggal menggunakan data dari model
                        document.getElementById('tanggal_mulai').value = tanggalMulai;
                        document.getElementById('tanggal_selesai').value = tanggalSelesai;
                    </script>
                    

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Surat Undangan Tugas</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-info">
                                View Surat Undangan Tugas
                            </button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Penandatanganan</label>
                        <div class="col-sm-10">
                            <input name="tanggal_ttd" type="date" value="{{ $detailPengecekanSuratTugas->tanggal_ttd }}" class="form-control" id="tanggal_ttd"/>
                        </div>
                    </div>
                    
                    <script>
                        // Ambil data tanggal dari model (misalnya, format 'YYYY-MM-DD')
                        var tanggalTtd = '{{ $detailPengecekanSuratTugas->tanggal_ttd }}';
                    
                        // Set nilai field tanggal menggunakan data dari model
                        document.getElementById('tanggal_ttd').value = tanggalTtd;
                    </script>
                    
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jabatan Penandatangan</label>
                        <div class="col-sm-10">
                            <select
                                name="jabatan_pejabat_ttd"
                                class="form-select"
                                aria-label="Default select example"
                            >
                                <option selected>
                                Pilih jabatan pejabat penandatangan
                                </option>
                                <option value="Direktur" {{ $detailPengecekanSuratTugas->jabatan_pejabat_ttd == 'Direktur' ? 'selected' : '' }} >Direktur</option>
                                <option value="Wakil Direktur I" {{ $detailPengecekanSuratTugas->jabatan_pejabat_ttd == 'Wakil Direktur I' ? 'selected' : '' }} >Wakil Direktur I</option>
                                <option value="Wakil Direktur II" {{ $detailPengecekanSuratTugas->jabatan_pejabat_ttd == 'Wakil Direktur II' ? 'selected' : '' }} >Wakil DIrektur II</option>
                                <option value="Wakil Direktur III" {{ $detailPengecekanSuratTugas->jabatan_pejabat_ttd == 'Wakil Direktur III' ? 'selected' : '' }} >Wakil DIrektur III</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Nama Pejabat Penandatangan</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="nama_pejabat_ttd"
                            value="{{ $detailPengecekanSuratTugas->nama_pejabat_ttd }}"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan nama pejabat penandatangan (tanpa gelar)"
                        />
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
                                <option value="0" {{ $detailPengecekanSuratTugas->lampiran == 0 ? 'selected' : '' }} >Tanpa lampiran perjalanan dinas</option>
                                <option value="1" {{ $detailPengecekanSuratTugas->lampiran == 1 ? 'selected' : '' }} >Dengan lampiran perjalanan dinas dalam kota</option>
                                <option value="2" {{ $detailPengecekanSuratTugas->lampiran == 2 ? 'selected' : '' }} >Dengan lampiran perjalanan dinas luar kota</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Gaji Pokok</label
                        >
                        <div class="col-sm-10">
                        <input
                            name=""
                            value="3000000"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan nama pejabat penandatangan (tanpa gelar)"
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Moda Transportasi</label>
                        <div class="col-sm-10">
                            <select name="moda_transportasi" class="form-select" aria-label="Default select example">
                                <option value="" selected>
                                Pilih jenis moda transportasi
                                </option>
                                <option value="Kendaraan dinas" {{ $detailPengecekanSuratTugas->moda_transportasi == 'Kendaraan dinas' ? 'selected' : '' }} >Kendaraan dinas</option>
                                <option value="Kendaraan umum" {{ $detailPengecekanSuratTugas->moda_transportasi == 'Kendaraan umum' ? 'selected' : '' }} >Kendaraan umum</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">
                            Update
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
