<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPJ Honor Dosen</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .container {
            width: 100%;
        }

        .container .header {
            display: flex;
        }

        .container .header .gambar {
            width: 10%;
            height: 110px;
            padding: 50px;
            box-sizing: content-box;
        }

        .container .header .gambar img {
            width: 100%;
            margin: auto;
        }

        .container .header .text {
            width: 70%;
            margin: auto;
            text-align: center;
            padding-top: 15px;
            line-height: 1.5;
        }

        .container .header div {
            width: 20%;
        }

        .container .main .judul {
            display: flex;
            margin-bottom: 20px;
        }

        .container .main .judul .kiri,
        .container .main .judul .kanan {
            width: 25%;
        }

        .container .main .judul .text {
            margin: auto;
            text-align: center;
            line-height: 1.5;
        }

        .container .main .judul .text .atas {
            font-size: 10px;
        }

        .container .main .judul .text .bawah {
            margin: auto;
            text-align: center;
        }

        .container .main .isi {
            margin-left: 5%;
            text-align: justify;
        }

        .container .main .ttd {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }

        .container .main .ttd .kiri {
            width: 100%;
        }

        .container .main .ttd .main {
            width: 50%;
            text-align: center;
            font-size: 10px;
            line-height: 1.5;
        }

        .container .main .ttd .main .sign {
            width: 100%;
            height: 50px;
            box-sizing: border-box;
        }

        .container .main .ttd .main .sign img {
            width: 150px;
            height: 150px;
            z-index: 3;
            margin-top: -50px;
        }

        .container .main .ttd .main .bawah b {
            text-decoration: underline;
            margin-bottom: 0; /* Remove any default bottom margin */
        }

        .container .main .ttd .main p {
            margin: 0; /* Remove any default margin */
            font-size: 10px;
        }

        .container .footer {
            margin-left: 5%;
            font-size: 10px;
        }

        ol {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            position: relative;
        }

        li:before {
            position: absolute;
            right: 0;
            margin-left: 5px;
        }

        .tabel {
            width: 100%;
            margin: 20px 0;
            overflow-x: auto; /* Untuk menangani tabel yang melebihi lebar layar */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            border: .5px solid black; /* Menggunakan border 2px dan warna abu-abu (#ddd) */
            padding: 2px;
            text-align: center; /* Menengahkan tulisan */
        }

        td {
            border: .5px solid black; /* Menggunakan border 2px dan warna abu-abu (#ddd) */
            padding: 2px;
            text-align: left; /* Menengahkan tulisan */
            font-size: 5px;
        }

        .isi {
            margin-top: 20px;
            font-size: 15px;
            line-height: 1;
        }

        .program,
        .aktivitas,
        .klasifikasi,
        .rencana,
        .akun,
        .tgl {
            margin-bottom: 15px;
            display: inline;
            align-items: baseline;
            font-size: 10px;
        }

        .label {
            display: inline-block;
            width: 100%; /* Sesuaikan lebar label sesuai kebutuhan */
        }

        .separator {
            display: inline-block;
            width: 20px; /* Sesuaikan lebar separator sesuai kebutuhan */
        }

        .isi-content {
            flex: 1;
            padding-bottom: 5px;
            font-size: 10px;
        }

        .label,
        .separator {
            display: inline-block;
            vertical-align: top;
            font-size: 10px;
            margin-bottom: .5rem;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 10px;
        }

        /* #tgl-bulan-tahun::before {
            content: '\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0'; 
        } */
    </style>
</head>

