@extends('publik.app')
@section('content')
    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Tentang Komunitas Rehab</h1>
                    <p class="lead">
                        Mendukung perjalanan rehabilitasi mandiri untuk penderita penyakit
                        kronis dengan pendekatan yang terstruktur dan berkelanjutan.
                    </p>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Proses Rehabilitasi" class="img-fluid rounded shadow" />
                </div>
            </div>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center">Apa Itu Komunitas Rehab?</h2>
                <p class="lead text-center mb-5">
                    Komunitas Rehab adalah sebuah platform edukasi kesehatan yang
                    dirancang mendukung penderita penyakit kronis agar dapat melakukan
                    pemulihan secara mandiri, terstruktur, dan berkelanjutan.
                </p>

                <div class="row mb-5">
                    <div class="col-md-4 mb-4">
                        <div class="feature-card card h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-info-circle fa-3x text-primary mb-3"></i>
                                </div>
                                <h3 class="h5">Informasi Mudah Dipahami</h3>
                                <p class="text-muted">
                                    Website ini menyajikan informasi kesehatan yang mudah
                                    dipahami oleh semua kalangan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-card card h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-dumbbell fa-3x text-primary mb-3"></i>
                                </div>
                                <h3 class="h5">Program Latihan Fisik</h3>
                                <p class="text-muted">
                                    Program latihan fisik yang aman dilakukan di rumah dengan
                                    panduan yang jelas.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-card card h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                                </div>
                                <h3 class="h5">Alat Evaluasi</h3>
                                <p class="text-muted">
                                    Alat evaluasi sederhana untuk memantau perkembangan kondisi
                                    kesehatan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Target Audience Section -->
    <section class="py-5" style="background-color: #f0f8ff">
        <div class="container">
            <h2 class="section-title text-center">Siapa yang Bisa Memanfaatkan?</h2>
            <p class="lead text-center mb-5">
                Komunitas Rehab didesain untuk membantu berbagai kelompok dalam
                perjalanan rehabilitasi mereka
            </p>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="target-group">
                        <div class="target-icon">
                            <i class="fas fa-bone"></i>
                        </div>
                        <h3>Penderita Penyakit Kronis Muskuloskeletal</h3>
                        <p>
                            Seperti nyeri punggung bawah, nyeri pundak, nyeri bahu, pasca
                            fraktur, pasca amputasi, dan kondisi muskuloskeletal lainnya.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="target-group">
                        <div class="target-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3>Pasien Penyakit Kronis Non-Muskuloskeletal</h3>
                        <p>
                            Seperti pasca strok, pasca tirah baring lama, dan kondisi
                            lainnya yang membutuhkan aktivitas fisik terkontrol dan edukasi
                            gaya hidup sehat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="target-group">
                        <div class="target-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Keluarga/Pendamping Pasien</h3>
                        <p>
                            Keluarga atau pendamping pasien yang ingin memahami cara
                            mendukung rehabilitasi mandiri di rumah dengan tepat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="container my-5">
        <h2 class="section-title text-center">Manfaat Bergabung</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Edukasi Terstruktur</h3>
                    <p>
                        Dapatkan akses ke materi edukasi yang terstruktur dan mudah
                        dipahami tentang kondisi kesehatan dan proses rehabilitasi.
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Komunitas Supportif</h3>
                    <p>
                        Bergabung dengan komunitas yang memahami perjalanan rehabilitasi
                        Anda dan saling mendukung.
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-road"></i>
                    </div>
                    <h3>Jalan Pemulihan yang Jelas</h3>
                    <p>
                        Dapatkan panduan langkah demi langkah untuk proses rehabilitasi
                        yang terstruktur dan terukur.
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>Rehabilitasi Mandiri di Rumah</h3>
                    <p>
                        Lakukan proses rehabilitasi di rumah dengan panduan yang aman dan
                        efektif.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 mb-5" style="background-color: var(--secondary-color)">
        <div class="container text-center py-4">
            <h2 class="mb-4">Tertarik untuk Bergabung?</h2>
            <p class="lead mb-4">
                Dapatkan dukungan rehabilitasi yang Anda butuhkan dengan bergabung
                bersama komunitas kami.
            </p>
            <a href="{{ route('dukungan') }}" class="btn btn-primary me-3">Dukungan</a>
            <a href="#" class="btn btn-outline-dark">Hubungi Kami</a>
        </div>
    </section>
@endsection
