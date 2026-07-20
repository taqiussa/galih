<?php

namespace App\Http\Controllers\Siswa;

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
                'akademik',
                'biodata',
                'seleksiAgama',
                'wawancara'
            ])
            ->first();

        $data = [
            'user' => $user,
        ];

        return view('print.pengumuman', $data);
    }
}
