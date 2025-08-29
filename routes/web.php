<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\MemberLoginController;
use App\Http\Controllers\Auth\MemberRegisterController;
use App\Http\Controllers\Auth\MemberForgotPasswordController;
use App\Http\Controllers\Auth\MemberResetPasswordController;
use App\Http\Controllers\Auth\SocialLoginController;



use App\Http\Controllers\PublikController;
use App\Http\Controllers\Member\PrediksiMember;
use App\Http\Controllers\Member\DashboardMember;

use App\Http\Controllers\CacheController;
use App\Http\Controllers\Frontend\IndexController;
use App\Middleware\CheckMaintenanceMode;




// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(CheckMaintenanceMode::class)->group(function () {

    Route::get('/cek', [PublikController::class, 'index'])->name('publik');
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/howtoplay', [PublikController::class, 'caraMain'])->name('cara');
    Route::get('/faq', [PublikController::class, 'faq'])->name('faq');
    Route::get('/#fightList', [PublikController::class, 'index'])->name('prediksi');
    Route::get('/match', [PublikController::class, 'tonton'])->name('tonton');
    Route::get('/leaderboard', [PublikController::class, 'peringkat'])->name('peringkat');
    Route::get('/news', [PublikController::class, 'berita'])->name('berita');
    Route::get('/news/{id}', [PublikController::class, 'berita_detail'])->name('berita.detail');
    Route::get('/catalog', [PublikController::class, 'katalog'])->name('katalog');

    Route::get('/login', function () {
        return redirect()->route('member.login');
    })->name('login');

    Route::get('/test-email', function () {
        \Illuminate\Support\Facades\Mail::raw('Ini hanya test email', function ($message) {
            $message->to('kodings56@gmail.com')
                ->subject('Test Email');
        });
        return 'Email dikirim';
    });

    Route::middleware('auth')->get('/backend/clear-cache', [CacheController::class, 'clearAll']);

    Route::get('/produk/{id}/varians', [DashboardMember::class, 'getVarians']);
    Route::post('/cek-poin', [DashboardMember::class, 'cekPoin'])->name('cek-poin');

    // Route::get('/index', [IndexController::class, 'index'])->name('index');
    Route::get('about', [IndexController::class, 'about'])->name('about');
    Route::get('forum', [IndexController::class, 'forum'])->name('forum');
    Route::get('edukasi', [IndexController::class, 'edukasi'])->name('edukasi');
    Route::get('detail-edukasi/{slug}', [IndexController::class, 'detailEdukasi'])->name('detail-edukasi');
    Route::get('detail-proyek/{slug}', [IndexController::class, 'detailProyek'])->name('detail-proyek');
    Route::get('detail-forum/{forum}', [IndexController::class, 'detailForum'])->name('detail-forum');
    Route::get('proyek', [IndexController::class, 'proyek'])->name('proyek');
    Route::get('dukungan', [IndexController::class, 'dukungan'])->name('dukungan');
    Route::get('gabung', [IndexController::class, 'gabung'])->name('gabung');
    Route::post('/forum/{id}/increment-view', [IndexController::class, 'incrementView'])
        ->name('forum.increment-view');
    Route::post('/forum/{id}/like', [IndexController::class, 'like'])->name('forum.like');
});

Route::get('/maintenance', function () {
    return view('maintenance');
});





// Login Member
Route::middleware(CheckMaintenanceMode::class)->prefix('member')->group(function () {

    // web.php
    Route::post('/prediksi_sekekarang/{id}', [PrediksiMember::class, 'store_server'])->name('prediksi.store');
    Route::get('/prediksi_batal/{id_prediksi}', [PrediksiMember::class, 'delete_prediksi_server'])->name('prediksi.delete');

    Route::post('/prediksi/{id}', [PrediksiController::class, 'store']);

    Route::get('/login/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('member.social.login');

    Route::get('/login/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback'])->name('member.social.login.callback');

    Route::get('/login', [MemberLoginController::class, 'showLoginForm'])->name('member.login');
    Route::post('/login', [MemberLoginController::class, 'login'])->name('member.login.submit');

    // Register Member
    Route::get('/register', [MemberRegisterController::class, 'showRegisterForm'])->name('member.register');
    Route::post('/register', [MemberRegisterController::class, 'register'])->name('member.register.submit');
    Route::get('verifikasi/{id}', [MemberRegisterController::class, 'verif'])->name('member.verif');

    // Forgot Password
    Route::get('password/reset', [MemberForgotPasswordController::class, 'showLinkRequestForm'])->name('member.password.request');
    Route::post('password/email', [MemberForgotPasswordController::class, 'sendResetLinkEmail'])->name('member.password.email');

    // Reset Password
    Route::get('password/reset/{token}', [MemberResetPasswordController::class, 'showResetForm'])->name('member.password.reset');
    Route::post('password/reset', [MemberResetPasswordController::class, 'reset'])->name('member.password.update');

    // Logout & Dashboard (dengan middleware)
    Route::get('/logout', [MemberLoginController::class, 'logout'])->name('member.logout');

    Route::post('/prediksi/{id}', [PrediksiMember::class, 'store']);

    Route::get('/dashboard', [DashboardMember::class, 'index'])->middleware('auth:member')->name('member.dashboard');
    Route::get('/profil', [DashboardMember::class, 'profilMember'])->middleware('auth:member')->name('member.profil');
    Route::post('/profil_update', [DashboardMember::class, 'updateProfil'])->middleware('auth:member')->name('member.profil_update');

    Route::get('/riwayat_prdiksi', [DashboardMember::class, 'riwayatPrediksi'])->middleware('auth:member')->name('member.riwayatprdiksi');
    Route::get('/riwayat_tukar_poin', [DashboardMember::class, 'riwayatTukarPoin'])->middleware('auth:member')->name('member.riwayatpoin');

    Route::post('/tukarpoin', [DashboardMember::class, 'tukarPoin'])->middleware('auth:member')->name('member.tukarpoin');

    Route::post('comment', [IndexController::class, 'comment'])->middleware('auth:member')->name('member.comment');
});

// Route::get('/member/profile', [ProfileController::class, 'index'])
//   ->middleware('auth:member');

// if (Auth::guard('member')->check()) {
//   // Member terautentikasi
// }

Route::get('/debug-permission', function () {
    if (!auth()->check()) {
        return 'Not logged in';
    }

    $user = auth()->user();

    return [
        'user_id' => $user->id,
        'user_email' => $user->email,
        'has_view_users' => $user->can('view users'),
        'all_permissions' => $user->getAllPermissions()->pluck('name')->toArray(),
        'user_roles' => $user->getRoleNames()->toArray(),
        'guard_name' => $user->guard_name ?? 'no guard',
        'auth_guard' => auth()->getDefaultDriver(),
    ];
})->middleware('auth');
