<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * Get all of the agama for the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seleksiAgama(): HasMany
    {
        return $this->hasMany(SeleksiAgama::class, 'kode_daftar', 'kode_daftar');
    }
}
