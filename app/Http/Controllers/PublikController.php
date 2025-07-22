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
    return view('publik.berita');
  }

  public function katalog() {

    $expiration = env('REDIS_TIME', 86400);
    $tipeProduks = Cache::remember('tipe_produk_data', $expiration, function () {
        return TipeProduk::all();
    });

    $kategoriProduks = Cache::remember('kategori_produk_data', $expiration, function () {
        return KateegoriProduk::all();
    });

    return view('publik.katalog', compact('tipeProduks','kategoriProduks'));
  }

   

}
