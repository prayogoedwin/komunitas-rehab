@extends('publik.app')
@section('content')
    <!-- Education Hero Section -->
    <section class="education-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Materi Edukasi Rehabilitasi</h1>
                    <p class="lead">
                        Temukan panduan, tips, dan informasi terpercaya untuk mendukung
                        perjalanan rehabilitasi mandiri Anda.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#materi" class="btn btn-primary">Jelajahi Semua Materi</a>
                        <a href="#kategori" class="btn btn-outline-primary">Lihat Kategori</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Materi Edukasi Kesehatan" class="img-fluid rounded shadow" />
                </div>
            </div>
        </div>
    </section>

    <!-- Education Categories Section -->
    <section class="container my-5" id="kategori">
        <h2 class="section-title text-center">Kategori Edukasi</h2>
        <div class="row">
            @foreach ($kategori as $item)
                <div class="col-md-3 col-6 mb-4">
                    <div class="text-center">
                        <div class="education-icon">
                            <i class="fas fa-dumbbell fa-3x"></i>
                        </div>
                        <h3>{{ ucwords($item->nama_kategori) }}</h3>
                        <p class="text-muted">Panduan latihan</p>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="education-icon">
                        <i class="fas fa-tint fa-3x"></i>
                    </div>
                    <h3>Manajemen Nyeri</h3>
                    <p class="text-muted">Teknik pengelolaan</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="education-icon">
                        <i class="fas fa-utensils fa-3x"></i>
                    </div>
                    <h3>Nutrisi</h3>
                    <p class="text-muted">Pola makan sehat</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="education-icon">
                        <i class="fas fa-brain fa-3x"></i>
                    </div>
                    <h3>Kesehatan Mental</h3>
                    <p class="text-muted">Dukungan psikologis</p>
                </div>
            </div> --}}
        </div>
    </section>

    <!-- Education Filter Section -->
    <section class="container my-5" id="materi">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Materi Edukasi</h2>
            <div class="d-flex">
                <select class="form-select me-2" style="width: auto">
                    <option selected>Urutkan</option>
                    <option>Terbaru</option>
                    <option>Terpopuler</option>
                    <option>Rating Tertinggi</option>
                </select>
            </div>
        </div>

        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="education-card card h-100">
                        <div class="position-relative">
                            <img src="{{ Storage::url($item->cover) }}" class="card-img-top"
                                alt="Latihan untuk Nyeri Punggung" />
                            <span class="card-category">{{ $item->kategori->nama_kategori }}</span>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title">
                                {{ ucwords($item->judul) }}
                            </h3>
                            <p class="card-text">
                                {{ $item->deskripsi_singkat }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="card-duration"><i class="far fa-clock me-1"></i> 15 menit</span>
                                <span class="card-duration"><i class="far fa-file me-1"></i> PDF</span>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('detail-edukasi', $item->slug) }}" class="btn btn-primary w-100">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary">Muat Lebih Banyak</a>
        </div>
    </section>
@endsection
