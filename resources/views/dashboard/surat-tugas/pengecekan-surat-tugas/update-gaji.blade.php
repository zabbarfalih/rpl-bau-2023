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
                <h5 class="card-title">Silakan Update Gaji</h5>

                <!-- General Form Elements -->
                <form method="POST" action="{{ route('updategaji.update', ['id' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Nama</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="name"
                            value="{{ $user->name }}"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan nama lengkap dan gelar Anda"
                            readonly
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
                            value=" {{ $user->nip }} "
                            type="text"
                            class="form-control"
                            placeholder="Masukkan NIP Anda"
                            readonly
                        />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label"
                        >Gaji</label
                        >
                        <div class="col-sm-10">
                        <input
                            name="gaji"
                            value=" {{ $user->gaji }} "
                            type="text"
                            class="form-control"
                            placeholder="Masukkan Gaji Anda"
                        />
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
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
