<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\TebakPertandingan;
use Illuminate\Support\Facades\Auth;

class PrediksiMember extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'pemenang' => 'required',
            'metode' => 'required',
            'ronde' => 'required',
        ]);

        TebakPertandingan::create([
            'member_id' => Auth::guard('member')->id(),
            'pertandingan_id' => $id,
            'tebak_pemenang_id' => $request->pemenang,
            'tebak_pemenang' => 1, // 1 artinya user sudah menebak pemenang
            'tebak_metode' => $request->metode,
            'tebak_ronde' => $request->ronde,
        ]);

        return response()->json(['message' => 'Prediksi berhasil disimpan.']);
    }
}