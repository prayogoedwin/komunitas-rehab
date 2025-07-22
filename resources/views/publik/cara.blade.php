@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}
   
   <div class="container howtoplay-container">
      <h1 class="howtoplay-title">💡 {{ $cara->nama }}</h1>

      <div class="step-box">
        <p>
         {!! $cara->description !!}
        </p>
      </div>

      <div class="text-center">
        <a href="{{ route('publik') }}" class="btn btn-main">Kembali ke Beranda</a>
      </div>
    </div>

@endsection

@push('js')
  {{-- path path js --}}
@endpush