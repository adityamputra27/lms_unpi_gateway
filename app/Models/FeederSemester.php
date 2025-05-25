<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeederSemester extends Model
{
    use HasFactory;

    protected $table = 'feeder_semester';
    protected $primaryKey = 'semester_id';

    protected $fillable = [
        'id_semester',
        'id_tahun_ajaran',
        'angkatan_id',
        'angkatan',
        'nama_semester',
        'semester',
        'a_periode_aktif',
        'tanggal_mulai',
        'tanggal_selesai',
        'semester_order',
        'semester_code',
        'semester_status',
        'postdated',
        'updated',
        'posted_id',
        'updated_id',
    ];
}
