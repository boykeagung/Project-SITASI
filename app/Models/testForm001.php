<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testForm001 extends Model
{
    use HasFactory;
    protected $table = "form001";
    protected $fillable = ['username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1',
     'perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2'];
}

