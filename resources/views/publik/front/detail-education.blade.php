@extends('publik.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                <li class="breadcrumb-item"><a
                        href="education.html">{{ Request::is('detail-edukasi/*') ? 'Edukasi' : 'Proyek' }}</a>
                </li>
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
                        {{-- <div class="meta-item">
                            <i class="far fa-eye"></i> 1.245 dilihat
                        </div> --}}
                    </div>

                    <h1 class="display-5 fw-bold mb-3">
                        {{ $data->judul }}
                    </h1>
                    <p class="lead">
                        {{ $data->deskripsi_singkat }}
                    </p>
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
@endsection
