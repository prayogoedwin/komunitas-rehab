@extends('publik.app')
@section('content')
    <!-- Join Hero Section -->
    <section class="join-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Bergabung dengan Komunitas Rehab
                    </h1>
                    <p class="lead">
                        Jadilah bagian dari komunitas yang saling mendukung dalam
                        perjalanan rehabilitasi dan pemulihan kesehatan.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('member.register') }}" class="btn btn-primary">Daftar Sekarang</a>
                        <a href="#benefits" class="btn btn-outline-primary">Lihat Keuntungan</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Bergabung dengan Komunitas Rehab" class="img-fluid rounded shadow" />
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="container my-5">
        <h2 class="section-title text-center">Keuntungan Bergabung</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Komunitas Supportif</h3>
                    <p>
                        Terhubung dengan orang-orang yang memahami perjalanan rehabilitasi
                        Anda dan saling mendukung.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-book-medical"></i>
                    </div>
                    <h3>Akses Edukasi Eksklusif</h3>
                    <p>
                        Dapatkan akses ke materi edukasi, video latihan, dan panduan
                        rehabilitasi yang lengkap.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Konsultasi dengan Ahli</h3>
                    <p>
                        Kesempatan berkonsultasi dengan tenaga kesehatan profesional yang
                        berpengalaman.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Tools Evaluasi</h3>
                    <p>
                        Akses ke alat evaluasi mandiri untuk memantau perkembangan kondisi
                        kesehatan Anda.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3>Program Terstruktur</h3>
                    <p>
                        Ikuti program rehabilitasi terstruktur yang disesuaikan dengan
                        kebutuhan dan kondisi Anda.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3>Dukungan Emosional</h3>
                    <p>
                        Dukungan psikologis dan emotional support dari komunitas yang
                        memahami perjuangan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How to Join Section -->
    <section class="container my-5">
        <h2 class="section-title text-center">Cara Bergabung</h2>
        <div class="row">
            <!-- <div class="col-md-6 col-lg-3 mb-4">
                    <div class="step-card">
                      <div class="step-number">1</div>
                      <h3 class="h4">Pilih Keanggotaan</h3>
                      <p>Pilih jenis keanggotaan yang sesuai dengan kebutuhan Anda.</p>
                    </div>
                  </div> -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3 class="h4">Isi Formulir</h3>
                    <p>Isi formulir pendaftaran dengan data diri yang valid.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3 class="h4">Verifikasi Akun</h3>
                    <p>Verifikasi akun Anda melalui email yang kami kirimkan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3 class="h4">Akses Komunitas</h3>
                    <p>Mulai akses semua fitur dan manfaat keanggotaan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Options Section -->
    <!-- <section id="membership" class="container my-5">
                <h2 class="section-title text-center">Pilihan Keanggotaan</h2>
                <p class="text-center lead mb-5">
                  Pilih paket keanggotaan yang paling sesuai dengan kebutuhan Anda
                </p>

                <div class="row">
                  <div class="col-md-6 col-lg-4 mb-4">
                    <div class="membership-card">
                      <h3>Anggota Dasar</h3>
                      <div class="price">Gratis</div>
                      <p class="period">Selamanya</p>
                      <ul class="feature-list">
                        <li>Akses ke forum komunitas</li>
                        <li>Materi edukasi dasar</li>
                        <li>Partisipasi dalam diskusi</li>
                        <li>Notifikasi kegiatan</li>
                        <li class="text-muted"><s>Konsultasi dengan ahli</s></li>
                        <li class="text-muted"><s>Program rehabilitasi personal</s></li>
                        <li class="text-muted"><s>Tools evaluasi lengkap</s></li>
                      </ul>
                      <button class="btn btn-outline-primary w-100">Pilih Paket</button>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4 mb-4">
                    <div class="membership-card featured">
                      <h3>Anggota Premium</h3>
                      <div class="price">Rp 99.000</div>
                      <p class="period">per bulan</p>
                      <ul class="feature-list">
                        <li>Semua fitur Anggota Dasar</li>
                        <li>Konsultasi dengan ahli 2x/bulan</li>
                        <li>Program rehabilitasi personal</li>
                        <li>Akses tools evaluasi lengkap</li>
                        <li>Video latihan eksklusif</li>
                        <li>Dukungan prioritas</li>
                        <li>Diskon produk kesehatan</li>
                      </ul>
                      <button class="btn btn-primary w-100">Pilih Paket</button>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4 mb-4">
                    <div class="membership-card">
                      <h3>Keanggotaan Keluarga</h3>
                      <div class="price">Rp 199.000</div>
                      <p class="period">per bulan</p>
                      <ul class="feature-list">
                        <li>Semua fitur Anggota Premium</li>
                        <li>Untuk 3 anggota keluarga</li>
                        <li>Konsultasi dengan ahli 4x/bulan</li>
                        <li>Program rehabilitasi keluarga</li>
                        <li>Sesi grup khusus keluarga</li>
                        <li>Dukungan lengkap untuk pendamping</li>
                        <li>Diskon tambahan produk kesehatan</li>
                      </ul>
                      <button class="btn btn-outline-primary w-100">Pilih Paket</button>
                    </div>
                  </div>
                </div>
              </section> -->

    <!-- Registration Form Section -->
    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h2 class="section-title text-center">Formulir Pendaftaran</h2>
                        <p class="text-center mb-4">
                            Isi data diri Anda untuk bergabung dengan Komunitas Rehab
                        </p>

                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstName" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastName" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="phone" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="password" required />
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" id="confirmPassword" required />
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="userType" class="form-label">Saya adalah</label>
                                    <select class="form-select" id="userType" required>
                                        <option value="">Pilih kategori</option>
                                        <option value="patient">Pasien</option>
                                        <option value="family">Keluarga Pasien</option>
                                        <option value="caregiver">Pendamping</option>
                                        <option value="professional">Tenaga Kesehatan</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="condition" class="form-label">Kondisi Kesehatan (opsional)</label>
                                    <input type="text" class="form-control" id="condition"
                                        placeholder="Contoh: Nyeri punggung, pasca stroke, dll." />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="membershipType" class="form-label">Jenis Keanggotaan</label>
                                <select class="form-select" id="membershipType" required>
                                    <option value="">Pilih keanggotaan</option>
                                    <option value="basic">Anggota Dasar (Gratis)</option>
                                    <option value="premium">
                                        Anggota Premium (Rp 99.000/bulan)
                                    </option>
                                    <option value="family">
                                        Keanggotaan Keluarga (Rp 199.000/bulan)
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="agreeTerms" required />
                                <label class="form-check-label" for="agreeTerms">Saya setuju dengan
                                    <a href="#">Syarat dan Ketentuan</a> serta
                                    <a href="#">Kebijakan Privasi</a></label>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Daftar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="container my-5">
        <h2 class="section-title text-center">Pertanyaan Umum</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apakah keanggotaan gratis benar-benar gratis?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Ya, keanggotaan dasar benar-benar gratis selamanya. Anda akan
                        mendapatkan akses ke forum komunitas, materi edukasi dasar, dan
                        dapat berpartisipasi dalam diskusi tanpa biaya apapun.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bagaimana cara pembayaran untuk keanggotaan premium?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Pembayaran dapat dilakukan melalui transfer bank, kartu kredit,
                        atau dompet digital. Pembayaran akan diperbarui secara otomatis
                        setiap bulan untuk kemudahan Anda.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Bisakah saya membatalkan keanggotaan premium kapan saja?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Tentu saja. Anda dapat membatalkan keanggotaan premium kapan saja
                        melalui pengaturan akun Anda. Pembayaran berikutnya tidak akan
                        ditarik setelah pembatalan.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
