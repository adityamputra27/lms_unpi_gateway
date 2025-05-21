<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeederMatakuliah extends Model
{
    use HasFactory;

    protected $table = 'feeder_matakuliah';

    protected $primaryKey = 'matkul_id';

    protected $fillable = [
        'matkul_jam',
        'matkul_hari',
        'status_matkul',
        'kode_matkul',
        'ada_acara_praktek',
        'ada_bahan_ajar',
        'ada_diktat',
        'ada_sap',
        'ada_silabus',
        'id_jenis_mata_kuliah',
        'id_kelompok_mata_kuliah',
        'pt_id',
        'id_perguruan_tinggi',
        'kode_perguruan_tinggi',
        'id_matkul',
        'prodi_id',
        'id_prodi',
        'kode_mata_kuliah',
        'metode_kuliah',
        'nama_mata_kuliah',
        'nama_program_studi',
        'sks_mata_kuliah',
        'sks_praktek',
        'sks_praktek_lapangan',
        'sks_simulasi',
        'sks_tatap_muka',
        'tanggal_mulai_efektif',
        'tanggal_selesai_efektif',
        'updated',
        'postdated',
        'updated_id',
        'posted_id',
    ];
}
