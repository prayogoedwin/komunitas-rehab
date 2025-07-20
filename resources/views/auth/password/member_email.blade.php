@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('member.password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Email Member" required>
    <button type="submit">Kirim Link Reset Password</button>
</form>
@endsection