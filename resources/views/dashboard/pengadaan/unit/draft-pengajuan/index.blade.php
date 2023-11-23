<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>
    
    <section class="section draft-pengajuan">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center fw-bold h3">
                            Daftar Draft Pengajuan
                        </h3>

                        <table
                            class="table table-hover display responsive nowrap table-striped"
                            style="width: 100%"
                            id="table-bau"
                        >
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col" class="text-center align-middle">
                                        No
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Nama Paket Pengadaan (Draft)
                                    </th>
                                    <th scope="col" class="text-center align-middle">
                                        Tanggal Pengadaan
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

                                    <td class="fw-bold align-middle">
                                        Nama Draft Pengajuan {{ $loop->iteration }}
                                    </td>

                                    <td class="text-center align-middle">
                                        22 September 2024
                                    </td>

                                    {{-- masih harus diverifikasi role apa
                                    yang akses --}}
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-primary btn-sm rounded-pill fw-bold" onclick="window.location.href='form_pengajuan-unit.html'">Ubah Isian</button>
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill fw-bold">Hapus</button>
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
