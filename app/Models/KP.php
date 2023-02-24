<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KP extends Model
{
    use HasFactory;
    protected $table = "kp";
    protected $fillable = ['id_kp', 'username', 'pembimbing_kp', 'perusahaan', 'alamat_perusahaan', 'bidang_perusahaan', 'pembimbing_perusahaan', 'mulai_kp', 'selesai_kp'];
}
