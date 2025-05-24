<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Responses\Response;
use App\Models\FeederDosen;
use App\Models\FeederMahasiswa;
use App\Models\RefAgama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function update(Request $request, string $user)
    {
        if (!in_array($user, ['student', 'lecture'])) {
            return Response::notFound('Resource tidak ditemukan');
        }

        $rules = [];
        $payload = [];

        if ($user === 'student') {
            $payload = $request->only([
                'kode_mahasiswa',
                'nama_mahasiswa',
                'nim',
                'nik_mahasiswa',
                'prodi_id',
                'angkatan_id',
                'fakultas_id',
            ]);

            if ($request->has('user_id')) {
                $payload['updated_id'] = $request->input('user_id');
            }

            $rules = [
                'kode_mahasiswa' => 'required|string|max:100',
                'nama_mahasiswa' => 'required|string|max:100',
                'nim' => 'required|string|max:50',
                'nik_mahasiswa' => 'nullable|string|max:100',
                'prodi_id' => 'required|integer',
                'angkatan_id' => 'required|integer',
                'fakultas_id' => 'required|integer',
            ];

            $model = FeederMahasiswa::where('kode_mahasiswa', $payload['kode_mahasiswa'] ?? '')->first();
        }

        if ($user === 'lecture') {
            $payload = $request->only([
                'kode_dosen',
                'status_dosen',
                'id_agama',
                'jenis_kelamin',
                'nama_dosen',
                'nidn',
                'nip',
                'tanggal_lahir',
            ]);

            $rules = [
                'kode_dosen' => 'required|string|max:100',
                'status_dosen' => 'required|string|max:100',
                'id_agama' => 'nullable|string|max:50',
                'jenis_kelamin' => 'required|in:L,P',
                'nama_dosen' => 'required|string|max:100',
                'nidn' => 'nullable|string|max:50',
                'nip' => 'nullable|string|max:50',
                'tanggal_lahir' => 'required|date_format:Y-m-d',
            ];

            $model = FeederDosen::where('kode_dosen', $payload['kode_dosen'] ?? '')->first();
        }

        $validator = Validator::make($payload, $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        if (!$model) {
            return response()->json(['message' => 'Data pengguna tidak ditemukan'], 404);
        }

        $model->update($payload);

        return response()->json(['message' => 'Profil berhasil diperbarui']);
    }

    public function religions(Request $request)
    {
        $query = RefAgama::query();
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }
        return response()->json($query->get(), 200);
    }
}
