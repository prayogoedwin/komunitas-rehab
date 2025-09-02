@foreach ($data as $item)
    <div class="col-md-6 col-lg-4 mb-4 edukasi">
        <div class="education-card card h-100">
            <div class="position-relative">
                <img src="{{ Storage::url($item->cover) }}" class="card-img-top" alt="Latihan untuk Nyeri Punggung" />
                <span class="card-category">{{ $item->kategori->nama_kategori }}</span>
            </div>
            <div class="card-body">
                <h3 class="h5 card-title">
                    {{ ucwords($item->judul) }}
                </h3>
                <p class="card-text">
                    {{ $item->deskripsi_singkat }}
                </p>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{ route('detail-edukasi', $item->slug) }}" class="btn btn-primary w-100">Baca
                    Selengkapnya</a>
            </div>
        </div>
    </div>
@endforeach
