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
         @foreach($tontons as $index => $ton)
        <div class="col-md-6 col-lg-4">
          <div class="match-card">
            <img
              src="{{ asset('storage/'.$ton->poster_pertand) }}"
              alt="{{ $ton->judul }}"
              class="match-thumb"
            />
            <div class="match-body">
              <h5 class="text-center">{{$ton->judul}}</h5>
              {{-- <p>Rewatch: Fighter A vs Fighter B</p> --}}
              <a
                href="{{$ton->url_nonton_1}}"
                target="_blank"
                class="btn btn-danger btn-block"
                >URL Tonton 1</a
              >
              <a
                href="{{$ton->url_nonton_2}}"
                target="_blank"
                class="btn btn-danger btn-block"
                >URL Tonton 2</a
              >
              <a
                href="{{$ton->url_nonton_3}}"
                target="_blank"
                class="btn btn-danger btn-block"
                >URL Tonton 3</a
              >
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
  {{-- path path js --}}
@endpush