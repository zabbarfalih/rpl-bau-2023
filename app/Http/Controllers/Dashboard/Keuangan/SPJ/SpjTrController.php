<?php

namespace App\Http\Controllers\Dashboard\Keuangan\SPJ;

use App\Models\SpjTr;
use App\Http\Requests\StoreSpjTrRequest;
use App\Http\Requests\UpdateSpjTrRequest;
use App\Models\Menu;
use App\Models\User;
use App\Models\TabelSpj;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;

class SpjTrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $menus = Menu::with('submenus')->get();
        // $users = auth()->user();
        // return view('dashboard.keuangan.spj.index', [
        //     'menus' => $menus,
        //     'users' => $users
        // ]);
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
        return view('dashboard.keuangan.spj-tr.add', [
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

        $spj = SpjTr::create($data);
        return redirect('dashboard/spj/info-pengajuan-spj')->with('success','Pengajuan berhasil dibuat, silakan unggah dokumen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpjTr  $spjTr
     * @return \Illuminate\Http\Response
     */
    public function show(SpjTr $spjTr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpjTr  $spjTr
     * @return \Illuminate\Http\Response
     */
    public function edit(SpjTr $spjTr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpjTrRequest  $request
     * @param  \App\Models\SpjTr  $spjTr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpjTrRequest $request, SpjTr $spjTr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpjTr  $spjTr
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpjTr $spjTr)
    {
        //
    }
}
