<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_Residensi extends Model
{
    use HasFactory;
    protected $table = "residensi";
    protected $fillable = ['id_residensi', 'id_ta', 'nama', 'tanggal', 'jam_masuk', 'jam_keluar'];
}