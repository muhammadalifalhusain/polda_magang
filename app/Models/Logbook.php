<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    protected $table = 'logbook';

    protected $guarded = ['id'];
    public $timestamps = true;

    // Jika logbook terhubung ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Jika logbook terhubung ke pengajuan magang
    // public function pengajuan()
    // {
    //     return $this->belongsTo(PengajuanMagang::class, 'pengajuan_id');
    // }
}
