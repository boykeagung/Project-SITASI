<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sidang_kp extends Model
{
    use HasFactory;
    protected $table = "sidang_kp";
    protected $fillable = ['id_sidang_kp', 'id_kp', 'penguji1', 'penguji2', 'laporan', 'ruangan', 'jam_sidang', 'tanggal_sidang', 'status', 'nilai', 'komentar1', 'komentar2'];
}
