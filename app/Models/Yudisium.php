<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yudisium extends Model
{
    public $table = "Yudisium";
    protected $fillable = ['nrp', 'toga', 'status_yudisium'];
    public $timestamps = false;
    use HasFactory;
}