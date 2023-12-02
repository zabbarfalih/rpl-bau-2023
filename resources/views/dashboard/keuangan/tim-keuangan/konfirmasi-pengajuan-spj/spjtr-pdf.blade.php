<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPJ Translok</title>
    <style>
    /* div {
        border: 2px solid salmon;
    } */
    .container {
        width: 1080px;
        margin-right: 5%;
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
        margin: 25px auto 0.1px;
        font-size: 18px;
        border-bottom: 2px solid black;
        line-height: 1px;
    }

    .container .main .judul .text .bawah {
        margin: auto;
        text-align: center;
        line-height: 0.2px;
    }

    .container .main .isi {
        margin-left: 5%;
        text-align: justify;
    }

    .container .main .isi .text {
        font-size: 20px;
    }

    .container .main .isi .text .nama,
    .alamat,
    .org,
    .indpen,
    .ktps {
        display: flex;
    }

    .container .main .isi .text .nama dt {
        width: 39%;
    }

    .container .main .isi .text .nama .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .alamat dt {
        width: 39%;
    }

    .container .main .isi .text .alamat .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .org dt {
        width: 39%;
    }

    .container .main .isi .text .org .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .indpen dt {
        width: 39%;
    }

    .container .main .isi .text .indpen .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .ktps dt {
        width: 39%;
    }

    .container .main .isi .text .ktps .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .hari,
    .tanggal,
    .waktu,
    .tempat,
    .keperluan {
        display: flex;
    }

    .container .main .isi .text .hari dt {
        width: 39%;
    }

    .container .main .isi .text .hari .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .tanggal dt {
        width: 39%;
    }

    .container .main .isi .text .tanggal .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .waktu dt {
        width: 39%;
    }

    .container .main .isi .text .waktu .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .tempat dt {
        width: 39%;
    }

    .container .main .isi .text .tempat .isi {
        display: flex;
        width: 82%;
    }

    .container .main .isi .text .keperluan li {
        width: 39%;
    }

    .container .main .isi .text .keperluan .isi {
        display: flex;
        width: 82%;
    }

    .container .main .ttd {
        display: flex;
        margin-right: 5%;
    }

    .container .main .ttd .kanan {
        width: 2000%;
    }

    .container .main .ttd .tengah {
        width: 1000%;
    }

    .container .main .ttd .kiri {
        width: 500%;
    }

    .container .main .ttd .main {
        width: 2700%;
        text-align: left;
        font-size: 20px;
        line-height: 1px;
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
    }

    .container .footer {
        margin-left: 5%;
        font-size: 20px;
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

    .jumlah-row {
        font-weight: bold;
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
                        <h2>DAFTAR TRANSPOR LOKAL</h2>
                    </div>
                </div>
                <div class="kanan"></div>
            </div>
            <div class="isi">
                <div class="text">
                    <dl>
                        <div class="nama">
                            <dt>PROGRAM</dt>
                            <div class="isi">:&ensp;
                                <div>{{ $spjPdf->program }}</div>
                            </div>
                        </div>
                        <div class="alamat">
                            <dt>AKTIVITAS</dt>
                            <div class="isi">:&ensp; 
                                <div>{{ $spjPdf->kegiatan }}</div>
                            </div>
                        </div>
                        <div class="org">
                            <dt>KLARIFIKASI RENCANA OUTPUT</dt>
                            <div class="isi">:&ensp;
                                <div>{{ $spjPdf->kro }}</div>
                            </div>
                        </div>
                        <div class="indpen">
                            <dt>RENCANA OUTPUT</dt>
                            <div class="isi">:&ensp;
                                <div>{{ $spjPdf->rencana_output }}</div>
                            </div>
                        </div>
                        <div class="ktps">
                            <dt>KOMPONEN</dt>
                            <div class="isi">:&ensp;
                                <div>{{ $spjPdf->komponen }}</div>
                            </div>
                        </div>
                        <div class="ktps">
                            <dt>AKUN</dt>
                            <div class="isi">:&ensp;
                                <div>{{ $spjPdf->akun }}</div>
                            </div>
                        </div>
                        <div class="ktps">
                            <dt>BULAN</dt>
                            <div class="isi">:&ensp;
                                <div>{{ $spjPdf->bulan }}</div>
                            </div>
                        </div>
                    </dl>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Transpor per hari (Rp)</th>
                            <th>Jumlah Kegiatan (Rp)</th>
                            <th>Jumlah yang dibayarkan (Rp)</th>
                            <th>Bank</th>
                            <th>Nomor Rakening</th>
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
                        </tr>
                        <tr>
                            @foreach ($tabelspj as $item)
                              <tr>
                                <td>1.</td>
                                <td>{{ isset($item->nama) ? $item->nama : '' }}</td>
                                <td>{{ isset($item->transpor_per_hari) ? $item->transpor_per_hari : '' }}</td>
                                <td>{{ isset($item->jumlah_kegiatan) ? $item->jumlah_kegiatan : '' }}</td>
                                <td>{{ isset($item->jumlah_yang_dibayarkan) ? $item->jumlah_yang_dibayarkan : '' }}</td>
                                <td>{{ isset($item->bank) ? $item->bank : '' }}</td>
                                <td>{{ isset($item->nomor_rekening) ? $item->nomor_rekening : '' }}</td>
                              </tr>
                            @endforeach
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="jumlah-row">
                            <td colspan="3">Jumlah</td>
                            <td>-</td>
                            <td>-</td>
                            <td class="abu", colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>


                <div class="ttd">
                    <div class="kiri"></div>
                    <div class="main">
                        <div class="atas">
                            <p>Lunas pada tanggal </p>
                            <p>Bendahara Pengeluaran,</p>
                        </div>
                        <div class="sign">
                            <p></p>
                        </div>
                        <div class="bawah">
                            <p><b>nama</b></p>
                            <p>NIP.</p>
                        </div>
                    </div>
                    <div class="tengah"></div>
                    <div class="main">
                        <div>
                            <p>Setuju dibayar, </p>
                            <p>Pejabat Pembuat Komitmen</p>
                        </div>
                        <div class="sign">
                            <p></p>
                        </div>
                        <div class="bawah">
                            <p><b>nama</b></p>
                            <p>NIP.</p>
                        </div>
                    </div>
                    <div class="kanan"></div>
                    <div class="main">
                        <div class="atas">
                            <p>Jakarta, </p>
                            <p>Pembuat Daftar,</p>
                        </div>
                        <div class="sign">
                            <p></p>
                        </div>
                        <div class="bawah">
                            <p><b>nama</b></p>
                            <p>NIP.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>