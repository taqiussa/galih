<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class GetPendaftarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Siswa::query()
            ->select('id', 'kode_daftar', 'name')
            ->orderBy('kode_daftar')
            ->when(
                $request->search,
                fn($query) => $query
                    ->where('kode_daftar', 'like', "%{$request->search}%")
                    ->orWhere('name', 'like', "%{$request->search}%")
            )
            ->get();
    }
}
