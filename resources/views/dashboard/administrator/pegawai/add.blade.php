<x-dashboard.layouts.layouts :menu="$menu">
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
                      <h5 class="card-title fw-bold fs-3 text-center">Form Pembuatan Akun Pegawai</h5>
                      <br>

                      <!-- General Form Elements -->
                      <form class="font-form fw-bold">                    
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Nama Pegawai</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">NIP</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputRolePegawai" class="col-sm-2 col-form-label">Role</label>
                          <div class="col-sm-10 d-inline-flex fw-normal">
                            <div class="me-5">
                              <input type="checkbox" name="role1" id="role1" value="Unit">
                              <label for="role1"> Unit</label>
                            </div>
                            <div class="me-5">
                              <input type="checkbox" name="role2" id="role2" value="Admin">
                              <label for="role2"> Admin</label>
                            </div>
                            <div class="me-5">
                              <input type="checkbox" name="role3" id="role3" value="PBJ">
                              <label for="role3"> PBJ</label>
                            </div>
                            <div class="me-5">
                              <input type="checkbox" name="role4" id="role4" value="PPK">
                              <label for="role4"> PPK</label>
                            </div>                  
                          </div>
                        </div>
                      </form>
                      <div class="row mb-3">
                        <div class="text-end">
                          <button type="button" class="btn btn-danger" onclick="window.location.href='{{route('admin.pegawai.index')}}'">Batal</button>
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
