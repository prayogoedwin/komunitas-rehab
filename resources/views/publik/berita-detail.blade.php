@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}

  <style>
    .step-box img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 10px auto;
}
</style>
   
   <div class="container">
    <div class="row">
    <div class="container howtoplay-container">
        <h1 class="howtoplay-title">{{ $berita->judul }}</h1>

        <div class="step-box">
          <img
                src="{{ asset('storage/'.$berita->cover) }}"
                alt="{{ $berita->judul }}"
                class="match-thumb"
              />
          <p>
          {!! $berita->deskripsi !!}
          </p>
        </div>

        <div class="text-center">
          <a href="{{ route('publik') }}" class="btn btn-main">Kembali ke Beranda</a>
        </div>
      </div>
       </div>
    </div>

@endsection

@push('js')
  {{-- path path js --}}
@endpush