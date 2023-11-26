<?php

namespace App\Http\Controllers\Dashboard\Keuangan\SPJ;

use App\Models\Spj;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoPengajuanSpjController extends Controller
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
        $users = User::all();
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
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $spj = Spj::findOrFail((int)$id);
            $menus = Menu::with('submenus')->get();
            return view('dashboard.keuangan.spj.detail', [
                'menus' => $menus,
                'spj' => $spj]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function spjtemplatedownload()
    {
        $path = public_path('download\template-spj honor dosen.xlsx');
        $fileName = 'template-spj honor dosen.xlsx';

        return response()->download($path, $fileName, ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']);
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
