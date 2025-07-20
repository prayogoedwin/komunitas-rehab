<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberLoginController extends Controller {
  public function showLoginForm() {
    return view('auth.member_login'); // View login khusus member
  }

  public function login(Request $request) {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (Auth::guard('member')->attempt($credentials)) {
      return redirect()->intended('/'); // Redirect setelah login
    }

    return back()->withErrors(['email' => 'Kredensial tidak valid']);
  }

  public function logout() {
    Auth::guard('member')->logout();
    return redirect('/member/login');
  }

  public function dashboard() {
    return view('publik.member.dashboard');
  }
}
