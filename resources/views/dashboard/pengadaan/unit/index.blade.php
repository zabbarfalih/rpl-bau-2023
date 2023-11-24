<x-dashboard.layouts.layouts :menus="$menus">
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
                                href="{{route('pengajuan.add')}}"
                                class="btn btn-primary me-2 btn-info btn-sm rounded-pill bg-success text-light fw-bold"
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
                                @foreach($users as $user)
                                <tr>
                                    <td class="text-center fw-bold align-middle">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="text-center align-middle">
                                        {{ 'Nama Pengadaan ' .
                                        $loop->iteration }}
                                    </td>

                                    <td class="text-center align-middle">
                                        22 September 2024
                                    </td>
                                    <td class="text-center align-middle">
                                        <span
                                            class="badge rounded-pill bg-warning text-dark"
                                            >Menunggu Persetujuan</span
                                        >
                                    </td>
                                    <td class="text-center">
                                        <a href={{ route('pengajuan.details') }}>
                                            <button
                                                type="button"
                                                class="btn btn-info btn-sm rounded-pill fw-bold text-white font-body-table"
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
