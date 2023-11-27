<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form-bau.css') }}">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    <section class="section draft-pengajuan">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title fw-bold fs-3 text-center">Form Pengajuan Pengadaan</h5>
                      <br>

                      <!-- General Form Elements -->
                      <form class="font-form fw-bold">
                        <div class="row mb-3">
                          <label for="inputNamaUnit" class="col-sm-2 col-form-label">Nama Unit</label>
                          <div class="col-sm-10">
                            <select id="inputNamaUnit" class="form-select font-form">
                              <option selected>Choose...</option>
                              <option>Unit A</option>
                              <option>Unit B</option>
                              <option>Unit C</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Nama Paket Pengadaan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pengadaan</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control font-form" />
                          </div>
                        </div>

                        <div class="mb-1">
                          <a href="" class="btn-link btn-sm fw-normal"><small>Unduh Template Dokumen KAK</small></a>
                        </div>

                        <div class="row mb-3">
                          <label for="inputNumber" class="col-sm-2 col-form-label">Upload Dokumen KAK </label>
                          <div class="col-sm-10">
                            <input class="form-control font-form" type="file" id="formFile" />
                          </div>
                        </div>

                        <div class="mb-1">
                          <a href="" class="btn-link btn-sm fw-normal"><small>Unduh Template Memo</small></a>
                        </div>

                        <div class="row mb-3">
                          <label for="inputNumber" class="col-sm-2 col-form-label">Upload Memo</label>
                          <div class="col-sm-10">
                            <input class="form-control font-form" type="file" id="formFile" />
                          </div>
                        </div>
                      </form>
                      <div class="row mb-3">
                        <div class="text-end">
                          <button type="button" class="btn btn-danger" onclick="window.location.href='{{route('pengajuan.index')}}'">Batal</button>
                          <button type="submit" class="btn btn-primary" onclick="window.location.href='pengajuan-unit.html'">Kirim</button>
                        </div>
                      </div>
                      <!-- End General Form Elements -->
                    </div>
                  </div>
                </div>
              </div>
        </div>

      </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
