<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Models\Kategori;

use App\Models\Faq;
use App\Models\Pertandingan;
use App\Models\TebakPertandingan;

use App\Models\TipeProduk;
use App\Models\KateegoriProduk;

use App\Models\Informasi;
use App\Models\Berita;
use App\Models\Produk;
use App\Models\Banner;

use App\Models\Member;

use Illuminate\Support\Str;

class PublikController extends Controller {

  public function index() {
    $expiration = env('REDIS_TIME', 86400);
    
    
    if (Auth::guard('member')->check()) {

        $memberId = Auth::guard('member')->id();
        $tontons = Cache::remember('tonton_data_member:' . $memberId, $expiration, function () use ($memberId) {
            return Pertandingan::where('status', 1)
                ->with(['tebakPertandingans' => function ($query) use ($memberId) {
                    $query->where('member_id', $memberId);
                }])
                ->get();
        });

    }else{

        $tontons = Cache::remember('tonton_data', $expiration, function () {
            return Pertandingan::where('status', 1)->get();
        });
    }

    


    $banners = Cache::remember('banner_data', $expiration, function () {
        return Banner::where('status', 1)->get();
    });

    return view('publik.main', compact('tontons', 'banners'));
  }

  public function caraMain() {
    $expiration = env('REDIS_TIME', 86400);
    $cara = Cache::remember('cara_data', $expiration, function () {
        return Informasi::where('slug', 'cara_main')->first();
    });
    return view('publik.cara', compact('cara'));
  }

  public function faq() {

    $expiration = env('REDIS_TIME', 86400);
    $faqs = Cache::remember('faqs_data', $expiration, function () {
        return Faq::all();
    });
    
    return view('publik.faq', compact('faqs'));

  }

  public function tonton() {

    $expiration = env('REDIS_TIME', 86400);
    $tontons = Cache::remember('tonton_data', $expiration, function () {
        return Pertandingan::all();
    });
    return view('publik.tonton', compact('tontons'));
  }

  public function peringkat() {
    $expiration = env('REDIS_TIME', 86400);
    // Data TOP MEMBERS (ditambahkan di sini)
    $members = Cache::remember('top_members', $expiration, function () {
        return Member::where('poin_terkini', '!=', 0)
            ->orderBy('poin_terkini', 'DESC') // Urutkan poin tertinggi di atas
            ->limit(100) // Batasi 100 member
            ->get();
    });

    return view('publik.peringkat', compact('members'));
  }

  public function berita() {

    $expiration = env('REDIS_TIME', 86400);
    $beritas = Cache::remember('beritas_data', $expiration, function () {
        return Berita::all();
    });
    
    return view('publik.berita', compact('beritas'));
  }

  public function berita_detail($id)
  {
      $berita = Berita::where('id', $id)->firstOrFail();

      return view('publik.berita-detail', compact('berita'));
  }

  public function katalog(Request $request)
  {
      $expiration = env('REDIS_TIME', 86400);

      $tipeProduks = Cache::remember('tipe_produk_data', $expiration, function () {
          return TipeProduk::all();
      });

      $kategoriProduks = Cache::remember('kategori_produk_data', $expiration, function () {
          return KateegoriProduk::all();
      });

      // Ambil semua produk dari cache
      $produks = Cache::remember('produk_data', $expiration, function () {
          return Produk::with(['kategori', 'tipe'])
              ->where('status', 1)
              ->get();
      });

      // Filter berdasarkan form input
      if ($request->filled('tipe_id')) {
          $produks = $produks->where('tipe_produk', $request->tipe_id);
      }

      if ($request->filled('kategori_id')) {
          $produks = $produks->where('kategori_produk', $request->kategori_id);
      }

      if ($request->filled('q')) {
          $produks = $produks->filter(function ($item) use ($request) {
              return Str::contains(Str::lower($item->nama), Str::lower($request->q));
          });
      }

      if ($request->filled('sort')) {
          switch ($request->sort) {
              case 1:
                  $produks = $produks->sortBy('poin');
                  break;
              case 2:
                  $produks = $produks->sortByDesc('poin');
                  break;
              case 3:
                  $produks = $produks->sortByDesc('created_at');
                  break;
              case 4:
                  $produks = $produks->sortBy('created_at');
                  break;
          }
      }

      return view('publik.katalog', compact('tipeProduks', 'kategoriProduks', 'produks'));
  }

   

}
