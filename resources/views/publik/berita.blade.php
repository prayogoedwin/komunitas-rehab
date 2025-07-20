@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}
        
   

      <!-- FAQ Header -->
    <section class="faq-header">
      <div class="container">
        <h1>News & Articles</h1>
        <p class="lead">
          Temukan berita dan artikel terbaru seputar Gila Prediksi.
        </p>
      </div>
    </section>

        <!-- Video Section -->
    <div class="py-5 match">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="match-card">
            <img
              src="https://img.youtube.com/vi/dQw4w9WgXcQ/hqdefault.jpg"
              alt="Match 1"
              class="match-thumb"
            />
            <div class="match-body">
              <h5>Ulasan Final Championship 2025</h5>
              <p>Rewatch: Fighter A vs Fighter B</p>
              <a
                href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                target="_blank"
                class="btn btn-danger btn-block"
                >Baca Sekarang</a
              >
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="match-card">
            <img
              src="https://img.youtube.com/vi/3GwjfUFyY6M/hqdefault.jpg"
              alt="Match 2"
              class="match-thumb"
            />
            <div class="match-body">
              <h5>Ulasan Semi Final 2</h5>
              <p>Fighter C vs Fighter D</p>
              <a
                href="https://www.youtube.com/watch?v=3GwjfUFyY6M"
                target="_blank"
                class="btn btn-danger btn-block"
                >Baca Sekarang</a
              >
            </div>
          </div>
        </div>

        <!-- Tambah lebih banyak match jika perlu -->
      </div>
      </div>
    </div>

  




@endsection

@push('js')
  

@endpush
