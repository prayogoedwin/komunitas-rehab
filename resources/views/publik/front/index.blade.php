@extends('publik.app')
@section('content')
    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Komunitas Rehabilitasi Kesehatan Terpercaya
                    </h1>
                    <p class="lead mb-4">
                        Mendukung perjalanan kesehatan dan pemulihan Anda dengan sumber
                        daya, edukasi, dan komunitas yang peduli.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('dukungan') }}" class="btn btn-primary px-4 py-2">Dukungan</a>
                        <a href="{{ route('member.register') }}" class="btn btn-outline-primary px-4 py-2">Bergabung
                            Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="{{ asset('_frontend/new') }}/img/hero-section.png" alt="Tim medis Komunitas Rehab"
                        class="img-fluid hero-img" />
                </div>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section class="container mb-5">
        <h2 class="section-title text-center">Motto</h2>
        <p class="lead text-center mb-5">
            "Setiap langkah kecil akan menuju perubahan besar"
        </p>
        <h2 class="section-title text-center">Visi Kami</h2>
        <p style="font-style: italic" class="text-center">
            “Menjadi platform edukasi dan pendampingan rehabilitasi mandiri yang
            memberdayakan pasien penyakit kronis untuk hidup lebih sehat, mandiri,
            dan berkualitas.”
        </p>

        <h2 class="section-title text-center">Misi Kami</h2>
        <div class="row">
            <div class="col-lg-6 mb-3 col-md-6">
                <div class="feature-card card h-100">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        </div>
                        <h3 class="h4">Memberdayakan Pasien</h3>
                        <p class="text-muted">
                            Menyediakan edukasi kesehatan yang sederhana, berbasis bukti,
                            dan mudah diakses sehingga pasien memahami kondisi yang mereka
                            alami.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3 col-md-6">
                <div class="feature-card card h-100">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-book-medical fa-3x text-primary mb-3"></i>
                        </div>
                        <h3 class="h4">Mendorong Kemandirian</h3>
                        <p class="text-muted">
                            Menghadirkan program latihan fisik, panduan aktivitas, serta
                            alat evaluasi yang dapat dilakukan secara mandiri di rumah
                            dengan aman.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3 col-md-6">
                <div class="feature-card card h-100">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-hands-helping fa-3x text-primary mb-3"></i>
                        </div>
                        <h3 class="h4">Meningkatkan Kualitas Hidup</h3>
                        <p class="text-muted">
                            Membantu pasien mengurangi nyeri, menjaga fungsi, dan
                            meningkatkan produktivitas sehari-hari melalui intervensi yang
                            konsisten dan terukur.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3 col-md-6">
                <div class="feature-card card h-100">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-hands-helping fa-3x text-primary mb-3"></i>
                        </div>
                        <h3 class="h4">Mendampingi Perjalanan Pemulihan</h3>
                        <p class="text-muted">
                            Menyediakan dukungan berkelanjutan melalui narasi edukatif,
                            lembar pemantauan mandiri, dan komunitas inspiratif sehingga
                            pasien tidak merasa sendiri dalam proses pemulihan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-5 mb-5" style="background-color: var(--secondary-color)">
        <div class="container text-center py-4">
            <h2 class="mb-4">Siap Memulai Perjalanan Pemulihan Anda?</h2>
            <p class="lead mb-4">
                Bergabunglah dengan komunitas kami dan dapatkan dukungan yang Anda
                butuhkan.
            </p>
            <a href="{{ route('dukungan') }}" class="btn btn-primary me-3">Dukungan</a>
            <a href="#" class="btn btn-outline-dark">Hubungi Kami</a>
        </div>
    </section>
@endsection
