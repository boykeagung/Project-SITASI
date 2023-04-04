<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form001 extends Model
{
    use HasFactory;
    protected $table = "kp_form001";
    protected $fillable = ['id','username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1',
    'perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2', 'status','pdf_form001', 'surat'];
}

