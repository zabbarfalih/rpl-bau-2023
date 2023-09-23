<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Mendapatkan variabel $formattedName dari shared data di request
            $formattedName = $request->attributes->get('formattedName');

            // Lakukan sesuatu dengan variabel $formattedName jika diperlukan
            // Contoh: memasukkannya ke dalam data yang akan dilewatkan ke tampilan

            // Kemudian lanjutkan ke tindakan berikutnya
            return $next($request);
        });
    }
}
