<?php

namespace App\Http\Controllers\Dashboard\Pengadaan\Unit;

use App\Models\DokumenPengadaan;
use Carbon\Carbon;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
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
        $userId = Auth::id();
        $listPengajuan = Pengadaan::where('user_id', $userId)->get();
        //$listPengajuan = Pengadaan::all();

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

        return view('dashboard.pengadaan.unit.index', [
            'menu' => $menu,
            'listPengajuan' => $listPengajuan,
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

        $userId = Auth::id();
        $dokumenPengadaans = Dokumen::where('pengadaan_id', $pengadaanId)
            ->whereHas('dokumenPengajuans', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->with('dokumenPengajuans')
            ->get();
        Log::info($dokumenPengadaans);

        $dokumenTipeArray = [];
        foreach ($dokumenPengadaans as $dokumen) {
            foreach ($dokumen->dokumenPengajuans as $dokumenPengadaan) {
                $dokumenTipeArray[$dokumen->id][] = $dokumenPengadaan->tipe_dokumen;
            }
        }

        Log::info($dokumenTipeArray);


        return view('dashboard.pengadaan.unit.details', [
            'menu' => $menu,
            'dokumenPengadaans' => $dokumenPengadaans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::with('submenu')->get();
        $roles = Role::all();

        return view('dashboard.pengadaan.unit.add', [
            'menu' => $menu,
            'roles' => $roles,
        ]);
    }

    public function kirimForm(Request $request)
    {
        try {
            $userId = Auth::id();
            $validatedData = $request->validate([
                'role_id' => 'required|numeric',
                'nama_pengadaan' => 'required|string',
                'tanggal_pengadaan' => 'required|date',
                'dokumen_kak' => 'required|mimes:pdf', // Atur validasi untuk tipe file Dokumen KAK yang diunggah
                'dokumen_memo' => 'required|mimes:pdf', // Atur validasi untuk tipe file Memo yang diunggah
            ]);
            Log::info($validatedData['tanggal_pengadaan']);
            $pengajuan = new Pengadaan;
            $pengajuan->user_id = $userId;
            $pengajuan->nama_pengadaan = $validatedData['nama_pengadaan'];
            $pengajuan->tanggal_pengadaan = $validatedData['tanggal_pengadaan'];
            $pengajuan->status = "Diajukan";
            $pengajuan->penyelenggara = 3;
            $pengajuan->save();
            Log::info('Pengadaan dengan ID: ' . $pengajuan->id . ' berhasil dibuat.');

            if ($pengajuan->save()) {
                $dokumen = new Dokumen;
                $dokumen->user_id = $userId;
                $dokumen->pengadaan_id = $pengajuan->id;
                $dokumen->save();
                Log::info('Dokumen dengan ID: ' . $dokumen->id . ' berhasil dibuat.');
                if ($dokumen->save()) {

                    $pathKak = $request->file('dokumen_kak')->store('public/dokumen');
                    $dokumenPengadaanKak = new DokumenPengadaan;
                    $dokumenPengadaanKak->dokumen_id = $dokumen->id;
                    $dokumenPengadaanKak->tipe_dokumen = 'kak';
                    $dokumenPengadaanKak->path_file = $pathKak;
                    $dokumenPengadaanKak->save();
                    Log::info('Dokumen Pengadaan KAK dengan ID: ' . $dokumenPengadaanKak->id . ' berhasil disimpan.');
                    // Menangani unggahan dokumen_memo
                    $pathMemo = $request->file('dokumen_memo')->store('public/dokumen');
                    $dokumenPengadaanMemo = new DokumenPengadaan;
                    $dokumenPengadaanMemo->dokumen_id = $dokumen->id;
                    $dokumenPengadaanMemo->tipe_dokumen = 'memo';
                    $dokumenPengadaanMemo->path_file = $pathMemo;
                    $dokumenPengadaanMemo->save();
                    Log::info('Dokumen Pengadaan Memo dengan ID: ' . $dokumenPengadaanMemo->id . ' berhasil disimpan.');
                }
            }
        } catch (\Exception $e) {
            Log::error('Kesalahan saat menyimpan data: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengirim form: ' . $e->getMessage());
        }

        return redirect()->route('pengajuan.index');
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
}
