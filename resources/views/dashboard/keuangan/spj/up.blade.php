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
                <form action="" method="POST" enctype="multipart/form-data" class="row">
                    @csrf
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
                                <x-elements.input-file id="inputBukti" value="" name="Bukti" placeholder=""/>
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
                </form>
            </div>
        </div>
    </section>
      
    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>