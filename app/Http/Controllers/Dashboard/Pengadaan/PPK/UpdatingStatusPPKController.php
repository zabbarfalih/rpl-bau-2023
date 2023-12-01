<?php

namespace App\Http\Controllers\Dashboard\Pengadaan\PPK;

use App\Models\Menu;

use App\Models\Role;
use App\Models\User;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdatingStatusPPKController extends Controller
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
        $dokumen = Dokumen::all();
        return view('dashboard.pengadaan.ppk.index', [
            'menu' => $menu,
            'users' => $users,
            'dokumens' => $dokumen
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
        return view('dashboard.pengadaan.ppk.details', [
            'menu' => $menu,
            'roles' => $roles,
            'dokumen' => $dokumen
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
