<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function akademik(): BelongsTo
    {
        return $this->belongsTo(Akademik::class, 'kode_daftar', 'kode_daftar');
    }


    /**
     * Get the berkas associated with the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function berkas(): HasOne
    {
        return $this->hasOne(Berkas::class, 'kode_daftar', 'kode_daftar')->withDefault();
    }

    public function jawaban(): HasMany
    {
        return $this->hasMany(Jawaban::class, 'kode_daftar', 'kode_daftar');
    }

    public function biodata(): HasOne
    {
        return $this->hasOne(Biodata::class, 'kode_daftar', 'kode_daftar')->withDefault();
    }

    public function seleksiAgama(): HasMany
    {
        return $this->hasMany(SeleksiAgama::class, 'kode_daftar', 'kode_daftar');
    }

    public function seleksiWawancara(): BelongsTo
    {
        return $this->belongsTo(SeleksiWawancara::class, 'kode_daftar', 'kode_daftar');
    }

    public function seragam(): BelongsTo
    {
        return $this->belongsTo(Seragam::class, 'kode_daftar', 'kode_daftar');
    }

    /**
     * Get the wawancara that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wawancara(): BelongsTo
    {
        return $this->belongsTo(Wawancara::class, 'kode_daftar', 'kode_daftar')->withDefault();
    }
}
