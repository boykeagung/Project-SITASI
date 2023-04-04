<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiDospemPerusahaan extends Model
{
    use HasFactory;
    protected $table = "nilai_dospem_perusahaan";
    protected $fillable = ['username','name','kepribadian', 'penguasaan_materi', 'keterampilan', 
                            'kreatifitas', 'tanggung_jawab', 'komunikasi', 'pdf_nilai'];
}
