@extends('publik.app')
@push('css')
    <style>
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }

        .evaluation-btn.active {
            background-color: #007bff;
            color: #fff;
            border-radius: 6px;
            padding: 8px 12px;
        }
    </style>
@endpush
@section('content')
    <!-- Self Check Hero Section -->
    <section class="self-check-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Pemeriksaan Nyeri Mandiri</h1>
            <p class="lead">Evaluasi tingkat nyeri Anda dan dapatkan rekomendasi tindakan yang sesuai</p>
        </div>
    </section>

    <!-- Self Check Content -->
    <section class="self-check-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="check-card">
                        <h2 class="section-title">Penilaian Tingkat Nyeri</h2>
                        <p class="mb-4">Gunakan skala berikut untuk menilai tingkat nyeri yang Anda alami (1 = tidak
                            nyeri, 10 = nyeri sangat berat).</p>

                        <form id="painAssessmentForm">
                            <!-- Tingkat Nyeri Sebelum Perawatan -->
                            <!-- Tingkat Nyeri Sebelum Perawatan -->
                            <div class="mb-5">
                                <h4 class="mb-3">1. Tingkat nyeri sebelum menjalani perawatan</h4>
                                <div class="pain-scale" id="previousPainScale">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <div class="pain-level" data-value="{{ $i }}">
                                            <div class="pain-emoji">
                                                @switch($i)
                                                    @case(1)
                                                        😊
                                                    @break

                                                    @case(2)
                                                        🙂
                                                    @break

                                                    @case(3)
                                                        🙂
                                                    @break

                                                    @case(4)
                                                        😐
                                                    @break

                                                    @case(5)
                                                        😐
                                                    @break

                                                    @case(6)
                                                        😟
                                                    @break

                                                    @case(7)
                                                        😟
                                                    @break

                                                    @case(8)
                                                        😢
                                                    @break

                                                    @case(9)
                                                        😭
                                                    @break

                                                    @case(10)
                                                        😭
                                                    @break
                                                @endswitch
                                            </div>
                                            @if ($i == 1)
                                                <div class="pain-label">Tidak nyeri</div>
                                            @elseif ($i == 3)
                                                <div class="pain-label">Ringan</div>
                                            @elseif ($i == 5)
                                                <div class="pain-label">Sedang</div>
                                            @elseif ($i == 7)
                                                <div class="pain-label">Berat</div>
                                            @elseif ($i == 10)
                                                <div class="pain-label">Sangat berat</div>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                                <input type="hidden" name="previous_pain_level" id="previousPainLevel">
                            </div>

                            <!-- Tingkat Nyeri Saat Ini -->
                            <div class="mb-5">
                                <h4 class="mb-3">2. Tingkat nyeri saat ini</h4>
                                <div class="pain-scale" id="currentPainScale">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <div class="pain-level" data-value="{{ $i }}">
                                            <div class="pain-emoji">
                                                @switch($i)
                                                    @case(1)
                                                        😊
                                                    @break

                                                    @case(2)
                                                        🙂
                                                    @break

                                                    @case(3)
                                                        🙂
                                                    @break

                                                    @case(4)
                                                        😐
                                                    @break

                                                    @case(5)
                                                        😐
                                                    @break

                                                    @case(6)
                                                        😟
                                                    @break

                                                    @case(7)
                                                        😟
                                                    @break

                                                    @case(8)
                                                        😢
                                                    @break

                                                    @case(9)
                                                        😭
                                                    @break

                                                    @case(10)
                                                        😭
                                                    @break
                                                @endswitch
                                            </div>
                                            @if ($i == 1)
                                                <div class="pain-label">Tidak nyeri</div>
                                            @elseif ($i == 3)
                                                <div class="pain-label">Ringan</div>
                                            @elseif ($i == 5)
                                                <div class="pain-label">Sedang</div>
                                            @elseif ($i == 7)
                                                <div class="pain-label">Berat</div>
                                            @elseif ($i == 10)
                                                <div class="pain-label">Sangat berat</div>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                                <input type="hidden" name="current_pain_level" id="currentPainLevel">
                            </div>

                            <!-- Jika Nyeri Meningkat -->
                            <div id="painIncreaseSection" style="display: none;">
                                <div class="alert-warning">
                                    <h5><i class="fas fa-exclamation-triangle me-2"></i>Nyeri Meningkat</h5>
                                    <p class="mb-0">Nyeri Anda tampaknya meningkat. Silakan lakukan evaluasi mandiri di
                                        bawah ini.</p>
                                </div>

                                <!-- Evaluasi Kegiatan -->
                                <div class="mb-4">
                                    <h4 class="mb-3">3. Evaluasi kegiatan yang dilakukan sebelum nyeri</h4>
                                    <div class="evaluation-grid" id="activityGrid">
                                        <div class="evaluation-btn" data-value="jatuh"><span>Riwayat jatuh</span></div>
                                        <div class="evaluation-btn" data-value="kecelakaan"><span>Kecelakaan lalu
                                                lintas</span></div>
                                        <div class="evaluation-btn" data-value="olahraga"><span>Olahraga berlebihan</span>
                                        </div>
                                        <div class="evaluation-btn" data-value="gerakan_memutar"><span>Gerakan
                                                memutar/membungkuk berulang</span></div>
                                        <div class="evaluation-btn" data-value="membungkuk"><span>Membungkuk</span></div>
                                        <div class="evaluation-btn" data-value="mengangkat"><span>Mengangkat barang
                                                berat/tiba-tiba</span></div>
                                        <div class="evaluation-btn" data-value="berjalan"><span>Berjalan jauh</span></div>
                                        <div class="evaluation-btn" data-value="berdiri"><span>Berdiri dalam waktu
                                                lama</span></div>
                                        <div class="evaluation-btn" data-value="duduk_bawah"><span>Duduk di bawah dalam
                                                waktu lama</span></div>
                                        <div class="evaluation-btn" data-value="duduk_kursi"><span>Duduk di kursi dalam
                                                waktu lama</span></div>
                                        <div class="evaluation-btn" data-value="jongkok"><span>Jongkok</span></div>
                                        <div class="evaluation-btn" data-value="alas_kaki"><span>Alas kaki tidak
                                                sesuai</span></div>
                                    </div>
                                    <input type="hidden" name="activity_cause" id="activityCause">
                                </div>

                                <!-- Evaluasi Timbulnya Nyeri -->
                                <div class="mb-4">
                                    <h4 class="mb-3">4. Evaluasi timbulnya nyeri</h4>
                                    <div class="evaluation-grid" id="painGrid">
                                        <div class="evaluation-btn" data-value="bertambah_tidur"><span>Bertambah berat saat
                                                tidur</span></div>
                                        <div class="evaluation-btn" data-value="berkurang_tidur"><span>Berkurang saat
                                                tidur/istirahat</span></div>
                                        <div class="evaluation-btn" data-value="disertai_demam"><span>Disertai demam</span>
                                        </div>
                                        <div class="evaluation-btn" data-value="tidak_bisa_berjalan"><span>Tidak bisa
                                                berjalan selama beberapa hari</span></div>
                                        <div class="evaluation-btn" data-value="bertambah_gerak"><span>Bertambah berat saat
                                                gerak tertentu</span></div>
                                    </div>
                                    <input type="hidden" name="pain_condition" id="painCondition">
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="reset" class="btn btn-outline-primary me-md-2">
                                    <i class="fas fa-redo me-2"></i>Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-check-circle me-2"></i>Lihat Hasil Evaluasi
                                </button>
                            </div>
                        </form>

                        <!-- Hasil Evaluasi -->
                        <div class="result-container" id="resultContainer" style="display:none;">
                            <h3 class="section-title">Hasil Evaluasi Mandiri</h3>

                            <div id="normalResult">
                                <div class="alert-success">
                                    <h5><i class="fas fa-check-circle me-2"></i>Nyeri Tidak Meningkat</h5>
                                    <p class="mb-0">Berdasarkan penilaian Anda, nyeri tidak menunjukkan peningkatan yang
                                        signifikan. Tetap pantau kondisi Anda dan lakukan aktivitas sesuai toleransi.</p>
                                </div>
                            </div>

                            <div id="warningResult">
                                <div class="alert-warning">
                                    <h5><i class="fas fa-exclamation-triangle me-2"></i>Perhatian</h5>
                                    <p>Nyeri Anda menunjukkan peningkatan. Berdasarkan evaluasi yang Anda lakukan, berikut
                                        rekomendasi kami:</p>
                                    <ul class="recommendation-list">
                                        <li>Hindari gerakan yang menyebabkan timbulnya nyeri</li>
                                        <li>Perbaiki postur tubuh dalam aktivitas sehari-hari</li>
                                        <li>Lakukan aktivitas ringan secara teratur</li>
                                        <li>Jika nyeri tidak berkurang dalam 3-5 hari, pertimbangkan untuk memeriksakan diri
                                            ke puskesmas/rumah sakit terdekat</li>
                                    </ul>
                                </div>
                            </div>

                            <div id="dangerResult">
                                <div class="alert-danger">
                                    <h5><i class="fas fa-exclamation-circle me-2"></i>Segera Periksakan Diri</h5>
                                    <p>Berdasarkan evaluasi yang Anda lakukan, kami menyarankan untuk segera memeriksakan
                                        diri ke tenaga kesehatan:</p>
                                    <ul class="recommendation-list">
                                        <li>Beberapa gejala yang Anda laporkan memerlukan evaluasi medis lebih lanjut</li>
                                        <li>Segera kunjungi puskesmas atau rumah sakit terdekat</li>
                                        <li>Hindari aktivitas yang memperberat nyeri hingga diperiksa oleh tenaga kesehatan
                                        </li>
                                    </ul>
                                </div>

                                <div class="mt-4">
                                    <h5>Puskesmas dan Rumah Sakit Terdekat</h5>
                                    <p>Berikut beberapa fasilitas kesehatan yang dapat Anda kunjungi:</p>
                                    <ul class="recommendation-list">
                                        <li>Puskesmas terdekat di wilayah Anda</li>
                                        <li>Rumah Sakit Umum Daerah setempat</li>
                                        <li>Klinik pratama yang memiliki layanan fisioterapi</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button class="btn btn-outline-primary me-md-2" id="backToForm">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Form
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        function setupPainScale(scaleElement, inputElement) {
            const painLevels = scaleElement.querySelectorAll('.pain-level');

            painLevels.forEach(level => {
                level.addEventListener('click', () => {
                    painLevels.forEach(l => l.classList.remove('active'));
                    level.classList.add('active');
                    inputElement.value = level.getAttribute('data-value');
                    checkPainIncrease();
                });
            });
        }

        const previousPainScale = document.getElementById('previousPainScale');
        const previousPainLevel = document.getElementById('previousPainLevel');
        setupPainScale(previousPainScale, previousPainLevel);

        const currentPainScale = document.getElementById('currentPainScale');
        const currentPainLevel = document.getElementById('currentPainLevel');
        setupPainScale(currentPainScale, currentPainLevel);

        function checkPainIncrease() {
            const previous = parseInt(previousPainLevel.value);
            const current = parseInt(currentPainLevel.value);

            const painIncreaseSection = document.getElementById('painIncreaseSection');

            if (previous && current && current > previous) {
                painIncreaseSection.style.display = 'block';
            } else {
                painIncreaseSection.style.display = 'none';
            }
        }

        function setupEvaluationButtons(containerId, inputElement) {
            const buttons = document.querySelectorAll(`#${containerId} .evaluation-btn`);

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Single select
                    buttons.forEach(b => b.classList.remove('active'));
                    button.classList.add('active');
                    inputElement.value = button.getAttribute('data-value');
                });
            });
        }

        // Setup evaluation buttons
        setupEvaluationButtons('activityGrid', document.getElementById('activityCause'));
        setupEvaluationButtons('painGrid', document.getElementById('painCondition'));

        // Form submission
        document.getElementById('painAssessmentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const previous = parseInt(previousPainLevel.value);
            const current = parseInt(currentPainLevel.value);
            const painCondition = document.getElementById('painCondition').value;

            const resultContainer = document.getElementById('resultContainer');
            const normalResult = document.getElementById('normalResult');
            const warningResult = document.getElementById('warningResult');
            const dangerResult = document.getElementById('dangerResult');

            // Hide all results first
            normalResult.style.display = 'none';
            warningResult.style.display = 'none';
            dangerResult.style.display = 'none';

            if (!previous || !current) {
                alert('Silakan pilih tingkat nyeri sebelum dan saat ini.');
                return;
            }

            resultContainer.style.display = 'block';

            if (current <= previous) {
                normalResult.style.display = 'block';
            } else if (['bertambah_tidur', 'disertai_demam', 'tidak_bisa_berjalan'].includes(painCondition)) {
                dangerResult.style.display = 'block';
            } else {
                warningResult.style.display = 'block';
            }

            resultContainer.scrollIntoView({
                behavior: 'smooth'
            });
        });

        // kembali ke form
        document.getElementById('backToForm').addEventListener('click', function() {
            document.getElementById('resultContainer').style.display = 'none';
        });

        // Form reset
        document.querySelector('button[type="reset"]').addEventListener('click', function() {
            document.querySelectorAll('.pain-level').forEach(level => {
                level.classList.remove('active');
            });

            document.querySelectorAll('.evaluation-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            previousPainLevel.value = '';
            currentPainLevel.value = '';
            document.getElementById('activityCause').value = '';
            document.getElementById('painCondition').value = '';

            document.getElementById('painIncreaseSection').style.display = 'none';
            document.getElementById('resultContainer').style.display = 'none';
        });
    </script>
@endpush
