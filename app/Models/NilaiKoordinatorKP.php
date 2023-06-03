<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKoordinatorKP extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "nilai_koordinator_kp";
    protected $fillable = ['username','name','nilai_sidang_penguji','nilai_sidang_pembimbing', 'pdf_nilai'];
}
