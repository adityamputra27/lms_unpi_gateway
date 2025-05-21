<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeederDosen extends Model
{
    use HasFactory;

    protected $table = 'feeder_dosen';
    protected $primaryKey = 'dosen_id';
}
