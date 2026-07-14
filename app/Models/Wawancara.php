<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wawancara extends Model
{
    protected $guarded = [];
    protected $table = 'wawancara';

    /**
     * Get the ekstrakurikuler that owns the Wawancara
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'ekstrakurikuler_id')->withDefault();
    }

    /**
     * Get the guru that owns the Wawancara
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    /**
     * Get the siswa that owns the Wawancara
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'kode_daftar', 'kode_daftar')->withDefault();
    }
}
