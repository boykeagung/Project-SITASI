<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_Sidang_TA extends Model
{
    use HasFactory;
    protected $fillable=['id_sidang_ta','id_ta','judul','buku_ta'];
}
