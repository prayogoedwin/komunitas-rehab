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

            @php
                $isEmpty = $ton->url_nonton_1 == '';
                $btnClass = $isEmpty ? 'btn-dark text-muted' : 'btn-danger';
                $btnStyle = $isEmpty ? 'color: #888;' : '';
                $btnHref = $isEmpty ? '#' : $ton->url_nonton_1;
            @endphp
            <a
              href="{{$ton->url_nonton_1}}"
              target="_blank"
             class="btn {{ $btnClass }} btn-block"
              style="{{ $btnStyle }} {{ $isEmpty ? 'pointer-events: none;' : '' }}"
            >
              URL Tonton 1
            </a>

             @php
                $isEmpty2 = $ton->url_nonton_2 == '';
                $btnClass2 = $isEmpty2 ? 'btn-dark text-muted' : 'btn-danger';
                $btnStyle2 = $isEmpty2 ? 'color: #888;' : '';
                $btnHref2 = $isEmpty2 ? '#' : $ton->url_nonton_2;
            @endphp

              <a
                href="{{$ton->url_nonton_2}}"
                target="_blank"
                class="btn {{ $btnClass2 }} btn-block"
                style="{{ $btnStyle2 }} {{ $isEmpty2 ? 'pointer-events: none;' : '' }}"
                >URL Tonton 2</a
              >

               @php
                $isEmpty3 = $ton->url_nonton_3 == '';
                $btnClass3 = $isEmpty3 ? 'btn-dark text-muted' : 'btn-danger';
                $btnStyle3 = $isEmpty3 ? 'color: #888;' : '';
                $btnHref3 = $isEmpty3 ? '#' : $ton->url_nonton_3;
            @endphp
              <a
                href="{{$ton->url_nonton_3}}"
                target="_blank"
                class="btn {{ $btnClass3 }} btn-block"
                style="{{ $btnStyle3 }} {{ $isEmpty3 ? 'pointer-events: none;' : '' }}"
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