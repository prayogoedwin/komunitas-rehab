@extends('publik.app')

@section('content')
    <!-- Profile Content -->
    <div class="container profile-container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="profile-card">
                    <div class="profile-header">
                        {{-- <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            alt="Profil Member" class="profile-avatar"> --}}
                        <h1 class="profile-title">Profil Member</h1>
                        <p class="profile-email">{{ $profil->email }}</p>
                    </div>

                    @if (session('success'))
                        <div
                            style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 15px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div
                            style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; margin-bottom: 15px;">
                            {{ session('error') }}
                        </div>
                    @endif


                    <form id="formProfilMember" action="{{ route('member.profil_update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $profil->id }}">
                        <input type="hidden" class="form-control" name="email" value="{{ $profil->email }}">

                        <div class="form-group">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $profil->name }}" required>
                        </div>

                        <div class="form-group password-toggle">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password baru">
                            <span class="password-toggle-icon" id="togglePassword">
                                <i class="far fa-eye"></i>
                            </span>
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password</small>
                        </div>

                        <div class="form-group">
                            <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                value="{{ $profil->whatsapp }}">
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $profil->alamat }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <h3>Riwayat Forum</h3>
                @foreach ($data as $item)
                    <div class="forum-card">
                        <div class="d-flex align-items-start">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="User" class="user-avatar me-3" />
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="h5 mb-0">
                                        <a href="{{ route('detail-forum', $item->slug) }}" style="text-decoration: none"
                                            class="forum-judul" data-id="{{ $item->id }}">{{ $item->judul }}</a>
                                    </h4>
                                    @if ($item->verified_at == null)
                                        <span class="badge bg-danger">Menunggu Verifikasi</span>
                                    @else
                                        <span class="badge bg-success">Terverifikasi</span>
                                    @endif
                                </div>
                                <p class="text-muted">
                                    {{ Str::limit($item->deskripsi, 300) }}
                                </p>
                                <div class="d-flex flex-wrap align-items-center mt-3">
                                    <span class="forum-stats me-3"><i class="fas fa-user me-1"></i>
                                        {{ $item->sender_name }}</span>
                                    <span class="forum-stats me-3"><i
                                            class="fas fa-clock me-1"></i>{{ $item->created_at->diffForHumans() }}</span>
                                    <span class="forum-stats me-3"><i class="fas fa-comment me-1"></i>
                                        {{ $item->comment_count }} balasan</span>
                                    <span class="forum-stats me-3"><i class="fas fa-eye me-1"></i> {{ $item->viewers }}
                                        dilihat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
