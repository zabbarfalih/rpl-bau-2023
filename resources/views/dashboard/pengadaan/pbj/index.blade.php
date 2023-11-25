<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>

    @php
        $roleUser = "PPK";
        $allowedRole = ["PPK", "PBJ"];
    @endphp

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

                                    @if(in_array($roleUser, $allowedRole))
                                    <th scope="col" class="text-center align-middle">
                                        Nama
                                    </th>
                                    @endif

                                    <th scope="col" class="text-center align-middle">
                                        Nama Pengadaan
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
                                @foreach($dokumen as $dokumen)
                                <tr>
                                    <td class="text-center fw-bold align-middle">
                                        {{ $loop->iteration }}
                                    </td>

                                    @if(in_array($roleUser, $allowedRole))
                                    <td class="fw-bold align-middle">
                                        {{ $dokumen->user->name }}
                                    </td>
                                    @endif

                                    <td class="text-center align-middle">
                                        {{ $dokumen->nama_pengadaan }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ \Carbon\Carbon::parse($dokumen->tanggal_pengajuan)->format('d M Y') }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <span
                                            class="badge rounded-pill bg-warning text-dark"
                                            >{{ $dokumen->status }}</span
                                        >
                                    </td>
                                    <td class="text-center">
                                        <a href={{ route('updatingstatuspbj.details') }}>
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
