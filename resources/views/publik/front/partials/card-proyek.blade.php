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
