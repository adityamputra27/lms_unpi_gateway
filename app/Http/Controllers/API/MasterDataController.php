<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FeederSemester;
use App\Models\RefAgama;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    // Data Agama
    public function religions(Request $request)
    {
        $query = RefAgama::query();
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }
        return response()->json($query->get(), 200);
    }

    // Data Semester
    public function getAllSemester(Request $request)
    {
        $query = FeederSemester::query();

        if ($request->filled('semester_id')) {
            $semesterIds = $request->input('semester_id');

            if (is_string($semesterIds)) {
                $semesterIds = explode(',', $semesterIds);
            }

            $query->whereIn('semester_id', (array) $semesterIds);
        }


        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_mulai', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('tanggal_selesai', '<=', $request->tanggal_selesai);
        }

        $status = $request->input('status') ?? $request->input('semester_status');
        if (!empty($status)) {
            $query->where('semester_status', $status);
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }

        $semesters = $query->orderByDesc('semester_order')->get();

        return response()->json($semesters);
    }

    public function getSemesterById($id)
    {
        $semester = FeederSemester::find($id);

        if (!$semester) {
            return response()->json(['message' => 'Semester tidak ditemukan'], 404);
        }

        return response()->json($semester);
    }
}
