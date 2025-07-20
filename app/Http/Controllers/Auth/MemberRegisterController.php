<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class MemberRegisterController extends Controller {
  public function showRegisterForm() {
    return view('auth.member_register'); // View register khusus member
  }

  public function register(Request $request) {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:members',
      'password' => 'required|min:8|confirmed',
    ]);

    Member::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    return redirect('/member/login')->with('success', 'Registrasi berhasil!');
  }
}
