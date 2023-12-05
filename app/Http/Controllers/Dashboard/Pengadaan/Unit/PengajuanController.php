<?php

namespace App\Http\Controllers\Dashboard\Pengadaan\Unit;

use Carbon\Carbon;
use App\Models\Menu;

use App\Models\Role;
use App\Models\User;
use App\Models\Dokumen;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Models\DokumenPengadaan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        //$listPengajuan = Pengadaan::where('user_id', $userId)->get();
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
        $pengadaan = Pengadaan::findOrFail($pengadaanId);
        // Mengambil dokumen pengadaan terkait dengan pengadaan yang dipilih
        //$dokumenPengadaans = $pengadaan->dokumenPengadaans;

        return view('dashboard.pengadaan.unit.details', [
            'menu' => $menu,
            'pengadaan' => $pengadaan,
            //'dokumenPengadaans' => $dokumenPengadaans,
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
        $validatedData = Validator::make($request->all(), [
            'role_id' => 'required|numeric',
            'nama_pengadaan' => 'required|string',
            'tanggal_pengadaan' => 'required|date',
            'dokumen_kak' => 'required|mimes:docx',
            'dokumen_memo' => 'mimes:docx',
        ], [
            'role_id.required' => 'Unit tidak boleh kosong (pilih unit)',
            'role_id.numeric' => 'Pilih nama unit',
            'nama_pengadaan.required' => 'Nama pengadaan tidak boleh kosong',
            'tanggal_pengadaan.required' => 'Tanggal pengadaan tidak boleh kosong',
            'dokumen_kak.required' => 'Dokumen KAK tidak boleh kosong',
            'dokumen_kak.mimes' => 'Dokumen harus dalam format DOCX',
            'dokumen_memo.mimes' => 'Dokumen harus dalam format DOCX',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        try {
            $userId = Auth::id();
            $validatedData = $validatedData->validated();

            $pengajuan = new Pengadaan;
            $pengajuan->user_id = $userId;
            $pengajuan->nama_pengadaan = $validatedData['nama_pengadaan'];
            $pengajuan->tanggal_pengadaan = $validatedData['tanggal_pengadaan'];
            $pengajuan->status = "Diajukan";
            $pengajuan->penyelenggara = 3;

            if ($pengajuan->save()) {
                Log::info('Pengadaan dengan ID: ' . $pengajuan->id . ' berhasil dibuat.');

                $dokumen = new Dokumen;
                $dokumen->user_id = $userId;
                $dokumen->pengadaan_id = $pengajuan->id;
                if ($dokumen->save()) {
                    Log::info('Dokumen dengan ID: ' . $dokumen->id . ' berhasil dibuat.');

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

                    return redirect()->route('unit.pengajuan.index')->with('success', 'Pengajuan pengadaan berhasil disimpan.');
                }
            }
        } catch (\Exception $e) {
            Log::error('Kesalahan saat menyimpan data: ' . $e->getMessage());
            return back()->with('status.error', 'Terjadi kesalahan saat mengirim form: ' . $e->getMessage());
        }
    }

    public function downloadTemplate($filename)
    {
        $path = 'public/templates-dokumen/' . $filename . '.docx';
        if (Storage::exists($path)) {
            Log::info('Download File: ' . $filename . ' berhasil');
            return Storage::download($path);
        }

        Log::error('Download File: ' . $filename . '.docx' . ' gagal');
        abort(404, 'File not found');
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
