@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('member.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" value="{{ $email }}" required readonly>
    <input type="password" name="password" placeholder="Password Baru" required>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    <button type="submit">Reset Password</button>
</form>
@endsection