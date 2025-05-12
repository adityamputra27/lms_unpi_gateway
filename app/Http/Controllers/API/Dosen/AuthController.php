<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use App\Http\Responses\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function all()
    {
        $lectures = DB::table('feeder_dosen')->get()->toArray();
        return Response::ok($lectures);
    }

    public function me(Request $request)
    {
        try {
            $lectureName = $request->lecture_name;
            $lectureCode = $request->lecture_code;

            $lectureData = DB::table('feeder_dosen')
                ->where('nama_dosen', 'LIKE', "%$lectureName%")
                ->where('kode_dosen', $lectureCode)
                ->first();

            if (!$lectureData) {
                return Response::notFound('Data dosen tidak ditemukan!');
            }

            return Response::ok((array) $lectureData);
            
        } catch (\Throwable $th) {
            return Response::badRequest($th->getMessage());
        }
    }
}
