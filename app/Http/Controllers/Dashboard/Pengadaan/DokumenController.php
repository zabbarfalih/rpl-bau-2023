<?php

namespace App\Http\Controllers\Dashboard\Pengadaan;

use Illuminate\Http\Request;
use App\Models\DokumenPengadaan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class DokumenController extends Controller {
    public function downloadTemplate($filename) {
        $path = 'public/templates-dokumen/'.$filename.'.docx';
        if(Storage::exists($path)) {
            Log::info('Download File: '.$filename.' berhasil');
            return Storage::download($path);
        }

        Log::error('Download File: '.$filename.'.docx'.' gagal');
        abort(404, 'File not found');
    }

    public function uploadDokumen(Request $request) {
        Log::info('Memulai proses upload dokumen');
        Log::info($request->input('dokumenId'));
        Log::info($request->input('jenisDokumen'));

        $files = $request->file('uploadedFile');
        if(is_array($files)) {
            foreach($files as $file) {
                Log::info('File uploaded:', [
                    'originalName' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mimeType' => $file->getMimeType(),
                    'path' => $file->getPath()
                ]);
            }
        } else {
            Log::info('File uploaded:', [
                'originalName' => $files->getClientOriginalName(),
                'size' => $files->getSize(),
                'mimeType' => $files->getMimeType(),
                'path' => $files->getPath()
            ]);
        }
        // Jika ini adalah single file upload

        try {
            $request->validate([
                'uploadedFile' => 'required|max:2048', // Max 2MB, sesuaikan sesuai kebutuhan
                'jenisDokumen' => 'required|string'
            ]);
            Log::info('Validasi request berhasil');

            // Mendapatkan file dari request
            $files = $request->file('uploadedFile');
            if(is_array($files)) {
                foreach($files as $file) {
                    // Proses setiap file
                    $this->processFile($file, $request);
                }
            } else {
                // Proses file tunggal
                $this->processFile($files, $request);
            }
            $pengadaanId = $request->input('pengadaanId');
            Log::info("Dokumen Pengadaan dengan ID : berhasil tersimpan");
            return redirect()->back()->with('success', 'File uploaded successfully!');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error dalam upload dokumen: '.$e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan pada server'], 500);
        }
    }

    private function processFile($file, $request) {
        $path = $file->store('public/dokumen');
        Log::info('File berhasil disimpan, path: '.$path);

        $dokumenPengadaan = DokumenPengadaan::where('dokumen_id', $request->input('dokumenId'))->first();
        $jenis = $request->input('jenisDokumen');
        Log::info('Jenis Dokumen: '.$jenis);

        switch($jenis) {
            case 'memo':
                $dokumenPengadaan->dokumen_memo = $path;
                break;
            case 'kak':
                $dokumenPengadaan->dokumen_kak = $path;
                break;
            case 'identifikasiKebutuhan':
                $dokumenPengadaan->dokumen_identifikasi_kebutuhan = $path;
                break;
            case 'perencanaanPengadaan':
                $dokumenPengadaan->dokumen_perencanaan_pengadaan = $path;
                break;
            case 'hps':
                $dokumenPengadaan->hps = $path;
                break;
            case 'notaDinas':
                $dokumenPengadaan->nota_dinas = $path;
                break;
            case 'undangan':
                $dokumenPengadaan->dokumen_undangan = $path;
                break;
            case 'ssuk_sskk':
                $dokumenPengadaan->dokumen_ssuk_sskk = $path;
                break;
            case 'ikp':
                $dokumenPengadaan->ikp = $path;
                break;
            case 'ldpDanSpesifikasi':
                $dokumenPengadaan->dokumen_ldp_dan_spesifikasi = $path;
                break;
            case 'penawaranPaktaFormulir':
                $dokumenPengadaan->dokumen_penawaran_pakta_formulir = $path;
                break;
            case 'suratPermintaan':
                $dokumenPengadaan->dokumen_surat_permintaan = $path;
                break;
            case 'pengadaanLangsung':
                $dokumenPengadaan->dokumen_pengadaan_langsung = $path;
                break;
            // Tambahkan kasus lainnya sesuai kebutuhan
            case 'bast';
                $dokumenPengadaan->dokumen_bast = $path;
                break;
        }
        $dokumenPengadaan->save();
        // Simpan file dan update database berdasarkan jenis dokumen
        // ...
    }
}
