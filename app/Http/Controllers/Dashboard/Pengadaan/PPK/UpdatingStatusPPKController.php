<?php

namespace App\Http\Controllers\Dashboard\Pengadaan\PPK;

use Carbon\Carbon;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\Dokumen;
use App\Models\Pengadaan;
use App\Models\Penolakan;
use Illuminate\Http\Request;
use App\Models\StatusPengadaan;
use App\Models\DokumenPengadaan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdatingStatusPPKController extends Controller
{
    public function getColorStatus($status)
    {
        switch ($status) {
            case "Diajukan":
                return "bg-dark-light text-dark pe-none";
                break;
            case "Diterima":
                return "bg-primary text-light pe-none";
                break;
            case "Ditolak":
                return "bg-danger text-light pe-none";
                break;
            case "Revisi":
                return "bg-warning text-dark pe-none";
                break;
            case "Diproses":
                return "bg-info text-dark pe-none";
                break;
            case "Dilaksanakan":
                return "bg-primary-light text-dark pe-none";
                break;
            case "Selesai":
                return "bg-success text-light pe-none";
                break;
            case "Diserahkan":
                return "bg-secondary text-light pe-none";
                break;
            default:
                return "";
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('id');
        $menu = Menu::with('submenu')->get();
        $listPengajuan = Pengadaan::all();

        foreach ($listPengajuan as $pengajuan) {
            // Pastikan kolom tanggal pengadaan ada dan bukan null
            if (!empty($pengajuan->tanggal_pengadaan)) {
                // Parse tanggal dan ubah formatnya ke 'tanggal bulan(tulisan) tahun'
                // contoh: '1 Januari 2023'
                $pengajuan->tanggal_pengadaan_formatted = Carbon::createFromFormat('Y-m-d', $pengajuan->tanggal_pengadaan)
                    ->translatedFormat('j F Y');
            } else {
                // Jika tanggal tidak ada atau null, tetapkan nilai default atau tampilkan pesan error
                $pengajuan->tanggal_pengadaan_formatted = 'Tanggal tidak valid';
            }

            // Tidak perlu menetapkan kembali ke objek $pengajuan karena kita hanya menambahkan properti baru
            $pengajuan->status_color = $this->getColorStatus($pengajuan->status);
        }

        $listPenolakan = Penolakan::all();
        foreach ($listPenolakan as $penolakan) {
            // Pastikan kolom tanggal pengadaan ada dan bukan null
            if (!empty($penolakan->pengadaan->tanggal_pengadaan)) {
                // Parse tanggal dan ubah formatnya ke 'tanggal bulan(tulisan) tahun'
                // contoh: '1 Januari 2023'
                $penolakan->pengadaan->tanggal_pengadaan_formatted = Carbon::createFromFormat('Y-m-d', $penolakan->pengadaan->tanggal_pengadaan)
                    ->translatedFormat('j F Y');
            } else {
                // Jika tanggal tidak ada atau null, tetapkan nilai default atau tampilkan pesan error
                $penolakan->pengadaan->tanggal_pengadaan_formatted = 'Tanggal tidak valid';
            }

            // Tidak perlu menetapkan kembali ke objek $pengajuan karena kita hanya menambahkan properti baru
            $penolakan->pengadaan->status_color = $this->getColorStatus($penolakan->pengadaan->status);
        }

        return view('dashboard.pengadaan.ppk.index', [
            'menu' => $menu,
            'listPengajuan' => $listPengajuan,
            'listPenolakan' => $listPenolakan,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($pengadaanId)
    {
        $menu = Menu::with('submenu')->get();
        $roles = Role::all();

        $pengadaan = Pengadaan::findOrFail($pengadaanId);
        Log::info('Pengadaan data : ' . $pengadaan->user_id);
        // Mengambil dokumen pengadaan terkait dengan pengadaan yang dipilih

        $dokumen = Dokumen::where('pengadaan_id', $pengadaan->id)->get('id');
        Log::info('Pengadaan data : ' . $dokumen);

        foreach ($dokumen as $dok) {
            $dokumenPengadaans = DokumenPengadaan::where('dokumen_id', $dok->id)->get();
            Log::info('Dokumen Pengadaan data : ' . $dokumenPengadaans);
        }

        return view('dashboard.pengadaan.ppk.details', [
            'menu' => $menu,
            'roles' => $roles,
            // 'dokumenPengadaans' => $dokumenPengadaans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($nama_dokumen, $id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            abort(404); // Dokumen tidak ditemukan
        }

        if ($nama_dokumen === 'kak') {
            $filePath = public_path("storage/" . $dokumen->kak . ".pdf");
        } elseif ($nama_dokumen === 'bast') {
            $filePath = public_path("storage/" . $dokumen->bast . ".pdf");;
        }

        $headers = ['Content-Type: application/pdf'];
        $fileName = $dokumen->kak . time() . '.pdf';

        return response()->download($filePath, $fileName, $headers);
    }

    public function uploadFiles(Request $request)
    {
        $request->validate([
            'uploadedFile.*' => 'required|mimes:pdf|max:2048', // Batas maksimum 2MB
        ]);

        foreach ($request->file('uploadedFile') as $file) {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public', $fileName);

            // Simpan nama file ke database
            Dokumen::create(['file_name' => $fileName]);
        }
    }
}
