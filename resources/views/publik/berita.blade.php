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
        @foreach($beritas as $index => $brt)
          <div class="col-md-6 col-lg-4">
            <div class="match-card">
              <img
                src="{{ asset('storage/'.$brt->cover) }}"
                alt="{{ $brt->judul }}"
                class="match-thumb"
              />
              <div class="match-body">
                <h5 class="text-center">{{ $brt->judul }}</h5>
                {{-- <p>Rewatch: Fighter A vs Fighter B</p> --}}
                
   
                    <a
                      href="{{ route('berita.detail', ['id' => $brt->id]) }}"
                      target="_blank"
                      class="btn btn-danger btn-block"
                    >
                      Baca Sekarang
                    </a>
    

              </div>
            </div>
          </div>
         @endforeach

       

        <!-- Tambah lebih banyak match jika perlu -->
      </div>
      </div>
    </div>

  




@endsection

@push('js')
  

@endpush
