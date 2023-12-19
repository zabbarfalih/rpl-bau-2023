<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SURAT PERJALANAN DINAS (SPD)</title>
    <style>
      body {
        font-family: "Bookman Old Style", Georgia, serif;
        font-size: 12px;
        margin: 20px;
      }

      .lampiran tr {
        align-items: baseline; /* Penyejajaran sejajar pada baseline */
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      th,
      td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }

      /* Tambahkan class khusus untuk tabel nomor dan lembar */
      .table-no-border {
        border-collapse: separate;
      }

      .table-no-border th,
      .table-no-border td {
        border: none;
        padding: 8px;
        text-align: left;
      }

      .footer {
        text-align: center;
        margin-top: 20px;
      }

      /* Surtug */
      .surat-tugas {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
      }

      h2 {
        text-align: center;
      }

      .content {
        margin-top: 0px;
        text-align: center;
      }

      .footer {
        text-align: right;
        margin: 20px 50px;
      }
    </style>
  </head>
  <body>
    {{-- <div class="logo">
      <img src="{{ asset('img/LogoSTISBW.png') }}" alt="Logo Polstat STIS" width="300" height="150">
    </div> --}}
    <div class="surat-tugas" style="border:none">
      <h2>SURAT TUGAS</h2>

      <div class="content">
        <p>Nomor: {{ $data->no_surtug }}</p>
      </div>
      <div class="lampiran">
        <table>
          <tbody>
            <tr style="border: none">
              <td style="border: none">Menimbang&nbsp;&nbsp;&nbsp;:</td>
              <td style="border: none">
                Bahwa sehubungan dengan {{ $data->nama_kegiatan }}, perlu menugaskan nama yang
                tersebut dalam surat tugas ini;
              </td>
            </tr>
            <tr style="border: none">
              <td style="border: none">
                Mengingat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
              </td>
              <td style="border: none">
                1. Undang-Undang Republik Indonesia No. 6 Tahun 1997 tentang Statistik;<br/>
                2. Peraturan Pemerintah No. 51 Tahun 1999 tentang
                Penyelenggaraan Statistik;<br />
                3. Peraturan Presiden No. 86 Tahun 2007 tentang Badan Pusat
                Statistik;<br />
                4. Peraturan Badan Pusat Statistik Nomor 7 Tahun 2020 tentang
                Organisasi dan Tata Kerja Badan Pusat &nbsp;&nbsp;&nbsp;&nbsp;Statistik;<br />
                5. Peraturan Badan Pusat Statistik Nomor 8 Tahun 2020 tentang
                Organisasi dan Tata Kerja Badan Pusat &nbsp;&nbsp;&nbsp;&nbsp;Statistik Provinsi dan
                Badan Pusat Statistik Kabupaten/Kota;<br />
                6. Peraturan Menteri Keuangan Republik Indonesia No.
                60/PMK.02/2021 tentang Standar Biaya Masukan &nbsp;&nbsp;&nbsp;&nbsp;Tahun Anggaran
                2022; dan<br />
                7. Peraturan Badan Pusat Statistik No. 5 Tahun 2019 tentang Tata
                Naskah Dinas di Lingkungan Badan &nbsp;&nbsp;&nbsp;&nbsp;Pusat Statistik.<br />
              </td>
            </tr>
            <!-- Tambahkan baris lain jika diperlukan -->
          </tbody>
        </table>
      </div>
      <div class="content">
        <p>Menugaskan:</p>
      </div>

      <div class="lampiran">
        <p>
          Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
          Daftar terlampir
        </p>
        <p>
          Untuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
          Melakukan perjalanan dinas dalam rangka {{ $data->nama_kegiatan }} di {{ $data->lokasi }} Pada tanggal {{ \Carbon\Carbon::parse($data->tanggal_perdin_mulai)->translatedFormat('d F Y') }} s.d {{ \Carbon\Carbon::parse($data->tanggal_perdin_selesai)->translatedFormat('d F Y') }}
        </p>

        <div class="footer">
          <p style="text-align: center; padding-left:350px">
            Jakarta, {{ $data->tanggal_ttd->translatedFormat('d F Y') }} <br>
            {{ $data->jabatan_pejabat_ttd }}
          </p>
          <br /><br /><br />
          <p style="text-align: center; padding-left:350px">{{ $data->nama_pejabat_ttd }}</p>
        </div>
        <br /><br /><br /><br />
        <br /><br /><br /><br />
        <br /><br /><br /><br />
        <br /><br /><br /><br />
        <br /><br /><br /><br />
      </div>
      <div class="content">
        <p>Lampiran Surat Tugas</p>
        <p>Nomor: {{ $data->no_surtug }}</p>
        <p>Tanggal: {{ $data->tanggal_ttd->translatedFormat('d F Y') }}</p>
      </div>

      <table class="tabel-peserta-fullwidth">
        <tbody>
          <tr>
            <td>No</td>
            <td>Nama</td>
            <td>NIP</td>
            <td>Gol</td>
            <td>Jabatan</td>
          </tr>
          <tr>
            <td>1</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->nip }}</td>
            <td>{{ $data->golongan }}</td>
            <td>{{ $data->jabatan }}</td>
          </tr>
          <!-- Tambahkan baris sesuai kebutuhan -->
        </tbody>
      </table>
    </div>
  </body>
</html>
