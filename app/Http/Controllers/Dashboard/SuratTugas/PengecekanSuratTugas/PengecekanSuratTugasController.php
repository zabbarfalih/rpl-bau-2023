<?php

namespace App\Http\Controllers\Dashboard\SuratTugas\PengecekanSuratTugas;

use App\Models\Menu;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengajuanSuratTugas;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\PDF;


// use Config\app;
// use PDF;

class PengecekanSuratTugasController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::with('submenus')->get();
        $users = User::all();
        $pengecekanSuratTugas = PengajuanSuratTugas::where('status_surtug', 1)->whereIn('kode_track', [2, 3, 4])->get();

        return view('dashboard.surat-tugas.pengecekan-surat-tugas.index', [ //semacam track lokasi folder file view (dalam hal ini adalah file view index)
            'menus' => $menus,
            'users' => $users,
            'pengecekanSuratTugas' => $pengecekanSuratTugas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::with('submenus')->get();
        return view('dashboard.surat-tugas.pengecekan-surat-tugas.cek', [
            'menus' => $menus,
        ]);
    }

    public function editForm($id)
    {
        $menus = Menu::with('submenus')->get();
        $pengecekanSuratTugas = PengajuanSuratTugas::findOrFail($id);

        return view('dashboard.surat-tugas.pengecekan-surat-tugas.cek', [
            'menus' => $menus,
            'pengecekanSuratTugas' => $pengecekanSuratTugas,
        ]);
    }

    public function updateForm(Request $request, $id)
    {
        $pengajuanSuratTugas = PengajuanSuratTugas::findOrFail($id);
        $pengajuanSuratTugas->kode_track = 3;
        $pengajuanSuratTugas->update($request->all());

        // Tambahkan logika untuk mengubah nilai keterangan
        $keterangan = $request->has('name') ? 'Sudah dilengkapi' : 'Belum dilengkapi';
        $pengajuanSuratTugas->update(['keterangan' => $keterangan]);
        return redirect()->route('pengecekansurtug.index');
    }

    // public function downloadpdf()
    // {
    //     $data = PengajuanSuratTugas::limit(20)->get();
    //     $pdf = PDF::loadView('dashboard.surat-tugas.pengecekan-surat-tugas.surat-tugas-pdf', compact('data'));
    //     $pdf->setPaper('A4', 'potrait');
    //     return $pdf->stream('dashboard.surat-tugas.pengecekan-surat-tugas.surat-tugas-pdf');
    // }
    public function downloadpdf($id)
    {
        $data = PengajuanSuratTugas::findOrFail($id);
        $data->update(['kode_track' => 4]);

        if ($data->lampiran == 0) {
            $pdf = PDF::loadView('dashboard.surat-tugas.pengecekan-surat-tugas.surtug-tanpa-lampiran-pdf', [
                'data' => $data,
            ]);
            $pdf->setPaper('A4', 'portrait');
            return $pdf->stream('dashboard.surat-tugas.pengecekan-surat-tugas.surtug-tanpa-lampiran-pdf');
        }
        elseif ($data->lampiran == 1) {
            $pdf = PDF::loadView('dashboard.surat-tugas.pengecekan-surat-tugas.surtug-dalam-kota-pdf', [
                'data' => $data,
            ]);
            $pdf->setPaper('A4', 'portrait');
            return $pdf->stream('dashboard.surat-tugas.pengecekan-surat-tugas.surtug-dalam-kota-pdf');
        }
        else {
            $pdf = PDF::loadView('dashboard.surat-tugas.pengecekan-surat-tugas.surtug-luar-kota-pdf', [
                'data' => $data,
            ]);
            $pdf->setPaper('A4', 'portrait');
            return $pdf->stream('dashboard.surat-tugas.pengecekan-surat-tugas.surtug-luar-kota-pdf');
        } 
    }

    public function selesaiAction($id)
    {
        $pengajuanSuratTugas = PengajuanSuratTugas::find($id);
        $pengajuanSuratTugas->kode_track = 5;
        $pengajuanSuratTugas->save();

        return redirect()->route('pengecekansurtug.index');
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
        // Ambil detail surat tugas berdasarkan ID
        $detailPengecekanSuratTugas = PengajuanSuratTugas::findOrFail($id);

        // Periksa apakah user yang sedang login memiliki hak akses ke surat tugas tersebut
        if (auth()->user()->id === $detailPengecekanSuratTugas->user_id &&  $detailPengecekanSuratTugas->lampiran === 2) {
            $menus = Menu::with('submenus')->get();
            $users = User::all();

            return view('dashboard.surat-tugas.pengecekan-surat-tugas.cek', [
                'menus' => $menus,
                'users' => $users,
                'detailPengecekanSuratTugas' => $detailPengecekanSuratTugas,
            ]);
        } else {
            // Handle unauthorized access
            abort(403, 'Unauthorized access');
        }
    }

    public function showDalam($id)
    {
        // Ambil detail surat tugas berdasarkan ID
        $detailPengecekanSuratTugasDalam = PengajuanSuratTugas::findOrFail($id);

        // Periksa apakah user yang sedang login memiliki hak akses ke surat tugas tersebut
        if (auth()->user()->id === $detailPengecekanSuratTugasDalam->user_id && in_array($detailPengecekanSuratTugasDalam->lampiran, [0, 1])) {
            $menus = Menu::with('submenus')->get();
            $users = User::all();

            return view('dashboard.surat-tugas.pengecekan-surat-tugas.cek_dalam', [
                'menus' => $menus,
                'users' => $users,
                'detailPengecekanSuratTugasDalam' => $detailPengecekanSuratTugasDalam,
            ]);
        } else {
            // Handle unauthorized access
            abort(403, 'Unauthorized access');
        }
    }

    public function tampil($id)
    {
        // Ambil detail dari database berdasarkan ID
        $detailPengecekanSuratTugas = PengajuanSuratTugas::findOrFail($id);

        if (auth()->user()->id === $detailPengecekanSuratTugas->user_id ) {
            $menus = Menu::with('submenus')->get();
            $users = User::all();

            // Periksa nilai 'lampiran'
            if ($detailPengecekanSuratTugas->lampiran == 2) {
                return view('dashboard.surat-tugas.pengecekan-surat-tugas.cek', ['menus' => $menus, 'users' => $users, 'detailPengecekanSuratTugas' => $detailPengecekanSuratTugas], compact('detailPengecekanSuratTugas'));
            } else {
                return view('dashboard.surat-tugas.pengecekan-surat-tugas.cek_dalam', ['menus' => $menus, 'users' => $users, 'detailPengecekanSuratTugas' => $detailPengecekanSuratTugas] , compact('detailPengecekanSuratTugas'));
            }
        } else {
            // Handle unauthorized access
            abort(403, 'Unauthorized access');
        }
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