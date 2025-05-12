<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeederDataprodi extends Model
{
    use HasFactory;

    protected $table = 'feeder_dataprodi';
    protected $fillable = ['prodi_id', 'pt_id', 'id_perguruan_tinggi', 'kode_perguruan_tinggi', 'id_program_studi', 'id_program_studi', 'nama_program_studi', 
        'status_program_studi', 'jenjang_pendidikan_id', 'id_jenjang_pendidikan', 'nama_jenjang_pendidikan', 'fakultas_id', 'id_fakultas', 'kode_fakultas', 
        'nama_fakultas', 'prodi_code', 'postdated', 'updated'];
}
