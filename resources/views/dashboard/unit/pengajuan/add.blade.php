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
                <h1 class="py-5 text-center">Form Pengajuan Pengadaan</h1>

                <form class="row">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <x-elements.input id="inputUnit" value="unit" name="Unit" Placeholder="unit"/>
                        </div>
                        <div class="col-sm-6">
                            <x-elements.input id="inputMerk" value="merk" name="Merk" Placeholder="unit"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <x-elements.input-date id="inputTanggalButuhPengajuan" value="tanggal-butuh-pengajuan" name="Tanggal Butuh Pengajuan" Placeholder="unit"/>
                        </div>
                        <div class="col-sm-6">
                            <x-elements.input id="inputModel" value="model" name="Model" Placeholder="unit"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <x-elements.input id="inputNamaPengadaan" value="nama-pengadaan" name="Nama Pengadaan" Placeholder="unit"/>
                        </div>
                        <div class="col-sm-3">
                            <x-elements.input id="inputJumlahPengadaan" value="jumlah-pengadaan" name="Jumlah Pengadaan" Placeholder="unit"/>
                        </div>
                        <div class="col-sm-3">
                            <x-elements.input id="inputHargaSatuan" value="harga-satuan" name="Harga Satuan" Placeholder="unit"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <x-elements.input-textarea id="inputAlasanPengadaan" value="alasan-pengadaan" name="Alasan Pengadaan" Placeholder="unit"/>
                        </div>
                        <div class="col-sm-6">
                            <x-elements.input-file id="inputMemo" value="memo" name="Memo" Placeholder="unit"/>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-6">
                            <x-elements.input id="inputTotalHarga" value="total-harga" name="total-harga" placeholder="Total Harga" disabled />
                        </div>
                    </div>
                    <div class="d-flex justify-content-center py-3">
                        <div class="col-4 d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary px-4 float-right">Simpan Draf</button>
                        </div>
                        <div class="col-4 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary px-4 float-right">Kirim</button>
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