<body>
    <div class="container">
        <div class="header">         
            <div class="text">
                <h3>SURAT PERTANGGUNGJAWABAN (SPJ) HONOR DOSEN</h4>
            </div>
        </div>
        <div class="main">
            <div class="isi">
                <div class="program">
                    <span class="label">PROGRAM &ensp;: {{ $spjPdf->program }}</span>
                </div>
                <div class="aktivitas">
                    <span class="label">AKTIVITAS &ensp;: {{ $spjPdf->kegiatan }}</span>
                </div>
                <div class="klasifikasi">
                    <span class="label">KLASIFIKASI RENCANA OUTPUT &ensp;: {{ $spjPdf->kro }}</span>
                </div>
                <div class="rencana">
                    <span class="label">RENCANA OUTPUT &ensp;: {{ $spjPdf->rencana_output }}</span>
                </div>
                <div class="akun">
                    <span class="label">AKUN &ensp;: {{ $spjPdf->akun }}</span>
                </div>
                <div class="tgl">
                  @php
                    use Carbon\Carbon;
                    App::setLocale('id');

                    $tanggal_kegiatan = $spjPdf->tanggal_kegiatan;
                    $tanggal_format = Carbon::parse($tanggal_kegiatan)->translatedFormat('j F Y');
                  @endphp
                <span class="label">TANGGAL &ensp;: {{ $tanggal_format }}</span>
              
                </div>
            </div>
            
            <div class="tabel">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Gol</th>
                            <th>Rate Honor</th>
                            <th>SKS Wajib</th>
                            <th>SKS Hadir</th>
                            <th>SKS Dibayar</th>
                            <th>Jumlah Bruto</th>
                            <th>Pajak</th>
                            <th>Jumlah Diterima</th>
                            <th>No. Rek.</th>
                            <th>Nama Rek.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris pertama (nomor urut 1) -->
                        <tr>
                            <th>(1)</th>
                            <th>(2)</th>
                            <th>(3)</th>
                            <th>(4)</th>
                            <th>(5)</th>
                            <th>(6)</th>
                            <th>(7)</th>
                            <th>(8)</th>
                            <th>(9)</th>
                            <th>(10)</th>
                            <th>(11)</th>
                            <th>(12)</th>
                        </tr>

                        <tbody>
                            @foreach ($tabelspj as $item)
                              <tr>
                                <td>{{ isset($item->nama_dosen) ? $item->nama_dosen : '' }}</td>
                                <td>{{ isset($item->golongan) ? $item->golongan : '' }}</td>
                                <td>{{ isset($item->rate_honor) ? $item->rate_honor : '' }}</td>
                                <td>{{ isset($item->sks_wajib) ? $item->sks_wajib : '' }}</td>
                                <td>{{ isset($item->sks_hadir) ? $item->sks_hadir : '' }}</td>
                                <td>{{ isset($item->sks_dibayar) ? $item->sks_dibayar : '' }}</td>
                                <td>{{ isset($item->jumlah_bruto) ? $item->jumlah_bruto : '' }}</td>
                                <td>{{ isset($item->pajak) ? $item->pajak : '' }}</td>
                                <td>{{ isset($item->jumlah_diterima) ? $item->jumlah_diterima : '' }}</td>
                                <td>{{ isset($item->nomor_rekening) ? $item->nomor_rekening : '' }}</td>
                                <td>{{ isset($item->nama_rekening) ? $item->nama_rekening : '' }}</td>
                              </tr>
                            @endforeach
                        </tbody>
                        
                    <tfoot>
                        <tr>
                            <th colspan="7">Jumlah</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>                    
            <ZA class="ttd">
                <div class="main">
                    <div class="atas">
                        <p>Lunas pada tanggal:  </p>
                        <p>Bendahara Pengeluaran STIS</p>
                    </div>
                    <div class="sign">
                        <p></p>
                    </div>
                    <div class="bawah">
                        <p>Rina Hardiyanti SST</p>
                        <p>NIP. 198809142010122004</p>
                    </div>
                </div>
                <div class="main">
                    <div class="atas">
                        <p>Setuju dibayar:  </p>
                        <p>Pejabat Pembuat Komitmen</p>
                    </div>
                    <div class="sign">
                        <p></p>
                    </div>
                    <div class="bawah">
                        <p>Luci Wulansari, S.Si., M.S.E.</p>
                        <p>NIP. 198504302009022006</p>
                    </div>
                </div>
                <div class="main">
                    <div class="atas">
                        <p>Jakarta, 01 Desember 2023<span id="tgl-bulan-tahun"></span></p>
                        <p>Pembuat Daftar,</p>
                    </div>                    
                    <div class="sign">
                        <p></p>
                    </div>
                    <div class="bawah">
                        <p>Sofyan Ayatulloh, SST</p>
                        <p>NIP. 197208221994121001</p>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

