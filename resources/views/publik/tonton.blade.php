@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}   
    
    <!-- Header -->
    <section class="faq-header">
      <div class="container">
        <h1>🥊 Tonton Pertandingan Langsung</h1>
        <p>
          Nikmati pertarungan seru dan tayangan ulang langsung dari platform
          kami.
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
              <h5>Final Championship 2025</h5>
              <p>Rewatch: Fighter A vs Fighter B</p>
              <a
                href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                target="_blank"
                class="btn btn-danger btn-block"
                >Tonton Sekarang</a
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
              <h5>Semi Final 2</h5>
              <p>Fighter C vs Fighter D</p>
              <a
                href="https://www.youtube.com/watch?v=3GwjfUFyY6M"
                target="_blank"
                class="btn btn-danger btn-block"
                >Tonton Sekarang</a
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
  {{-- path path js --}}
@endpush