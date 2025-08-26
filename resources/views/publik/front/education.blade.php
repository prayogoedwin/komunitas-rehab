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
                        <a href="#" class="btn btn-primary">Jelajahi Semua Materi</a>
                        <a href="#" class="btn btn-outline-primary">Lihat Kategori</a>
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
    <section class="container my-5">
        <h2 class="section-title text-center">Kategori Edukasi</h2>
        <div class="row">
            <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="education-icon">
                        <i class="fas fa-dumbbell fa-3x"></i>
                    </div>
                    <h3>Latihan Fisik</h3>
                    <p class="text-muted">Panduan latihan</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
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
            </div>
        </div>
    </section>

    <!-- Education Filter Section -->
    <section class="container my-5">
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
            <!-- Education Card 1 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="education-card card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Latihan untuk Nyeri Punggung" />
                        <span class="card-category">Latihan</span>
                    </div>
                    <div class="card-body">
                        <h3 class="h5 card-title">
                            7 Latihan untuk Meredakan Nyeri Punggung Bawah
                        </h3>
                        <p class="card-text">
                            Panduan lengkap latihan sederhana yang dapat dilakukan di rumah
                            untuk mengurangi nyeri punggung bawah.
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="card-duration"><i class="far fa-clock me-1"></i> 15 menit</span>
                            <span class="card-duration"><i class="far fa-file me-1"></i> PDF</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="#" class="btn btn-primary w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Education Card 2 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="education-card card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Manajemen Nyeri Kronis" />
                        <span class="card-category">Nyeri</span>
                    </div>
                    <div class="card-body">
                        <h3 class="h5 card-title">
                            Teknik Manajemen Nyeri Kronis Tanpa Obat
                        </h3>
                        <p class="card-text">
                            Pelajari berbagai pendekatan non-farmakologis untuk mengelola
                            nyeri kronis dalam kehidupan sehari-hari.
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="card-duration"><i class="far fa-clock me-1"></i> 20 menit</span>
                            <span class="card-duration"><i class="fas fa-film me-1"></i> Video</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="#" class="btn btn-primary w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Education Card 3 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="education-card card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1494390248081-4e521a5940db?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Nutrisi untuk Pemulihan" />
                        <span class="card-category">Nutrisi</span>
                    </div>
                    <div class="card-body">
                        <h3 class="h5 card-title">
                            Panduan Nutrisi untuk Proses Pemulihan Optimal
                        </h3>
                        <p class="card-text">
                            Temukan makanan dan pola makan yang mendukung proses pemulihan
                            dan rehabilitasi tubuh.
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="card-duration"><i class="far fa-clock me-1"></i> 12 menit</span>
                            <span class="card-duration"><i class="far fa-file me-1"></i> PDF</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="#" class="btn btn-primary w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Education Card 5 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="education-card card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Latihan Pernapasan" />
                        <span class="card-category">Latihan</span>
                    </div>
                    <div class="card-body">
                        <h3 class="h5 card-title">
                            Teknik Pernapasan untuk Relaksasi dan Pengurangan Nyeri
                        </h3>
                        <p class="card-text">
                            Latihan pernapasan sederhana yang dapat membantu mengurangi
                            ketegangan dan nyeri.
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="card-duration"><i class="far fa-clock me-1"></i> 10 menit</span>
                            <span class="card-duration"><i class="far fa-file me-1"></i> PDF</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="#" class="btn btn-primary w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Education Card 6 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="education-card card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1507048331197-7d4ac70811cf?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Pola Tidur Sehat" />
                        <span class="card-category">Mental</span>
                    </div>
                    <div class="card-body">
                        <h3 class="h5 card-title">
                            Meningkatkan Kualitas Tidur untuk Pemulihan Optimal
                        </h3>
                        <p class="card-text">
                            Tips dan strategi untuk menciptakan rutinitas tidur yang
                            mendukung proses pemulihan.
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="card-duration"><i class="far fa-clock me-1"></i> 14 menit</span>
                            <span class="card-duration"><i class="fas fa-film me-1"></i> Video</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="#" class="btn btn-primary w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary">Muat Lebih Banyak</a>
        </div>
    </section>
@endsection
