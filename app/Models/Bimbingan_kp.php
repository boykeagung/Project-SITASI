<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan_kp extends Model
{
    use HasFactory;
    protected $table = "bimbingan_kp";
    protected $fillable = ['id_bkp', 'id_ta', 'tanggal_bimbingan', 'kegiatan', 'status_p1',];
}
