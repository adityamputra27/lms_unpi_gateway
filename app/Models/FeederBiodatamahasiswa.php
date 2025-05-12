<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeederBiodatamahasiswa extends Model
{
    use HasFactory;

    protected $table = 'feeder_biodatamahasiswa';
    protected $fillable = [
        'biodatamahasiswa_id',
        'mahasiswa_id',
        'biodatamahasiswa_imageid',
        'biodatamahasiswa_image',
        'nama_mahasiswa',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'id_mahasiswa',
        'pt_id',
        'kode_perguruan_tinggi',
        'id_perguruan_tinggi',
        'id_agama',
        'nama_agama',
        'nik',
        'nisn',
        'npwp',
        'id_negara',
        'kewarganegaraan',
        'jalan',
        'dusun',
        'rt',
        'rw',
        'kelurahan',
        'kode_pos',
        'id_wilayah',
        'nama_wilayah',
        'id_jenis_tinggal',
        'nama_jenis_tinggal',
        'id_alat_transportasi',
        'nama_alat_transportasi',
        'telepon',
        'handphone',
        'email',
        'penerima_kps',
        'nomor_kps',
        'nik_ayah',
        'nama_ayah',
        'tanggal_lahir_ayah',
        'id_pendidikan_ayah',
        'nama_pendidikan_ayah',
        'id_pekerjaan_ayah',
        'nama_pekerjaan_ayah',
        'id_penghasilan_ayah',
        'nama_penghasilan_ayah',
        'nik_ibu',
        'nama_ibu',
        'tanggal_lahir_ibu',
        'id_pendidikan_ibu',
        'nama_pendidikan_ibu',
        'id_pekerjaan_ibu',
        'nama_pekerjaan_ibu',
        'id_penghasilan_ibu',
        'nama_penghasilan_ibu',
        'nama_wali',
        'tanggal_lahir_wali',
        'id_pendidikan_wali',
        'nama_pendidikan_wali',
        'id_pekerjaan_wali',
        'nama_pekerjaan_wali',
        'id_penghasilan_wali',
        'nama_penghasilan_wali',
        'id_kebutuhan_khusus_mahasiswa',
        'nama_kebutuhan_khusus_mahasiswa',
        'id_kebutuhan_khusus_ayah',
        'nama_kebutuhan_khusus_ayah',
        'id_kebutuhan_khusus_ibu',
        'nama_kebutuhan_khusus_ibu'
    ];

    public function feederMahasiswa() : BelongsTo
    {
        return $this->belongsTo(FeederMahasiswa::class, 'mahasiswa_id', 'mahasiswa_id');
    }
}
