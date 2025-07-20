<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublikController extends Controller {

  public function index() {
    return view('publik.main');
  }

  public function caraMain() {
    return view('publik.cara');
  }

  public function faq() {
    return view('publik.faq');
  }

  public function tonton() {
    return view('publik.tonton');
  }

  public function peringkat() {
    return view('publik.peringkat');
  }

  public function berita() {
    return view('publik.berita');
  }

  public function katalog() {
    return view('publik.katalog');
  }

   

}
