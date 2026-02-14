<?php

namespace App\Http\Controllers;

use App\Models\CalonAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class KelulusanController extends Controller
{
    public function index()
    {
        return view('kelulusan');
    }

    public function cekKelulusan(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nim' => [
                'required',
                'string',
                'size:10',  // ⬅️ UBAH DARI 8 MENJADI 10
                'regex:/^[0-9]+$/'
            ]
        ], [
            'nim.required' => 'NIM tidak boleh kosong',
            'nim.string' => 'NIM harus berupa teks',
            'nim.size' => 'NIM harus 10 digit',  // ⬅️ UBAH PESAN ERROR
            'nim.regex' => 'NIM hanya boleh berisi angka'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $validator->errors()->first()
            ], 400);
        }

        $calon = CalonAnggota::where('nim', $request->nim)->first();

        if (!$calon) {
            return response()->json([
                'status' => 'NOT_FOUND',
                'message' => 'NIM tidak ditemukan'
            ], 404);
        }

        if ($calon->status === 'LULUS') {
            return response()->json([
                'status' => 'LULUS',
                'nama' => $calon->nama_lengkap,
                'divisi' => $calon->divisi
            ], 200);
        }

        return response()->json([
            'status' => 'TIDAK_LULUS',
            'nama' => $calon->nama_lengkap
        ], 200);
    }
}