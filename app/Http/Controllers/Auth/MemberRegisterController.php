<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class MemberRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.member_register'); // View register khusus member
    }

    public function register(Request $request)
    {

        if (env('RECAPTCHA_V2') == 1) {
            $credentials = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:members',
                'password' => 'required|min:8',
                'recaptcha_token' => 'required'
            ]);
            // Verifikasi token dengan Google
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->recaptcha_token,
                'remoteip' => $request->ip(),
            ]);

            $result = $response->json();

            if (!($result['success'] ?? false) || ($result['score'] ?? 0) < 0.5) {
                return back()->withErrors(['email' => 'Verifikasi keamanan gagal.']);
            }
        } else {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:members',
                'password' => 'required|min:8',
            ]);
        }

        $member = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        \Illuminate\Support\Facades\Mail::raw('Email Registrasi Berhasil. Silahkan klik link di bawah ini untuk verifikasi email Anda.' . route('member.verif', $member->id), function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Registrasi Berhasil');
        });

        return redirect('/member/login')->with('success', 'Registrasi berhasil!');
    }

    public function verif($id)
    {
        $member = Member::findOrFail($id);
        $member->status = 1;
        $member->save();

        return redirect('/member/login')->with('success', 'Email verifikasi berhasil!');
    }
}
