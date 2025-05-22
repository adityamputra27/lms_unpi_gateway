<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefAgama extends Model
{
    use HasFactory;

    protected $table = 'ref_getagama';
    protected $primaryKey = 'id_agama';
}
