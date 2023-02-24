<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = "proposal";
    protected $fillable = ['id_proposal', 'id_ta', 'judul', 'proposal', 'ruangan', 'jam_sidang', 'tanggal_sidang', 'status', 'komentar1', 'komentar2'];
}
