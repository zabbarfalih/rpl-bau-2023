<?php

namespace App\Http\Controllers\Dashboard\Pengadaan\PBJ;

use Carbon\Carbon;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\Dokumen;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Models\DokumenPengadaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdatingStatusPBJController extends Controller
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

    public function index()
    {
        Carbon::setLocale('id');
        $menu = Menu::with('submenu')->get();
        $listPengajuan = Pengadaan::where('penyelenggara', 3)->get();

        foreach ($listPengajuan as $pengajuan) {
            if (!empty($pengajuan->tanggal_pengadaan)) {
                $pengajuan->tanggal_pengadaan_formatted = Carbon::createFromFormat('Y-m-d', $pengajuan->tanggal_pengadaan)
                    ->translatedFormat('j F Y');
            } else {
                $pengajuan->tanggal_pengadaan_formatted = 'Tanggal tidak valid';
            }

            $pengajuan->status_color = $this->getColorStatus($pengajuan->status);
        }

        return view('dashboard.pengadaan.pbj.index', [
            'menu' => $menu,
            'listPengajuan' => $listPengajuan,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $menu = Menu::with('submenu')->get();
        $roles = Role::all();
        $dokumen = Dokumen::find($id);
        $dokumen_pengadaan = DokumenPengadaan::find($id);
        $pengadaan = Pengadaan::where('id', $dokumen->pengadaan_id)->first();

        return view('dashboard.pengadaan.pbj.details', [
            'menu' => $menu,
            'dokumen' => $dokumen,
            'roles' => $roles,
            'dokumen_pengadaan' => $dokumen_pengadaan,
            'pengadaan' => $pengadaan,
            'dokumenPengadaanId' => $dokumen_pengadaan->id
        ]);
    }


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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function upload(Request $request)
    {
        $request->validate([
            'uploadFile' => 'required|file',
            'documentName' => 'required',
            'dokumen_id' => 'required|exists:dokumen_pengadaans,id',
        ]);

        $file = $request->file('uploadFile');
        $filePath = $file->store('public/documents');

        $dokumenPengadaan = DokumenPengadaan::where('id', $request->dokumen_id)->first();
        if ($dokumenPengadaan) {
            $dokumenPengadaan->{$request->documentName} = $filePath;
            $dokumenPengadaan->save();
            return back()->with('success', 'File uploaded successfully.');
        } else {
            return back()->with('error', 'Dokumen Pengadaan not found.');
        }
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
