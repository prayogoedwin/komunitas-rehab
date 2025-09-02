@extends('publik.app')
@section('content')
    <!-- Forum Hero Section -->
    <section class="forum-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Forum Komunitas Rehab</h1>
                    <p class="lead">
                        Ruang aman dan inklusif untuk berbagi pengalaman, motivasi, dan
                        dukungan dalam perjalanan rehabilitasi.
                    </p>
                    <a href="#diskusi" class="btn btn-primary me-2">Bergabung Diskusi</a>
                    <a href="{{ route('member.register') }}" class="btn btn-outline-primary px-4 py-2">Bergabung
                        Sekarang</a>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1589652717521-10c0d092dea9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Diskusi Komunitas" class="img-fluid rounded shadow" />
                </div>
            </div>
        </div>
    </section>

    <!-- Forum Benefits Section -->
    <section class="container my-5">
        <h2 class="section-title text-center">
            Mengapa Bergabung dengan Forum Kami?
        </h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt fa-3x"></i>
                    </div>
                    <h3>Ruang Aman & Inklusif</h3>
                    <p>
                        Tempat yang nyaman bagi pasien, keluarga, dan pendamping untuk
                        meningkatkan motivasi tanpa rasa khawatir.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-hands-helping fa-3x"></i>
                    </div>
                    <h3>Dukungan Sosial</h3>
                    <p>
                        Membangun jaringan dukungan yang memperkuat semangat pasien dalam
                        menjalani proses pemulihan.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-comments fa-3x"></i>
                    </div>
                    <h3>Diskusi Interaktif</h3>
                    <p>
                        Sarana diskusi antara pasien, tenaga kesehatan, dan masyarakat
                        umum tentang rehabilitasi mandiri.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Forum Categories Section -->
    <section class="container my-5">
        <h2 class="section-title">Kategori Forum</h2>
        <div class="row">
            @foreach ($kategori as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="category-card card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="fas fa-running fa-2x text-primary"></i>
                                </div>
                                <h3 class="h5 mb-0">{{ $item->nama_kategori }}</h3>
                            </div>
                            {{-- <p class="card-text">
                                Diskusi tentang latihan harian, variasi gerakan, serta cara
                                menyesuaikan latihan dengan kondisi tubuh.
                            </p> --}}
                            {{-- <div class="mt-3">
                                <span class="forum-stats"><i class="fas fa-comments me-1"></i> {{  }} diskusi</span>
                                <span class="forum-stats ms-3"><i class="fas fa-users me-1"></i> 563 partisipan</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Recent Discussions Section -->
    <section class="container my-5" id="diskusi">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Diskusi Terbaru</h2>
            <button class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Diskusi Baru
            </button>
        </div>

        @foreach ($data as $item)
            <div class="forum-card">
                <div class="d-flex align-items-start">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                        alt="User" class="user-avatar me-3" />
                    <div class="flex-grow-1">
                        <h4 class="h5">
                            <a href="{{ route('detail-forum', $item->id) }}" style="text-decoration: none"
                                class="forum-judul" data-id="{{ $item->id }}">{{ $item->judul }}</a>
                        </h4>
                        <p class="text-muted">
                            {{-- limit deskripsi --}}
                            {{ Str::limit($item->deskripsi, 300) }}
                        </p>
                        <div class="d-flex flex-wrap align-items-center mt-3">
                            <span class="forum-stats me-3"><i class="fas fa-user me-1"></i>
                                {{ $item->sender->name }}</span>
                            <span class="forum-stats me-3"><i
                                    class="fas fa-clock me-1"></i>{{ $item->created_at->diffForHumans() }}</span>
                            <span class="forum-stats me-3"><i class="fas fa-comment me-1"></i>
                                {{ $item->comment()->count() }} balasan</span>
                            <span class="forum-stats me-3"><i class="fas fa-eye me-1"></i> {{ $item->viewers }}
                                dilihat</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-center mt-4">
            <a href="javascript:void(0)" class="btn btn-outline-primary" id="loadMore">Lihat Semua Diskusi</a>
            <div id="loading" style="display:none; margin-top:10px;">
                <div class="spinner-border text-primary" role="status" style="width:2rem; height:2rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 my-5" style="background-color: #f0f8ff">
        <div class="container">
            <h2 class="section-title text-center">Fitur Anggota Forum</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-id-card fa-3x"></i>
                        </div>
                        <h3>Profil Anggota</h3>
                        <p>
                            Biodata singkat dengan informasi jenis kondisi dan lama
                            pemulihan (opsional).
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-edit fa-3x"></i>
                        </div>
                        <h3>Posting & Balasan</h3>
                        <p>
                            Berbagi tulisan, gambar, atau tautan terkait pemulihan dan
                            rehabilitasi.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-tags fa-3x"></i>
                        </div>
                        <h3>Tag & Pencarian</h3>
                        <p>
                            Memudahkan menemukan topik spesifik seperti #nyeripunggung,
                            #tidur, #latihan.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-thumbs-up fa-3x"></i>
                        </div>
                        <h3>Like & Komentar</h3>
                        <p>
                            Fitur untuk mendorong interaksi positif antar anggota komunitas.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt fa-3x"></i>
                        </div>
                        <h3>Moderasi Aman</h3>
                        <p>
                            Aturan forum (netiket) agar tetap ramah, empatik, dan bebas
                            stigma.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="py-5 mb-5" style="background-color: var(--secondary-color)">
        <div class="container text-center py-4">
            <h2 class="mb-4">Tertarik untuk Bergabung?</h2>
            <p class="lead mb-4">
                Dapatkan dukungan rehabilitasi yang Anda butuhkan dengan bergabung
                bersama komunitas kami.
            </p>
            <a href="{{ route('dukungan') }}" class="btn btn-primary me-3">Dukungan</a>
            <a href="#" class="btn btn-outline-dark">Hubungi Kami</a>
        </div>
    </section> --}}
@endsection
@push('js')
    <script>
        document.querySelectorAll('.forum-judul').forEach(el => {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                let id = this.dataset.id;
                let url = this.getAttribute('href');

                fetch(`/forum/${id}/increment-view`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    }
                }).then(() => {
                    // redirect setelah increment
                    window.location.href = url;
                });
            });
        });

        let offset = 5;
        let isLoading = false;

        $('#loadMore').click(function() {
            if (isLoading) return;
            isLoading = true;

            $('#loading').show();
            $('#loadMore').prop('disabled', true).text('Memuat...');

            $.ajax({
                url: "{{ route('forum.loadMore') }}",
                type: "POST",
                data: {
                    offset: offset,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if ($.trim(response) !== '') {
                        $('.forum-card:last').after(response);
                        offset += 5;
                        $('#loadMore').prop('disabled', false).text('Muat Lebih Banyak');
                    } else {
                        $('#loadMore').hide();
                    }
                    $('#loading').hide();
                    isLoading = false;
                },
                error: function() {
                    alert('Gagal memuat data');
                    $('#loadMore').prop('disabled', false).text('Muat Lebih Banyak');
                    $('#loading').hide();
                    isLoading = false;
                }
            });
        });
    </script>
@endpush
