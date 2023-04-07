<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{

    public $table = "notifikasi";
    protected $fillable = ['notifikasi_milik', 'notifikasi_pesan'];
    public $timestamps = false;
    use HasFactory;
}