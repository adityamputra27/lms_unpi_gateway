<?php

namespace App\Http\Controllers\API\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Responses\Response;
use App\Models\FeederBiodatamahasiswa;
use App\Models\FeederDataprodi;
use App\Models\FeederMahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function me(Request $request)
    {
        try {
            if (empty($request->nim)) {
                return Response::notFound('NIM mahasiswa harus diisi');
            }

            if (empty($request->tanggal_lahir)) {
                return Response::internalServerError('Tanggal lahir mahasiswa harus diisi');
            }

            $nim = $request->nim;
            $tanggalLahir = Carbon::createFromFormat('Y-m-d', $request->tanggal_lahir)->format('Y-m-d');

            $mahasiswa = FeederMahasiswa::where('nim', $nim)
                ->where('tanggal_lahir', $tanggalLahir)
                ->where('pt_id', 1)
                ->where('status_mahasiswa', 'Aktif')
                ->orderBy('updated', 'DESC')
                ->first();

            if (!$mahasiswa) {
                return Response::notFound('Data mahasiswa tidak ditemukan');
            }

            $biodata = FeederBiodatamahasiswa::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
                ->orderBy('biodatamahasiswa_id', 'DESC')
                ->first();

            if (!$biodata) {
                return Response::notFound('Biodata mahasiswa tidak ditemukan!');
            }

            $mahasiswaLengkap = DB::table('feeder_mahasiswa as fm')
                ->select([
                    'fm.mahasiswa_id as id',
                    'fm.kode_mahasiswa',
                    'fm.nama_mahasiswa',
                    'fm.jenis_kelamin',
                    'fm.tanggal_lahir',
                    'fm.status_mahasiswa',
                    'fm.id_agama',
                    'fm.nama_agama',
                    'fm.prodi_id',
                    'fm.angkatan_id',
                    'fm.angkatan_nama',
                    'fm.fakultas_id',
                    'fm.nama_fakultas',
                    'fm.kode_fakultas',
                    'fm.jenjang_pendidikan_id',
                    'fm.nama_jenjang_pendidikan',
                    'fm.nama_program_studi',
                    'fm.nama_status_mahasiswa',
                    'fm.nim',
                    'fm.id_periode',
                    'fm.nama_periode_masuk',
                    'fm.batas_studi',
                    'fm.postdated',
                    'fm.updated',
                    'fbm.nik as nik_mahasiswa'
                ])
                ->leftJoin('feeder_biodatamahasiswa as fbm', function ($join) {
                    $join->on('fm.mahasiswa_id', '=', 'fbm.mahasiswa_id')
                        ->whereRaw('fbm.biodatamahasiswa_id = (SELECT MAX(biodatamahasiswa_id) FROM feeder_biodatamahasiswa WHERE mahasiswa_id = fm.mahasiswa_id)');
                })
                ->where('fm.nim', $nim)
                ->where('fm.tanggal_lahir', $tanggalLahir)
                ->where('fm.pt_id', 1)
                ->whereNotNull('fm.nama_program_studi')
                ->where('fm.status_mahasiswa', 'Aktif')
                ->first();

            if (!$mahasiswaLengkap) {
                return Response::notFound('Data lengkap mahasiswa tidak ditemukan');
            }

            $daftarProdiValid = FeederDataprodi::where('pt_id', 1)
                ->whereNotNull('prodi_code')
                ->pluck('nama_program_studi')
                ->toArray();

            if (!in_array($mahasiswaLengkap->nama_program_studi, $daftarProdiValid)) {
                return Response::notFound('Program studi mahasiswa tidak valid');
            }

            $tahunSekarang = date('Y');
            $batasStudi = explode('/', $mahasiswaLengkap->batas_studi)[0] ?? null;
            $tahunBatasStudi = $batasStudi ? (int)$batasStudi : (int)$tahunSekarang + 7;

            if ($tahunSekarang > $tahunBatasStudi) {
                return Response::notFound('Masa studi mahasiswa telah berakhir!');
            }

            return Response::ok((array)$mahasiswaLengkap);
        } catch (\Throwable $th) {
            return Response::badRequest($th->getMessage());
        }
    }
}
