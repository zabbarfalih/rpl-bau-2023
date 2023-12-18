<x-dashboard.layouts.layouts :menu="$menu">
    <x-slot name="css">
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="js_head">
        <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script defer src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
        <script defer src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script defer src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.js"></script>
        <script defer src="{{ asset('assets/js/dashboard/table.js') }}"></script>
    </x-slot>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Pengajuan Masuk Surat Tugas
                        </h5>
                        <p>
                            Berikut disajikan data-data pengajuan surat
                            tugas yang diajukan oleh pegawai Polstat
                            STIS.
                        </p>

                        <!-- Table with stripped rows -->
                        <table class="table table table-hover display responsive nowrap table-striped font-body-table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Pengaju</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengecekanSuratTugas as $pengecekan)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pengecekan->name }}</td>
                                        <td>{{ $pengecekan->nama_kegiatan }}</td>
                                        <td>
                                            <a href="{{ route('pengecekansurtug.cek', ['id' => $pengecekan->id]) }}">
                                                <button type="button" class="btn btn-primary">Lengkapi Surat</button>
                                            </a>
                                        </td>
                                        <td>
                                            @if($pengecekan->keterangan == 'Sudah dilengkapi')
                                                <div class="badge bg-success text-wrap" style="width: 6rem;">Sudah dilengkapi</div>
                                            @else
                                                <div class="badge bg-danger text-wrap" style="width: 6rem;">Belum dilengkapi</div>
                                            @endif
                                        </td>

                                         <!-- HTML untuk tombol Download -->
                                         <td>
                                            @if($pengecekan->keterangan == 'Sudah dilengkapi')
                                                <a href="{{ route('surtug.download', ['id' => $pengecekan->id]) }}" target="_blank" onclick="handleDownload()"> <!-- Menggunakan onclick untuk menambahkan handleDownload() -->
                                                    <button type="button" class="btn btn-primary">Download</button>
                                                </a>
                                            @else
                                                <button type="button" class="btn btn-secondary" disabled>Download</button>
                                            @endif
                                        </td>

                                        <!-- HTML untuk tombol Selesai -->
                                        <td>
                                            @if($pengecekan->kode_track == 4)
                                                <a href="{{ route('pengecekansurtug.index', ['id' => $pengecekan->id]) }}">
                                                    <button type="button" class="btn btn-success" onclick="updateStatus('selesai', {{ $pengecekan->id }})">Selesai</button>
                                                </a>
                                            @else
                                                <button type="button" class="btn btn-secondary" disabled>Selesai</button>
                                            @endif
                                        </td>

                                        <!-- JavaScript untuk mengaktifkan tombol "Selesai" setelah tombol "Download" ditekan -->
                                        <script>
                                            function handleDownload() {
                                                // Memperbarui halaman setelah 3 detik (contoh waktu yang bisa disesuaikan)
                                                setTimeout(function() {
                                                    // Mengubah status tombol "Selesai" menjadi aktif
                                                    // document.getElementById('selesaiButton').removeAttribute('disabled');

                                                    // Refresh halaman atau melakukan aksi lain jika diperlukan
                                                    window.location.reload(); // Contoh: Refresh halaman
                                                }, 1000); // Atur sesuai dengan kebutuhan waktu yang diperlukan untuk download
                                            }
                                        </script>

                                    </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $pengecekanSuratTugas->links() }}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="js_body">
        <script>
            function updateStatus(action, id) {
                let url = '';
    
                if (action === 'selesai') {
                    url = "{{ route('surtug.selesai', ['id' => ':id']) }}".replace(':id', id);
                }
                
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        // Handle response or redirect if needed
                        window.location.href = "{{ route('pengecekansurtug.index') }}"; // Gantilah 'nama_rute_index' dengan nama rute yang sesuai
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        </script>
    </x-slot>
</x-dashboard.layouts.layouts>