<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bimbingan_ta extends Model
{
    use HasFactory;
    // use HasFactory;
    protected $table = "bimbingan_ta";
    protected $fillable = ['id_bta', 'id_ta', 'tanggal_bimbingan', 'kegiatan', 'status'];
}
