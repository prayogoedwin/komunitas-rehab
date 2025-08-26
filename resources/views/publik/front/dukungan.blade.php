@extends('publik.app')
@section('content')
    <!-- Support Hero Section -->
    <section class="support-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Dukung Komunitas Rehab</h1>
                    <p class="lead">
                        Berkontribusi untuk membantu ribuan orang dalam perjalanan
                        rehabilitasi mereka melalui berbagi pengetahuan atau donasi.
                    </p>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1527613426441-4da17471b66d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Dukungan Komunitas Rehab" class="img-fluid rounded shadow" />
                </div>
            </div>
        </div>
    </section>

    <!-- Article Contribution Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="support-card card">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <div class="support-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <h2 class="section-title text-center">Sumbang Artikel</h2>
                            <p class="lead">
                                Bagikan pengetahuan dan pengalaman Anda untuk membantu sesama
                                anggota komunitas
                            </p>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="h4">Bagikan Pengetahuan & Pengalaman</h3>
                                <p>
                                    Anda dapat menulis artikel seputar rehabilitasi, gaya hidup
                                    sehat, manajemen penyakit kronis, motivasi, atau pengalaman
                                    pribadi dalam menjalani pemulihan.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h3 class="h4">Manfaat</h3>
                                <p>
                                    Artikel Anda akan membantu pasien lain merasa tidak sendiri,
                                    mendapatkan pengetahuan baru, dan termotivasi untuk tetap
                                    konsisten.
                                </p>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h3 class="h4">Panduan Singkat</h3>
                            <ul class="benefit-list">
                                <li>Gunakan bahasa sederhana yang mudah dipahami awam.</li>
                                <li>
                                    Artikel bisa berupa tips praktis, cerita inspiratif, atau
                                    rangkuman penelitian populer.
                                </li>
                                <li>Sertakan referensi bila membahas data medis.</li>
                            </ul>
                        </div>

                        <div class="text-center mt-5">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#articleModal">
                                <i class="fas fa-pencil-alt me-2"></i>Kirim Artikel Anda
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="support-card card">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <div class="support-icon">
                                <i class="fas fa-hand-holding-heart"></i>
                            </div>
                            <h2 class="section-title text-center">
                                Donasi untuk Komunitas Rehab
                            </h2>
                            <p class="lead">
                                Dukung keberlangsungan program dan layanan kami melalui donasi
                            </p>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="h4">Mengapa Donasi Penting?</h3>
                                <p>Dukungan finansial akan digunakan untuk:</p>
                                <ul class="benefit-list">
                                    <li>Mengembangkan konten edukasi gratis</li>
                                    <li>
                                        Membuat video latihan dan infografis yang lebih interaktif
                                    </li>
                                    <li>
                                        Menyediakan lembar evaluasi mandiri yang dapat diunduh
                                        gratis
                                    </li>
                                    <li>Menjaga keberlangsungan forum komunitas pasien</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="h4">Transparansi</h3>
                                <p>
                                    Laporan penggunaan dana akan dipublikasikan secara berkala
                                    agar setiap donatur tahu bahwa dukungan mereka benar-benar
                                    bermanfaat.
                                </p>
                                <div class="text-center mt-4">
                                    <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                        alt="Transparansi Donasi" class="img-fluid rounded" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h3 class="h4 text-center mb-4">Pilihan Donasi</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="donation-option text-center">
                                        <h4 class="h5">Donasi Sekali</h4>
                                        <div class="donation-amount">Rp 100.000</div>
                                        <p>Dukungan satu kali untuk program kami</p>
                                        <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                                            data-bs-target="#donationModal" data-type="one-time">
                                            Pilih Donasi
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="donation-option text-center active">
                                        <h4 class="h5">Donasi Bulanan</h4>
                                        <div class="donation-amount">Rp 50.000/bln</div>
                                        <p>Dukungan berkelanjutan untuk komunitas</p>
                                        <button class="btn btn-primary mt-3" data-bs-toggle="modal"
                                            data-bs-target="#donationModal" data-type="monthly">
                                            Pilih Donasi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#donationModal">
                                <i class="fas fa-gift me-2"></i>Dukung dengan Donasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="py-5 my-5" style="background-color: #f0f8ff">
        <div class="container">
            <h2 class="section-title text-center">Dampak Dukungan Anda</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="support-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>50+ Artikel</h3>
                    <p>Konten edukasi yang telah dibagikan oleh komunitas</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="support-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3>30+ Video</h3>
                    <p>Materi latihan dan edukasi dalam format video</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="support-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>2,500+ Anggota</h3>
                    <p>Yang telah terbantu melalui program kami</p>
                </div>
            </div>
        </div>
    </section>
@endsection
