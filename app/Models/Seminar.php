<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;
    protected $table = "seminar";
    protected $fillable = ['id_seminar', 'id_ta', 'judul', 'jurnal', 'draft', 'ruangan', 'jam_seminar', 'tanggal_seminar', 'status', 'komentar1', 'komentar2'];
}
