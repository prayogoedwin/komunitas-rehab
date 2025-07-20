@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}
   
   <div class="container howtoplay-container">
      <h1 class="howtoplay-title">💡 Cara Bermain</h1>

      <div class="step-box">
        <p>
          <i class="fas fa-user-check step-icon"></i
          ><strong>1. Daftar / Masuk</strong><br />
          Buat akun atau login ke platform Mola Fight Club.
        </p>
      </div>

      <div class="step-box">
        <p>
          <i class="fas fa-fist-raised step-icon"></i
          ><strong>2. Lihat Pertandingan</strong><br />
          Cek daftar pertarungan yang sedang berlangsung.
        </p>
      </div>

      <div class="step-box">
        <p>
          <i class="fas fa-bullseye step-icon"></i
          ><strong>3. Prediksi Pemenang</strong><br />
          Pilih petarung yang kamu yakini akan menang dari setiap pertandingan.
        </p>
      </div>

      <div class="step-box">
        <p>
          <i class="fas fa-star step-icon"></i
          ><strong>4. Raih Poin & Hadiah</strong><br />
          Kumpulkan poin dari prediksi yang benar dan menangkan hadiah menarik!
        </p>
      </div>

      <div class="text-center">
        <a href="index.html" class="btn btn-main">Kembali ke Beranda</a>
      </div>
    </div>

@endsection

@push('js')
  {{-- path path js --}}
@endpush