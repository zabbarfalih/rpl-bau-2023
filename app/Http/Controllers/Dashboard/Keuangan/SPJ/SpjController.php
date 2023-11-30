<?php

namespace App\Http\Controllers\Dashboard\Keuangan\SPJ;

use App\Models\Spj;
use App\Models\Menu;
use App\Models\User;
use App\Models\TabelSpj;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::with('submenus')->get();
        $users = auth()->user();
        $spj = Spj::all();
        return view('dashboard.keuangan.spj.index', [
            'menus' => $menus,
            'users' => $users,
            'spj' => $spj
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
        $menus = Menu::with('submenus')->get();
        $users = User::all();
        return view('dashboard.keuangan.spj.add', [
            'menus' => $menus,
            'user' => $users
        ]);

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
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $spj = Spj::create($data);

        return redirect('dashboard/spj/info-pengajuan-spj')->with('success','Pengajuan berhasil dibuat, silakan unggah dokumen');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function show(Spj $spj)
    {
        $menus = Menu::with('submenus')->get();
        $users = User::all();
        $tabelspj = TabelSpj::where('spj_id', $spj->id)->get();

        return view('dashboard.keuangan.spj.detail', [
            'menus' => $menus,
            'users' => $users,
            'spj' => $spj,
            'tabelspj' => $tabelspj
        ]);
    }

    public function hapusSpj($spj)
    {
        $spjModel = Spj::findOrFail($spj);

        if (!$spjModel) {
            return response()->json(['message' => 'SPJ tidak ditemukan'], 404);
        }

        $spjModel->delete();

        return redirect('/dashboard/spj/info-pengajuan-spj')->with('success', 'SPJ berhasil dihapus');
    }

    public function hapusUnggahan($spj)
    {
        $spjModel = Spj::findOrFail($spj);

        if (!$spjModel) {
            return response()->json(['message' => 'SPJ tidak ditemukan'], 404);
        }

        $spjModel->update(['total' => null]);
        $spjModel->update(['total_bruto' => null]);
        $spjModel->update(['total_pajak' => null]);
        $spjModel->tabel()->delete();

        return redirect('/dashboard/spj/info-pengajuan-spj')->with('success', 'Dokumen SPJ berhasil dihapus');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function edit(Spj $spj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spj $spj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spj $spj)
    {
        //
    }
}
