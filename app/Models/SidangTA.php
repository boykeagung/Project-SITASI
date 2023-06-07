<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidangTA extends Model
{
    use HasFactory;
    protected $table = "sidang_ta";
    protected $fillable = ['id_sidang_ta', 'id_ta', 'judul', 'buku_ta', 'ruangan', 'jam_sidang', 'jadwal_sidang', 'status', 'komentar1', 'komentar2'];
}
