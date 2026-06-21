<?php

namespace App\Http\Controllers\Print;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PrintPengumumanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Siswa::query()
            ->whereKodeDaftar($request->kode_daftar)
            ->with([
                'biodata',
                'seleksiAgama',
                'seleksiWawancara'
            ])
            ->first();

        $data = [
            'user' => $user,
        ];

        return view('print.pengumuman', $data);
    }
}
