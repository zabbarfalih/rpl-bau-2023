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
                <h1 class="py-5 text-center">Form Pengajuan SKP</h1>

                <form class="row">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <x-elements.input id="inputNama" value="nama" name="Nama" placeholder="Nama"/>
                            {{-- option --}}
                        </div>
                        <div class="col-sm-6">
                            <x-elements.input id="inputNIP" value="nip" name="NIP" placeholder="NIP"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <x-elements.input-date id="inputBulanDasarSKP" value="bulan-dasar-skp" name="Bulan Dasar" placeholder="Bulan Dasar"/>
                        </div>
                        <div class="col-sm-6">
                            <x-elements.input id="inputJenisPenghasilan" value="jenispenghasilan" name="jenispenghasilan" placeholder="JenisPenghasilan"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <x-elements.input id="inputKeperluan" value="keperluan" name="Keperluan" placeholder="Keperluan Pengajuan"/>
                        </div>
                        <div class="col-sm-6">
                            <x-elements.input-file id="inputBukti" value="bukti" name="Bukti" placeholder="Bukti Keperluan"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center py-3">
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