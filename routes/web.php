<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\MemberLoginController;
use App\Http\Controllers\Auth\MemberRegisterController;
use App\Http\Controllers\Auth\MemberForgotPasswordController;
use App\Http\Controllers\Auth\MemberResetPasswordController;
use App\Http\Controllers\Auth\SocialLoginController;



use App\Http\Controllers\PublikController;
use App\Http\Controllers\Member\PrediksiMember;




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PublikController::class, 'index'])->name('publik');
Route::get('/howtoplay', [PublikController::class, 'caraMain'])->name('cara');
Route::get('/faq', [PublikController::class, 'faq'])->name('faq');
Route::get('/#fightList', [PublikController::class, 'index'])->name('prediksi');
Route::get('/match', [PublikController::class, 'tonton'])->name('tonton');
Route::get('/leaderboard', [PublikController::class, 'peringkat'])->name('peringkat');
Route::get('/news', [PublikController::class, 'berita'])->name('berita');
Route::get('/news/{id}', [PublikController::class, 'berita_detail'])->name('berita.detail');
Route::get('/catalog', [PublikController::class, 'katalog'])->name('katalog');

Route::get('/login', function() {
    return redirect()->route('member.login');
})->name('login');

Route::get('/test-email', function () {
    \Illuminate\Support\Facades\Mail::raw('Ini hanya test email', function ($message) {
        $message->to('gilaprediksi88@gmail.com')
            ->subject('Test Email');
    });
    return 'Email dikirim';
});




// Login Member
Route::prefix('member')->group(function() {

  Route::post('/prediksi/{id}', [PrediksiController::class, 'store']);

  Route::get('/login/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('member.social.login');
        
  Route::get('/login/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback'])->name('member.social.login.callback');

  Route::get('/login', [MemberLoginController::class, 'showLoginForm'])->name('member.login');
  Route::post('/login', [MemberLoginController::class, 'login'])->name('member.login.submit');
  
  // Register Member
  Route::get('/register', [MemberRegisterController::class, 'showRegisterForm'])->name('member.register');
  Route::post('/register', [MemberRegisterController::class, 'register'])->name('member.register.submit');

  // Forgot Password
  Route::get('password/reset', [MemberForgotPasswordController::class, 'showLinkRequestForm'])->name('member.password.request');
  Route::post('password/email', [MemberForgotPasswordController::class, 'sendResetLinkEmail'])->name('member.password.email');
    
  // Reset Password
  Route::get('password/reset/{token}', [MemberResetPasswordController::class, 'showResetForm'])->name('member.password.reset');  
  Route::post('password/reset', [MemberResetPasswordController::class, 'reset'])->name('member.password.update');
  
  // Logout & Dashboard (dengan middleware)
  Route::post('/logout', [MemberLoginController::class, 'logout'])->name('member.logout');

  Route::post('/prediksi/{id}', [PrediksiMember::class, 'store']);

  Route::get('/dashboard', [MemberLoginController::class, 'dashboard']) ->middleware('auth:member')->name('member.dashboard');
 
});

// Route::get('/member/profile', [ProfileController::class, 'index'])
//   ->middleware('auth:member');

// if (Auth::guard('member')->check()) {
//   // Member terautentikasi
// }
