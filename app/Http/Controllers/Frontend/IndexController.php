<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('publik.front.index');
    }

    public function about()
    {
        return view('publik.front.about');
    }

    public function forum()
    {
        return view('publik.front.forum');
    }

    public function edukasi()
    {
        return view('publik.front.education');
    }

    public function proyek()
    {
        return view('publik.front.proyek');
    }

    public function dukungan()
    {
        return view('publik.front.dukungan');
    }

    public function gabung()
    {
        return view('publik.front.join');
    }
}
