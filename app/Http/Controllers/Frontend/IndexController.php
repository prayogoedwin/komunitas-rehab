<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Edukasi;
use App\Models\KategoriMaster;
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
        $data = Edukasi::get();
        $kategori = KategoriMaster::where('jenis_kategori', 'edukasi')->get();
        return view('publik.front.education', compact('data', 'kategori'));
    }

    public function detailEdukasi($slug)
    {
        $data = Edukasi::with('kategori')->where('slug', $slug)->first();
        return view('publik.front.detail-education', compact('data'));
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
