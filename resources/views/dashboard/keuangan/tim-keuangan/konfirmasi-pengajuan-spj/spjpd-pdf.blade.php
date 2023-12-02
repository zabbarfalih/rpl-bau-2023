<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPJ Perjalanan Dinas</title>
    
    <style>
        .container {
            width: 1080px;
        }

        .container .header {
            display: flex;
            border-bottom: 5px solid black;
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
            line-height: 5px;
        }

        .container .header div {
            width: 20%;
        }

        .container .main .judul {
            display: flex;
        }

        .container .main .judul .kiri {
            width: 25%;
        }

        .container .main .judul .kanan {
            width: 25%;
        }

        .container .main .judul .text {
            margin: 25px auto;
            line-height: 1px;
        }

        .container .main .judul .text .atas {
            text-align: center;
            font-size: 18px;
            line-height: 1px;
            
        }

        .container .main .judul .text .bawah {
            margin: auto;
            text-align: center;
            line-height: 0.2px;
        }

        .container .main .isi {
            margin-left: 1%;
            text-align: justify;
        }

        .container .main .isi .text {
            font-size: 13px;
        }

        .container .main .isi .text .nama,
        .alamat,
        .org,
        .indpen,
        .ktps {
            display: flex;
        }

        .container .main .isi .text .nama dt {
            width: 8.5%;
        }

        .container .main .isi .text .nama .isi {
            display: flex;
            width: 82%;
        }

        .container .main .isi .text .alamat dt {
            width: 8.2%;
        }

        .container .main .isi .text .alamat .isi {
            display: flex;
            width: 82%;
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
            font-size: 20px;
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
            font-size: 13px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }


        .jumlah-row td {
            font-weight: bold;
        }

        .jumlah-row td:nth-child(1) {
            border-bottom-left-radius: 10px;
        }

        .jumlah-row td:nth-child(7) {
            border-bottom-right-radius: 10px;
        }

        .jumlah-row td:nth-child(n+8) {
            border: 1px solid black;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <div class="judul">
                <div class="kiri"></div>
                <div class="text">
                    <div class="atas">
                        <h3>{{ $spjPdf->judul}}</h3>
                    </div>
                </div>
                <div class="kanan"></div>
            </div>
            <div class="isi">
                <div class="text">
                    <dl>
                        <div class="nama">
                            <dt><b>PROGRAM </b></dt>
                            <div class="isi">:  {{ $spjPdf->program}}&ensp;
                                
                                <div></div>
                            </div>
                        </div>
                        <div class="alamat">
                            <dt><b>KEGIATAN</b></dt>
                            <div class="isi">&nbsp;: {{ $spjPdf->kegiatan}}&ensp; 
                                <div></div>
                            </div>
                        </div>
                        <div class="nama">
                            <dt><b>KRO/RO</b></dt>
                            <div class="isi">: {{ $spjPdf->kro}}&ensp;
                                <div></div>
                            </div>
                        </div>
                        <div class="nama">
                            <dt><b>KOMPONEN</b></dt>
                            <div class="isi">: {{ $spjPdf->komponen}}&ensp;
                                <div></div>
                            </div>
                        </div>
                        <div class="nama">
                            <dt><b>AKUN</b></dt>
                            <div class="isi">: {{ $spjPdf->akun}} &ensp;
                                <div></div>
                            </div>
                        </div>
                    </dl>  
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelaksana Perjalanan Dinas</th>
                                <th>Gol</th>
                                <th>Tanggal Tugas</th>
                                <th>Asal Penugasan</th>
                                <th>Daerah Tujuan Perjalanan Dinas</th>
                                <th>Lama Perjalanan (O-H)</th>
                                <th>Biaya Uang Harian (Rp)</th>
                                <th>Biaya Transpor (PP) (RP)</th>
                                <th>Taksi Bandara (PP) (RP)</th>
                                <th>Biaya Hotel</th>
                                <th>Jumlah Biaya (RP)</th>
                                <th>Uang Muka (RP)</th>
                                <th>Kekurangan (RP)</th>
                                <th>Nama Bank</th>
                                <th>Nomor Rekening</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <th>(13)</th>
                                <th>(14)</th>
                                <th>(15)</th>
                                <th>(16)</th>
                            </tr>

                            @foreach ($tabelspj as $item)
                            <tr>
                                <td>1.</td>
                                <td>{{ isset($item->nama_pelaksanaan_perjalanan_dinas) ? $item->nama_pelaksanaan_perjalanan_dinas : '' }}</td>
                                <td>{{ isset($item->gol) ? $item->gol : '' }}</td>
                                <td>{{ isset($spjPdf->tanggal_tugas) ? $spjPdf->tanggal_tugas : '' }}</td>
                                {{-- <td>harusnya tanggal</td> --}}
                                <td>{{ isset($item->asal_penugasan) ? $item->asal_penugasan : '' }}</td>
                                <td>{{ isset($item->daerah_tujuan_perjalanan_dinas) ? $item->daerah_tujuan_perjalanan_dinas : '' }}</td>
                                <td>{{ isset($item->lama_perjalanan) ? $item->lama_perjalanan : '' }}</td>
                                <td>{{ isset($item->uang_harian) ? $item->uang_harian : '' }}</td>
                                <td>{{ isset($item->transport) ? $item->transport : '' }}</td>
                                <td>{{ isset($item->bandara) ? $item->bandara : '' }}</td>
                                <td>{{ isset($item->biaya_hotel) ? $item->biaya_hotel : '' }}</td>
                                <td>{{ isset($item->jumlah_biaya) ? $item->jumlah_biaya : '' }}</td>
                                <td>{{ isset($item->uang_muka) ? $item->uang_muka : '' }}</td>
                                <td>{{ isset($item->kekurangan) ? $item->kekurangan : '' }}</td>
                                <td>{{ isset($item->nama_bank) ? $item->nama_bank : '' }}</td>
                                <td>{{ isset($item->nomor_rekening) ? $item->nomor_rekening : '' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="jumlah-row">
                                <td colspan="7">Jumlah</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>                  
                </div>
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