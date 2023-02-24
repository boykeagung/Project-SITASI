<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswa";
    protected $fillable = ['nrp', 'nama_lengkap', 'password', 'foto', 'email', 'alamat', 'no_hp', 'no_wa', 'ipk', 'sks', 'level'];
}
