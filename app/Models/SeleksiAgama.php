<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeleksiAgama extends Model
{
    protected $guarded = [];
    protected $table = 'seleksi_agama';

    /**
     * Get the guru that owns the SeleksiAgama
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    /**
     * Get the siswa that owns the SeleksiAgama
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'kode_daftar', 'kode_daftar')->withDefault();
    }
}
