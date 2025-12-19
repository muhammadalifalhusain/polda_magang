<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    protected $table = 'status_pengajuan';
    protected $guarded = ['id'];

    public function pengajuan()
    {
        return $this->belongsTo(
        PengajuanMagang::class,
        'tracking_code',
        'tracking_code'
    );
    }
}
