<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FeederMatakuliah;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function list(Request $request)
    {
        $query = FeederMatakuliah::query();

        if ($request->has('status')) {
            $query->where('status_matkul', $request->input('status'));
        }
        if ($request->has('prodi_id')) {
            $query->where('prodi_id', $request->input('prodi_id'));
        }
        if ($request->has('start_date')) {
            $query->whereDate('tanggal_mulai_efektif', '>=', $request->input('start_date'));
        }
        if ($request->has('end_date')) {
            $query->whereDate('tanggal_selesai_efektif', '<=', $request->input('end_date'));
        }
        if ($request->filled('matkul_id')) {
            $matkulIds = $request->input('matkul_id');

            if (is_string($matkulIds)) {
                $matkulIds = explode(',', $matkulIds);
            }

            $query->whereIn('matkul_id', (array) $matkulIds);
        }

        return response()->json($query->get(), 200);
    }
}
