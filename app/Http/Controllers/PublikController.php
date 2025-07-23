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

class PublikController extends Controller {

  public function index() {
    return view('publik.main');
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
    return view('publik.peringkat');
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

  public function katalog() {

    $expiration = env('REDIS_TIME', 86400);
    $tipeProduks = Cache::remember('tipe_produk_data', $expiration, function () {
        return TipeProduk::all();
    });

    $kategoriProduks = Cache::remember('kategori_produk_data', $expiration, function () {
        return KateegoriProduk::all();
    });

    $produks = Cache::remember('produk_data', $expiration, function () {
    return Produk::with(['kategori', 'tipe'])
        ->where('status', 1)
        ->get();
    });

    return view('publik.katalog', compact('tipeProduks','kategoriProduks','produks'));
  }

   

}
