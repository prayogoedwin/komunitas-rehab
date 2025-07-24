<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PrediksiMember extends Controller
{
    
    public function store(Request $request, $id)
    {
        $request->validate([
            'pemenang' => 'required',
            'metode' => 'required',
            'ronde' => 'required',
        ]);

        // Simpan ke DB atau sesuaikan dengan logika Anda
        DB::table('prediksis')->insert([
            'tonton_id' => $id,
            'pemenang_id' => $request->pemenang,
            'metode' => $request->metode,
            'ronde' => $request->ronde,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Prediksi berhasil disimpan.']);
    }
    
}