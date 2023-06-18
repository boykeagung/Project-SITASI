<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKoordinatorKP extends Model
{
    use HasFactory;
    protected $table = "nilai_koordinator_kp";
    protected $fillable = ['id_nilai_koor','id_nilai_dospem','id_nilai_dospem_per','username','name','rataDospem', 'rataDospemPer','sidang_penguji','sidang_pembimbing'];
}
