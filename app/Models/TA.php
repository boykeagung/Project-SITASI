<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TA extends Model
{
    use HasFactory;
    protected $table = "ta";
    protected $fillable = ['id_ta', 'username', 'pembimbing1', 'pembimbing2', 'penguji1', 'penguji2', 'judul', 'draft'];
}
