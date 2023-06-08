<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKoordinatorKP extends Model
{
    use HasFactory;
    protected $table = "nilai_koordinator_kp";
    protected $fillable = ['username','name','sidang_penguji','sidang_pembimbing'];
}
