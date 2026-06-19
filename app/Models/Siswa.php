<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Siswa extends Authenticatable
{
    use HasRoles;

    protected $guarded = [];
    protected $table = 'siswa';
    protected $hidden = ['password'];

    public function biodata(): HasOne
    {
        return $this->hasOne(Biodata::class, 'kode_daftar', 'kode_daftar')->withDefault();
    }
}
