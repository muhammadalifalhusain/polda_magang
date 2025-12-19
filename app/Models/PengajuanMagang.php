<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanMagang extends Model
{
    protected $table = 'pengajuan_magang';

    protected $guarded = ['id'];

    public function status()
    {
        return $this->hasOne(
        StatusPengajuan::class,
        'tracking_code',
        'tracking_code'
    );
    }
}
