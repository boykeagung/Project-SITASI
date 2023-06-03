<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{

    public $table = "notifikasi";
    protected $fillable = ['notifikasi_own', 'notifikasi_message'];
    public $timestamps = false;
    use HasFactory;
}