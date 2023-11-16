<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    <section class="section draft-pengajuan bg-white">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center fw-bold fs-3">Form Pengajuan Pengadaan</h5>

                <!-- General Form Elements -->
                <form>
                   <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Unit</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="Nama Unit" disabled />
                        </div>
                      </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pengadaan</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Pengadaan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Merk</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Model</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Pengadaan</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Upload Memo</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="formFile" />
                    </div>
                </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Alasan Pengadaan</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" style="height:100px"></textarea>
                    </div>
                  </div>
                </form>
                <div class="row mb-3">
                    <div class="text-end"u>
                      <button type="button" class="btn btn-danger" onclick="window.location.href='draft.html'">Batal</button>
                      <button type="submit" class="btn btn-primary" onclick="window.location.href='pengajuan.html'">Kirim</button>
                    </div>
                  </div>
                <!-- End General Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
