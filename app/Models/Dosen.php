<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $fillable = ['nip', 'nama_lengkap', 'foto', 'email', 'alamat', 'no_hp', 'no_wa', 'status_dosen', 'jabatan_akademik'];
}
