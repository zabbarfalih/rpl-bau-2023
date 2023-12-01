<?php

namespace App\Http\Controllers\Dashboard\Pengadaan\PBJ;

use App\Models\Menu;

use App\Models\User;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;

class UpdatingStatusPBJController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::with('submenu')->get();
        $users = User::all();
        $dokumen = Dokumen::where('pelaksana', 1)->get();
        return view('dashboard.pengadaan.pbj.index', [
            'menu' => $menu,
            'dokumen' => $dokumen,
            'users' => $users
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

        // Set nilai pekerja berdasarkan kondisi pelaksana
        $pekerja = ($dokumen->pelaksana == 0) ? 'd-none' : '';

        return view('dashboard.pengadaan.pbj.details', [
            'menu' => $menu,
            'dokumen' => $dokumen,
            'roles' => $roles,
            'pekerja' => $pekerja,
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
