<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\TebakPertandingan;
use App\Models\Pertandingan;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardMember extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->check()) {
            $memberId = Auth::guard('member')->id();

            // Hitung jumlah prediksi oleh member ini
            $totalPrediksi = TebakPertandingan::where('member_id', $memberId)->count();

            // Ambil data member, termasuk kolom poin_terkini
            $member = Member::find($memberId);

            return view('publik.member.dashboard', [
                'totalPrediksi' => $totalPrediksi,
                'member' => $member,
            ]);
        }

        return redirect()->route('member.login')->with('error', 'Silakan login terlebih dahulu.');
    }
}