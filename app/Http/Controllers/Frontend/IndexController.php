<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Edukasi;
use App\Models\Forum;
use App\Models\KategoriMaster;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $data = Cache::remember('forum', 86400, function () {
            return Forum::with('kategori', 'sender')->where('verified_at', '!=', null)->orderBy('created_at', 'desc')->get();
        });
        $kategori = Cache::remember('kategori_forum', 86400, function () {
            return KategoriMaster::where('jenis_kategori', 'forum')->get();
        });
        return view('publik.front.forum', compact('data', 'kategori'));
    }

    public function edukasi()
    {
        $data = Cache::remember('edukasi', 86400, function () {
            return Edukasi::with('kategori')->orderBy('created_at', 'desc')->get();
        });
        $kategori = Cache::remember('kategori_edukasi', 86400, function () {
            return KategoriMaster::where('jenis_kategori', 'edukasi')->get();
        });
        return view('publik.front.education', compact('data', 'kategori'));
    }

    public function detailEdukasi($slug)
    {
        $data = Edukasi::with('kategori')->where('slug', $slug)->first();
        return view('publik.front.detail-education', compact('data'));
    }

    public function proyek()
    {
        $data = Cache::remember('proyek', 86400, function () {
            return Proyek::with('kategori')->orderBy('created_at', 'desc')->get();
        });
        $kategori = Cache::remember('kategori_proyek', 86400, function () {
            return KategoriMaster::where('jenis_kategori', 'proyek')->get();
        });
        return view('publik.front.proyek', compact('data', 'kategori'));
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
