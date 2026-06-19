<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PrintFormulirController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $user = Siswa::query()
            ->whereKodeDaftar($id)
            ->with([
                'biodata',
            ])
            ->first();

        $data = [
            'user' => $user,
        ];

        return view('print.formulir-pendaftaran', $data);
    }
}
