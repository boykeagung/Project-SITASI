<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiDospem extends Model
{
    use HasFactory;
    protected $table = "nilai_dospem";
    protected $fillable = ['id_nilai_dospem','username','name','kepribadian', 'penguasaan_materi', 'keterampilan', 
                            'kreatifitas', 'tanggung_jawab', 'komunikasi', 'pdf_nilai','rata_rata'];
}
