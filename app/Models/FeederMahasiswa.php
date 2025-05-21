<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeederMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'feeder_mahasiswa';
    protected $primaryKey = 'mahasiswa_id';
    protected $fillable = [
        'mahasiswa_id',
        'kode_mahasiswa',
        'nama_mahasiswa',
        'jenis_kelamin',
        'tanggal_lahir',
        'status_mahasiswa',
        'pt_id',
        'id_perguruan_tinggi',
        'kode_perguruan_tinggi',
        'id_mahasiswa',
        'id_agama',
        'nama_agama',
        'prodi_id',
        'id_prodi',
        'angkatan_id',
        'angkatan_nama',
        'fakultas_id',
        'kode_fakultas',
        'nama_fakultas',
        'jenjang_pendidikan_id',
        'id_jenjang_pendidikan',
        'nama_jenjang_pendidikan',
        'nama_program_studi',
        'nama_status_mahasiswa',
        'nim',
        'password',
        'id_periode',
        'nama_periode_masuk',
        'id_registrasi_mahasiswa',
        'batas_studi',
        'mahasiswa_dosenid',
        'mahasiswa_beasiswastatus',
        'mahasiswa_jumlahbeasiswa',
        'mahasiswa_sidangid',
        'no_reg',
        'postdated',
        'updated',
        'posted_id',
        'updated_id'
    ];
}
