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

    <!-- Article Modal -->
    <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="articleModalLabel">
                        Kirim Artikel Anda
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadArticleForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" required />
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="email" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="articleTitle" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" id="articleTitle" required />
                        </div>
                        <div class="mb-3">
                            <label for="articleCategory" class="form-label">Kategori Artikel</label>
                            <select class="form-select" id="articleCategory" required>
                                <option value="">Pilih Kategori</option>
                                <option value="rehabilitasi">Rehabilitasi</option>
                                <option value="gaya-hidup">Gaya Hidup Sehat</option>
                                <option value="manajemen-nyeri">Manajemen Nyeri</option>
                                <option value="motivasi">Motivasi</option>
                                <option value="pengalaman">Pengalaman Pribadi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="articleContent" class="form-label">Isi Artikel</label>
                            <textarea class="form-control" id="articleContent" rows="6" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="references" class="form-label">Referensi (Opsional)</label>
                            <textarea class="form-control" id="references" rows="3"
                                placeholder="Sertakan referensi jika Anda mengutip data medis atau penelitian"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agreeTerms" required />
                            <label class="form-check-label" for="agreeTerms">Saya setuju dengan syarat dan ketentuan
                                pengiriman
                                artikel</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary kirim">Kirim Artikel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Donation Modal -->
    <div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donationModalLabel">
                        Dukung dengan Donasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('informasi') }}" method="GET" id="donationForm">
                        <div class="mb-4">
                            <h6 class="mb-3">Jenis Donasi</h6>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="donationType" id="oneTime"
                                        value="donasi_sekali" checked />
                                    <label class="form-check-label" for="oneTime">
                                        Donasi Sekali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="donationType" id="monthly"
                                        value="donasi_bulanan" />
                                    <label class="form-check-label" for="monthly">
                                        Donasi Bulanan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="mb-3">Jumlah Donasi</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <input type="radio" class="btn-check" name="donationAmount" id="amount50"
                                    autocomplete="off" value="50000" />
                                <label class="btn btn-outline-primary" for="amount50">Rp 50.000</label>

                                <input type="radio" class="btn-check" name="donationAmount" id="amount100"
                                    autocomplete="off" value="100000" />
                                <label class="btn btn-outline-primary" for="amount100">Rp 100.000</label>

                                <input type="radio" class="btn-check" name="donationAmount" id="amount250"
                                    autocomplete="off" value="250000" />
                                <label class="btn btn-outline-primary" for="amount250">Rp 250.000</label>

                                <input type="radio" class="btn-check" name="donationAmount" id="amount500"
                                    autocomplete="off" value="500000" />
                                <label class="btn btn-outline-primary" for="amount500">Rp 500.000</label>

                                <input type="radio" class="btn-check" name="donationAmount" id="customAmount"
                                    autocomplete="off" />
                                <label class="btn btn-outline-primary" for="customAmount">Jumlah Lain</label>
                            </div>
                            <div class="mt-3" id="customAmountInput" style="display: none">
                                <input type="number" class="form-control" placeholder="Masukkan jumlah donasi" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="donorName" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="donorName" name="nama" required />
                            </div>
                            <div class="col-md-6">
                                <label for="donorEmail" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="donorEmail" name="email" required />
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="anonymous" />
                            <label class="form-check-label" for="anonymous">Sembunyikan nama saya (donasi anonim)</label>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agreeDonation" required />
                            <label class="form-check-label" for="agreeDonation">Saya setuju dengan syarat dan ketentuan
                                donasi</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary" form="donationForm">
                        Lanjutkan ke Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Saat modal ditutup (klik Batal atau X)
            $('#articleModal').on('hidden.bs.modal', function() {
                $('#uploadArticleForm')[0].reset();
            });

            $('.kirim').on('click', function() {
                if (!$("#uploadArticleForm")[0].checkValidity()) {
                    $("#uploadArticleForm")[0].reportValidity();
                    return;
                }

                // Ambil data form
                let name = $("#name").val();
                let email = $("#email").val();
                let title = $("#articleTitle").val();
                let category = $("#articleCategory").val();
                let content = $("#articleContent").val();
                let references = $("#references").val();

                let waNumber = "{{ preg_replace('/^0/', '62', $action->nama) }}";

                let message = "Halo admin, saya ingin mengirim artikel\n\n" +
                    "*Nama:* " + name + "\n" +
                    "*Email:* " + email + "\n" +
                    "*Judul Artikel:* " + title + "\n" +
                    "*Kategori:* " + category + "\n" +
                    "*Isi Artikel:*\n" + content + "\n\n" +
                    (references ? "*Referensi:*\n" + references + "\n" : "");
                let encodedMessage = encodeURIComponent(message);

                // Redirect ke WhatsApp
                window.open("https://wa.me/" + waNumber + "?text=" + encodedMessage, "_blank");

                $('#articleModal').modal('hide');
                $('#uploadArticleForm')[0].reset();
            });
        });
    </script>
@endpush
