<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Edukasi;
use App\Models\Faq;
use App\Models\Forum;
use App\Models\Informasi;
use App\Models\KategoriMaster;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return Forum::with('kategori', 'sender')->where('verified_at', '!=', null)->orderBy('created_at', 'desc')->limit(4)->get();
        });
        $kategori = Cache::remember('kategori_forum', 86400, function () {
            return KategoriMaster::where('jenis_kategori', 'forum')->get();
        });
        return view('publik.front.forum', compact('data', 'kategori'));
    }

    public function loadMore(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = 5;

        $data = Forum::with('sender', 'kategori')
            ->where('verified_at', '!=', null)
            ->withCount('comment')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();
        return view('publik.front.partials.card-forum', compact('data'))->render();
    }

    public function incrementView($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->increment('viewers');

        return response()->json(['success' => true]);
    }

    public function detailForum(Forum $forum)
    {
        $comment = Cache::remember('comment', 86400, function () use ($forum) {
            return Comment::with('user')->where('forum_id', $forum->id)->where('is_show', 1)->orderBy('created_at', 'desc')->get();
        });
        return view('publik.front.detail-forum', compact('forum', 'comment'));
    }

    public function comment(Request $request)
    {
        Comment::create([
            'user_id' => Auth::guard('member')->id(),
            'forum_id' => $request->id_forum,
            'comment' => $request->comment,
            'created_by' => Auth::guard('member')->id(),
            'is_show' => 1
        ]);
        return back();
    }

    public function like($id)
    {
        $forum = Forum::findOrFail($id);
        $userId = Auth::guard('member')->id();

        // cek apakah user sudah like
        $like = $forum->likes()->where('user_id', $userId)->first();

        if ($like) {
            // kalau sudah like → batalkan (unlike)
            $like->delete();
            $status = 'unliked';
        } else {
            // kalau belum like → tambahkan
            $forum->likes()->create([
                'user_id' => $userId,
                'forum_id' => $id
            ]);
            $status = 'liked';
        }

        return response()->json([
            'status' => $status,
            'count' => $forum->likes()->count()
        ]);
    }

    public function edukasi(Request $request)
    {
        $sort = $request->get('sort');

        $cacheKey = "edukasi_" . ($sort ?? 'default');
        $data = Cache::tags('edukasi')->remember($cacheKey, 86400, function () use ($sort) {
            $query = Edukasi::select('id', 'cover', 'judul', 'deskripsi_singkat', 'slug', 'kategori_id')
                ->with('kategori');

            if ($sort === 'latest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'popular') {
                $query->orderBy('views', 'desc');
            }

            return $query->limit(5)->get();
        });
        $kategori = Cache::remember('kategori_edukasi', 86400, function () {
            return KategoriMaster::where('jenis_kategori', 'edukasi')->get();
        });
        return view('publik.front.education', compact('data', 'kategori'));
    }

    public function loadMoreEdukasi(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = 5;

        $data = Edukasi::select('id', 'cover', 'judul', 'deskripsi_singkat', 'slug', 'kategori_id')->with('kategori')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit);
        if ($request->sort == 'popular') {
            $data = $data->orderBy('views', 'desc');
        } elseif ($request->sort == 'latest') {
            $data = $data->orderBy('created_at', 'desc');
        }
        $data = $data->get();
        return view('publik.front.partials.card-education', compact('data'))->render();
    }

    public function detailEdukasi($slug)
    {
        $data = Edukasi::with('kategori')->where('slug', $slug)->first();
        return view('publik.front.detail-education', compact('data'));
    }

    public function proyek(Request $request)
    {
        $sort = $request->get('sort');
        $cacheKey = "proyek_" . ($sort ?? 'default');

        $data = Cache::tags('proyek')->remember($cacheKey, 86400, function () use ($sort) {
            $query = Proyek::with('kategori');

            if ($sort === 'latest') {
                $query->orderBy('created_at', 'desc');
            } elseif (is_numeric($sort)) {
                $query->where('kategori_id', $sort);
            }
            return $query->limit(6)->get();
        });
        $kategori = Cache::remember('kategori_proyek', 86400, function () {
            return KategoriMaster::where('jenis_kategori', 'proyek')->get();
        });
        return view('publik.front.proyek', compact('data', 'kategori'));
    }

    public function loadMoreProyek(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = 6;

        $data = Proyek::with('kategori')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit);

        if ($request->sort == 'latest') {
            $data = $data->orderBy('created_at', 'desc');
        } elseif (is_numeric($request->sort)) {
            $data = $data->where('kategori_id', $request->sort);
        }
        $data = $data->get();
        return view('publik.front.partials.card-proyek', compact('data'))->render();
    }

    public function detailProyek($slug)
    {
        $data = Proyek::with('kategori')->where('slug', $slug)->first();
        return view('publik.front.detail-education', compact('data'));
    }

    public function dukungan()
    {
        $action = Cache::remember('action', 86400, function () {
            return Informasi::where('slug', 'wa-donasi')->first();
        });
        return view('publik.front.dukungan', compact('action'));
    }

    public function informasi(Request $request)
    {
        $informasi = Cache::remember('informasi', 86400, function () {
            return Informasi::where('slug', 'inforekdonasi')->first();
        });
        $action = Cache::remember('action', 86400, function () {
            return Informasi::where('slug', 'wa-donasi')->first();
        });
        $donationAmount = $request->donationAmount;
        $donationName = $request->nama;
        return view('publik.front.informasi', compact('informasi', 'donationAmount', 'donationName', 'action'));
    }

    public function gabung()
    {
        $faqs = Cache::remember('faqs_data', 86400, function () {
            return Faq::orderBy('created_at', 'desc')->get();
        });
        return view('publik.front.join', compact('faqs'));
    }

    public function faq()
    {
        $data = Cache::remember('faqs_data', 86400, function () {
            return Faq::orderBy('created_at', 'desc')->get();
        });
        return view('publik.front.faq', compact('data'));
    }
}
