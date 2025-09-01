@extends('publik.app')
@section('content')
    <section class="payment-container">
        @php
            $data = $informasi->nama;
            $pecah = explode('-', $data);
        @endphp
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Bank Account Information -->
                    <div class="payment-card">
                        <h2 class="section-title">Rekening Pembayaran</h2>
                        <p class="mb-4">{{ $informasi->description }}</p>

                        <!-- Bank 1 -->
                        <div class="bank-card">
                            <div class="bank-header">
                                <div class="bank-icon">
                                    <img src="https://logo.clearbit.com/bca.co.id" alt="BCA" height="30">
                                </div>
                                <div>
                                    <div class="bank-name">{{ $pecah[1] }}</div>
                                </div>
                            </div>
                            <div class="account-details">
                                <div class="account-info">
                                    <span class="account-label">Nomor Rekening:</span>
                                    <span class="account-value">{{ $pecah[0] }}</span>
                                    <button class="copy-btn" data-copy="1234567890">
                                        <i class="fas fa-copy me-1"></i>Salin
                                    </button>
                                </div>
                                <div class="account-info">
                                    <span class="account-label">Atas Nama:</span>
                                    <span class="account-value">{{ $pecah[2] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5 class="mb-3">Instruksi Pembayaran:</h5>
                            <ul class="instructions-list">
                                <li>Lakukan transfer sesuai dengan jumlah yang tertera: <strong>Rp
                                        {{ number_format($donationAmount, 0, ',', '.') }}</strong></li>
                                <li>Transfer dapat dilakukan melalui ATM, Internet Banking, Mobile Banking, atau teller bank
                                </li>
                                <li>Pastikan nama pengirim sesuai dengan nama yang didaftarkan</li>
                            </ul>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="join.html" class="btn btn-outline-primary me-md-2">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                @php
                                    $waNumber = $action->nama;

                                    $waNumber = preg_replace('/^0/', '62', $waNumber);
                                    $message =
                                        $action->description .
                                        "\n" .
                                        'Nama: ' .
                                        $donationName .
                                        "\n" .
                                        'Donasi: Rp ' .
                                        number_format($donationAmount, 0, ',', '.');

                                    // Encode pesan agar aman di URL
                                    $encodedMessage = urlencode($message);
                                @endphp

                                <a href="https://wa.me/{{ $waNumber }}?text={{ $encodedMessage }}"
                                    class="btn btn-primary" target="_blank">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Bukti Pembayaran
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Upload Proof of Payment -->
                    {{-- <div class="payment-card">
                        <h2 class="section-title">Unggah Bukti Pembayaran</h2>
                        <p class="mb-4">Setelah melakukan transfer, silakan unggah bukti pembayaran Anda di bawah ini.</p>

                        <form id="uploadPaymentForm">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Bank Tujuan</label>
                                <select class="form-select" required>
                                    <option value="">Pilih bank tujuan</option>
                                    <option value="bca">Bank Central Asia (BCA)</option>
                                    <option value="bni">Bank Negara Indonesia (BNI)</option>
                                    <option value="mandiri">Bank Mandiri</option>
                                    <option value="other">Bank Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Tanggal Transfer</label>
                                <input type="date" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Jumlah Transfer</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" placeholder="99000" value="99000" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Unggah Bukti Transfer</label>
                                <div class="upload-area" id="uploadArea">
                                    <div class="upload-icon">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <h5>Seret dan lepas file di sini</h5>
                                    <p class="text-muted">atau</p>
                                    <button type="button" class="btn btn-outline-primary" id="browseButton">
                                        <i class="fas fa-search me-2"></i>Pilih File
                                    </button>
                                    <input type="file" class="file-input" id="fileInput" accept="image/*,.pdf" required>
                                    <p class="text-muted mt-2">Format file: JPG, PNG, PDF (maks. 5MB)</p>
                                </div>

                                <div class="file-preview" id="filePreview" style="display: none;">
                                    <img id="previewImage" src="" alt="Preview">
                                    <div class="file-info">
                                        <span id="fileName"></span>
                                        <button type="button" class="btn btn-sm btn-outline-danger ms-2" id="removeFile">
                                            <i class="fas fa-times me-1"></i>Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="confirmPayment" required>
                                <label class="form-check-label" for="confirmPayment">
                                    Saya telah melakukan transfer sesuai dengan instruksi dan memastikan data yang diisi
                                    benar
                                </label>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="join.html" class="btn btn-outline-primary me-md-2">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Bukti Pembayaran
                                </button>
                            </div>
                        </form>
                    </div> --}}

                    <!-- Support Information -->
                    <div class="payment-card">
                        <div class="alert alert-info">
                            <h5><i class="fas fa-info-circle me-2"></i>Butuh Bantuan?</h5>
                            <p class="mb-0">Jika Anda mengalami kesulitan dalam proses pembayaran, silakan hubungi tim
                                dukungan kami melalui email <a
                                    href="mailto:payment@komunitasehab.id">payment@komunitasehab.id</a> atau WhatsApp <a
                                    href="https://wa.me/6281212345678">+62 812-1234-5678</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
