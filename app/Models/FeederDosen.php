<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeederDosen extends Model
{
    use HasFactory;

    protected $table = 'feeder_dosen';
    protected $primaryKey = 'dosen_id';

    const CREATED_AT = 'postdated';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'kode_dosen',
        'status_dosen',
        'pt_id',
        'id_perguruan_tinggi',
        'kode_perguruan_tinggi',
        'id_agama',
        'id_dosen',
        'id_status_aktif',
        'jenis_kelamin',
        'nama_agama',
        'nama_dosen',
        'nama_status_aktif',
        'nidn',
        'nip',
        'admin_id',
        'admin_username',
        'admin_password',
        'admin_email',
        'admincat_id',
        'admincat_nama',
        'tanggal_lahir',
        'updated',
        'postdated',
        'updated_id',
        'posted_id',
    ];
}
