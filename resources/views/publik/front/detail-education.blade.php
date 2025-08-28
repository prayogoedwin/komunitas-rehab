@extends('publik.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="education.html">Edukasi</a></li>
                <li class="breadcrumb-item"><a href="#">{{ ucwords($data->kategori->nama_kategori) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $data->judul }}
                </li>
            </ol>
        </nav>
    </div>

    <!-- Article Header -->
    <section class="article-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="article-meta">
                        <div class="meta-item">
                            <i class="far fa-calendar"></i> {{ $data->created_at->format('d F Y') }}
                        </div>
                        <div class="meta-item">
                            <i class="far fa-eye"></i> 1.245 dilihat
                        </div>
                    </div>

                    <h1 class="display-5 fw-bold mb-3">
                        {{ $data->judul }}
                    </h1>
                    <p class="lead">
                        {{ $data->deskripsi_singkat }}
                    </p>

                    <div class="mb-4">
                        <span class="article-tag">Latihan</span>
                        <span class="article-tag">Nyeri Punggung</span>
                        <span class="article-tag">Rehabilitasi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Thumbnail and Description -->
    <section class="container mb-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="thumbnail-container">
                    <img src="{{ Storage::url($data->cover) }}" alt="Latihan untuk Nyeri Punggung"
                        class="thumbnail-image" />
                    {{-- <div class="thumbnail-overlay">
                        <h3 class="text-white">
                            Latihan Terbaik untuk Nyeri Punggung Bawah
                        </h3>
                        <p class="text-white mb-0">
                            Panduan praktis dengan ilustrasi langkah demi langkah
                        </p>
                    </div> --}}
                </div>

                <div class="article-content">
                    {{-- <h2>Deskripsi Lengkap</h2> --}}
                    {!! $data->deskripsi !!}
                </div>

                <!-- Author Info -->
                {{-- <div class="author-card">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                        alt="Dr. Amanda Sari" class="author-avatar" />
                    <div>
                        <h4>Dr. Amanda Sari, Sp.KFR</h4>
                        <p class="text-muted">
                            Dokter Spesialis Kedokteran Fisik dan Rehabilitasi
                        </p>
                        <p>
                            Dr. Amanda adalah spesialis rehabilitasi muskuloskeletal dengan
                            pengalaman lebih dari 10 tahun. Beliau berfokus pada penanganan
                            nyeri punggung dan gangguan muskuloskeletal lainnya melalui
                            pendekatan holistik.
                        </p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Related Education Section -->
    <section class="related-section">
        <div class="container">
            <h2 class="mb-2">
                @if (Request::is('detail-proyek/*'))
                    Proyek Terkait
                @else
                    Edukasi Terkait
                @endif

            </h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="related-article card h-100">
                        <img src="https://images.unsplash.com/photo-1591746551016-ea633c115c0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            class="card-img-top related-img" alt="Manajemen Nyeri Kronis" />
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Nyeri</span>
                            <h5 class="card-title">
                                Teknik Manajemen Nyeri Kronis Tanpa Obat
                            </h5>
                            <p class="card-text">
                                Pelajari berbagai pendekatan non-farmakologis untuk mengelola
                                nyeri kronis dalam kehidupan sehari-hari.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> 10 min</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="related-article card h-100">
                        <img src="https://images.unsplash.com/photo-1507048331197-7d4ac70811cf?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            class="card-img-top related-img" alt="Pola Tidur Sehat" />
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Kesehatan</span>
                            <h5 class="card-title">
                                Meningkatkan Kualitas Tidur untuk Pemulihan Optimal
                            </h5>
                            <p class="card-text">
                                Tips dan strategi untuk menciptakan rutinitas tidur yang
                                mendukung proses pemulihan.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> 8 min</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="related-article card h-100">
                        <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            class="card-img-top related-img" alt="Postur Tubuh yang Benar" />
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Ergonomi</span>
                            <h5 class="card-title">
                                Panduan Postur Tubuh yang Benar untuk Aktivitas Sehari-hari
                            </h5>
                            <p class="card-text">
                                Cara menjaga postur tubuh yang baik saat duduk, berdiri, dan
                                mengangkat benda untuk mencegah nyeri punggung.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> 12 min</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="education.html" class="btn btn-primary">Lihat Semua Materi Edukasi</a>
            </div>
        </div>
    </section>
@endsection
