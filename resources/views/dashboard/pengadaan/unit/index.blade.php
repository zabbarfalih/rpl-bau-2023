<x-dashboard.layouts.layouts :menu="$menu">
    <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    <section class="section pengajuan">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center fw-bold fs-3">
                            Daftar Pengajuan
                        </h3>

                        {{-- masih harus diperbaiki untuk role yang akses
                        --}}
                        <div class="d-flex justify-content-end mb-3">
                            <a
                                href="{{route('unit.pengajuan.add')}}"
                                class="btn btn-primary me-2 btn-info rounded-pill bg-success text-light fw-bold"
                                >+ Tambah Pengajuan</a
                            >
                        </div>

                        <table
                            class="table table-hover display responsive nowrap table-striped font-body-table"
                            style="width: 100%"
                            id="table-bau"
                        >
                            <thead class="header-table">
                                <tr>
                                    <th scope="col" class="text-center align-middle">
                                        No
                                    </th>

                                    <th scope="col" class="text-center align-middle">
                                        Nama Paket Pengadaan
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Tanggal Pengadaan
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Status Pengajuan
                                    </th>
                                    <th
                                        scope="col"
                                        class="text-center align-middle"
                                    ></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($listPengajuan as $list)
                                <tr>
                                    <td class="text-center fw-bold align-middle">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="text-wrap">
                                        {{ 'Nama Pengadaan ' .
                                        $list->nama_pengadaan }}
                                    </td>

                                    <td class="text-center align-middle">
                                        {{$list->tanggal_pengadaan_formatted}}
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn-sibau-dashboard btn btn-warning rounded-pill fw-bold {{ $list->status_color }} w-75" style="border: none">
                                            {{ $list->status }}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <a href={{ route('unit.pengajuan.details', ['id' => $list->id]) }}>
                                            <button
                                            type="button"
                                            class="btn-sibau-dashboard btn btn-info rounded-pill fw-bold text-white"
                                            >
                                                Details
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Table  -->

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>
