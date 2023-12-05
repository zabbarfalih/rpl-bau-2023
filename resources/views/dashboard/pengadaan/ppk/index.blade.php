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
                                        Nama
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
                                @foreach($listPengajuan as $pengajuan)
                                <tr>
                                    <td class="text-center fw-bold align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="fw-bold align-middle text-wrap">
                                        {{ $pengajuan->user->name }}
                                    </td>

                                    <td class="text-wrap">
                                        {{ $pengajuan->nama_pengadaan }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pengajuan->tanggal_pengadaan_formatted }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn-sibau-dashboard btn btn-warning rounded-pill fw-bold {{ $pengajuan->status_color }} w-75">
                                            {{ $pengajuan->status }}
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href={{ route('updatingstatusppk.details', ['id' => $pengajuan->id]) }}>
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

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center fw-bold fs-3">
                            Daftar Penolakan Pengajuan
                        </h3>
                        <table
                            class="table table-hover display responsive nowrap table-striped font-body-table"
                            style="width: 100%"
                            id="table-bau-penolakan"
                        >
                            <thead class="header-table">
                                <tr>
                                    <th scope="col" class="text-center align-middle">
                                        No
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Nama
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Nama Paket Pengadaan
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Alasan Penolakan
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Status Penolakan
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($listPenolakan as $penolakan)
                                <tr>
                                    <td class="text-center fw-bold align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="fw-bold align-middle text-wrap">
                                        {{ $penolakan->pengadaan->user->name }}
                                    </td>

                                    <td class="text-wrap">
                                        {{ $penolakan->pengadaan->nama_pengadaan }}
                                    </td>
                                    
                                    <td class="text-left align-middle text-wrap">
                                        {{ $penolakan->alasan_penolakan }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <button
                                        class="btn-sibau-dashboard btn btn-warning rounded-pill fw-bold w-75 {{$penolakan->pengadaan->status_color}}">
                                            {{ $penolakan->pengadaan->status }}
                                        </button>
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
