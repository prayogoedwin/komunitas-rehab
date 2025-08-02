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

use App\Models\ProdukStokVarian;
use App\Models\Produk;

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


    public function getVarians($id)
    {
        $varians = ProdukStokVarian::where('produk_id', $id)->get(['id', 'varian', 'ukuran', 'stok']);
        return response()->json($varians);
    }
    

    public function cekPoin(Request $request)
    {
        $memberId = Auth::guard('member')->id();
        $member = Member::find($memberId);
        $produk = Produk::find($request->produk_id);

        if (!$produk || !$member) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }

        if ($member->poin_terkini >= $produk->poin) {
            // Simpan order
            // $order = Order::create([
            //     'member_id' => $memberId,
            //     'produk_id' => $request->produk_id,
            //     'produk_stok_varian_id' => $request->produk_stok_varian_id,
            //     'poin_dipakai' => $produk->poin,
            // ]);

            // Kurangi poin
            $member->decrement('poin_terkini', $produk->poin);

            return response()->json(['success' => true, 'message' => 'Berhasil tukar']);
        } else {
            return response()->json(['success' => false, 'message' => 'Maaf, poin Anda tidak cukup']);
        }
    }
    
    public function riwayatPrediksi(){
        $expiration = env('REDIS_TIME', 86400);

        if (Auth::guard('member')->check()) {

            $memberId = Auth::guard('member')->id();

            $tontons = Cache::remember('tonton_data', $expiration, function () {
            return Pertandingan::where('status', 1)->get();
            });

            return view('member.riwayat-prediksi', compact('tontons'));
        }
    }

    public function riwayatTukarPoin(){
        $expiration = env('REDIS_TIME', 86400);

        if (Auth::guard('member')->check()) {

            $memberId = Auth::guard('member')->id();

            $tontons = Cache::remember('tonton_data', $expiration, function () {
            return Pertandingan::where('status', 1)->get();
            });

            return view('member.riwayat-poin', compact('tontons'));
        }
    }

    public function profilMember(){
        $expiration = env('REDIS_TIME', 86400);

        if (Auth::guard('member')->check()) {

            $memberId = Auth::guard('member')->id();

            $expiration = env('REDIS_TIME', 86400);
            $cara = Cache::remember('cara_data', $expiration, function () {
                return Informasi::where('slug', 'cara_main')->first();
            });

            return view('member.profil', compact('cara'));
        }
    }
}