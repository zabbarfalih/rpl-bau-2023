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

class PengajuanController extends Controller {
    public function getColorStatus($status) {
        switch($status) {
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
    public function index() {
        Carbon::setLocale('id');
        $menu = Menu::with('submenu')->get();
        $userId = Auth::id();
        //$listPengajuan = Pengadaan::where('user_id', $userId)->get();
        $listPengajuan = Pengadaan::all();

        foreach($listPengajuan as $pengajuan) {
            // Pastikan kolom tanggal pengadaan ada dan bukan null
            if(!empty($pengajuan->tanggal_pengadaan)) {
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
    public function details($pengadaanId) {
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
    public function create() {
        $menu = Menu::with('submenu')->get();
        $roles = Role::all();

        return view('dashboard.pengadaan.unit.add', [
            'menu' => $menu,
            'roles' => $roles,
        ]);
    }

    public function kirimForm(Request $request) {
        $validatedData = Validator::make($request->all(), [
            'role_id' => 'required|numeric',
            'nama_pengadaan' => 'required|string',
            'tanggal_pengadaan' => 'required|date',
            'dokumen.0' => 'required|mimes:pdf',
            'dokumen.1' => 'mimes:pdf',
        ], [
            'role_id.required' => 'Unit tidak boleh kosong (pilih unit)',
            'role_id.numeric' => 'Pilih nama unit',
            'nama_pengadaan.required' => 'Nama pengadaan tidak boleh kosong',
            'tanggal_pengadaan.required' => 'Tanggal pengadaan tidak boleh kosong',
            'dokumen.0.required' => 'Dokumen KAK tidak boleh kosong',
            'dokumen.0.mimes' => 'Dokumen harus dalam format PDF',
            'dokumen.1.mimes' => 'Dokumen harus dalam format PDF',
        ]);

        if($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        try {
            $userId = auth()->user()->id;
            $validatedData = $validatedData->validated();

            $pengajuan = new Pengadaan;
            $pengajuan->user_id = $userId;
            $pengajuan->nama_pengadaan = $validatedData['nama_pengadaan'];
            $pengajuan->tanggal_pengadaan = $validatedData['tanggal_pengadaan'];
            $pengajuan->status = "Diajukan";
            $pengajuan->penyelenggara = 3;

            if($pengajuan->save()) {
                Log::info('Pengadaan dengan ID: '.$pengajuan->id.' berhasil dibuat.');

                    $pathKak = $request->file('dokumen.0')->store('public/dokumen/pengadaan/kak');
                    $dokumenkak = new Dokumen;
                    $dokumenkak->pengadaan_id = $pengajuan->id;
                    $dokumenkak->save();
                    $dokumenPengadaanKak = new DokumenPengadaan;
                    $dokumenPengadaanKak->dokumen_id = $dokumenkak->id;
                    $dokumenPengadaanKak->dokumen_kak = $pathKak;
                    $dokumenPengadaanKak->save();
                    Log::info('Dokumen Pengadaan KAK dengan ID: '.$dokumenPengadaanKak->id.' berhasil disimpan.');

                    if ($request->file('dokumen.1') == null) {
                        Log::info('Dokumen Pengadaan Memo tidak ada.');
                    } else {
                        $dokumenmemo = new Dokumen;
                        $dokumenmemo->pengadaan_id = $pengajuan->id;
                        $dokumenmemo->save();
                        $pathMemo = $request->file('dokumen.1')->store('public/dokumen/pengadaan/memo');
                        $dokumenPengadaanMemo = new DokumenPengadaan;
                        $dokumenPengadaanMemo->dokumen_id = $dokumenmemo->id;
                        $dokumenPengadaanMemo->dokumen_memo = $pathMemo;
                        $dokumenPengadaanMemo->save();
                        Log::info('Dokumen Pengadaan Memo dengan ID: '.$dokumenPengadaanMemo->id.' berhasil disimpan.');
                    }

                    return redirect()->route('unit.pengajuan.index')->with('success', 'Pengajuan pengadaan berhasil disimpan.');
            }
        } catch (\Exception $e) {
            Log::error('Kesalahan saat menyimpan data: '.$e->getMessage());
            return back()->with('status.error', 'Terjadi kesalahan saat mengirim form: '.$e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
