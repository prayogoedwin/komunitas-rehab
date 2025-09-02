@extends('publik.app')
@section('content')
    <!-- Projects Hero Section -->
    <section class="projects-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Proyek Komunitas Rehab</h1>
                    <p class="lead">
                        Inisiatif dan program yang kami kembangkan untuk mendukung proses
                        rehabilitasi mandiri yang lebih baik.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#proyek" class="btn btn-primary">Jelajahi Semua Proyek</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Proyek Komunitas Rehab" class="img-fluid rounded shadow" />
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Impact Section -->
    {{-- <section class="container my-5">
        <h2 class="section-title text-center">Dampak Proyek Kami</h2>
        <div class="row">
            <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="project-icon">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <h3>1,250+</h3>
                    <p class="text-muted">Anggota Terlibat</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="project-icon">
                        <i class="fas fa-project-diagram fa-3x"></i>
                    </div>
                    <h3>24</h3>
                    <p class="text-muted">Proyek Diselesaikan</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="project-icon">
                        <i class="fas fa-map-marker-alt fa-3x"></i>
                    </div>
                    <h3>15</h3>
                    <p class="text-muted">Kota Terjangkau</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="text-center">
                    <div class="project-icon">
                        <i class="fas fa-hand-holding-heart fa-3x"></i>
                    </div>
                    <h3>98%</h3>
                    <p class="text-muted">Kepuasan Peserta</p>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Projects Filter Section -->
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Proyek Kami</h2>
            <form method="GET" action="{{ route('proyek') }}" class="d-flex">
                <select name="sort" class="form-select me-2" style="width: auto" onchange="this.form.submit()">
                    <option value="" {{ request('sort') == '' ? 'selected' : '' }}>Urutkan</option>
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" {{ request('sort') == $item->id ? 'selected' : '' }}>
                            {{ ucwords($item->nama_kategori) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="row" id="proyek">
            <!-- Project Card 3 -->
            @foreach ($data as $item)
                <div class="col-md-6 col-lg-4 mb-4 proyek">
                    <div class="project-card card h-100">
                        <div class="position-relative">
                            <img src="{{ Storage::url($item->cover) }}" class="card-img-top" alt="Latihan Pernapasan" />
                            @php
                                if ($item->kategori->nama_kategori == 'berjalan') {
                                    $status = 'ongoing';
                                    $label = 'berjalan';
                                } elseif ($item->kategori->nama_kategori == 'akan datang') {
                                    $status = 'upcoming';
                                    $label = 'akan datang';
                                } else {
                                    $status = 'completed';
                                    $label = 'selesai';
                                }
                            @endphp
                            <span class="card-status status-{{ $status }}">{{ ucwords($label) }}</span>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title">
                                {{ ucwords($item->judul) }}
                            </h3>
                            <p class="card-text">
                                {{ $item->deskripsi_singkat }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="project-stats"><i class="fas fa-users me-1"></i> {{ $item->jumlah_peserta }}
                                    peserta</span>
                                <span class="project-stats"><i class="far fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->from_date)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($item->to_date)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('detail-proyek', $item->slug) }}" class="btn btn-primary w-100">Detail
                                Proyek</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="javascript:void(0)" class="btn btn-outline-primary" id="loadMore">Muat Lebih Banyak</a>
            <div id="loading" style="display:none; margin-top:10px;">
                <div class="spinner-border text-primary" role="status" style="width:2rem; height:2rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        let offset = 6;
        let isLoading = false;

        $('#loadMore').click(function() {
            if (isLoading) return;
            isLoading = true;

            $('#loading').show();
            $('#loadMore').prop('disabled', true).text('Memuat...');

            $.ajax({
                url: "{{ route('proyek.loadMore') }}",
                type: "POST",
                data: {
                    offset: offset,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if ($.trim(response) !== '') {
                        $('.proyek:last').after(response);
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
