<?php

use App\Http\Controllers\API\Mahasiswa\AuthController as MahasiswaAuthController;
use App\Http\Controllers\API\Dosen\AuthController as DosenAuthController;
use App\Http\Controllers\API\MasterDataController;
use App\Http\Controllers\API\MatkulController;
use App\Http\Controllers\API\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/{user}/profile-synchronize', [ProfileController::class, 'update']);
Route::get('/courses', [MatkulController::class, 'list']); // matkul options
Route::get('/religions', [MasterDataController::class, 'religions']); // matkul options

// semester data
Route::get('/semesters', [MasterDataController::class, 'getAllSemester']);
Route::get('/semesters/{id}', [MasterDataController::class, 'getSemesterById']);

Route::prefix('/mahasiswa')->group(function () {
    Route::post('/me', [MahasiswaAuthController::class, 'me']);
});

Route::prefix('/dosen')->group(function () {
    Route::post('/me', [DosenAuthController::class, 'me']);
    Route::get('/all', [DosenAuthController::class, 'all']);
});
