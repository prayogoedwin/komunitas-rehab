@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}

<!-- Hero -->
<div id="ufcCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indikator -->
    <ul class="carousel-indicators">
        @foreach ($banners as $index => $banner)
            <li data-target="#ufcCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ul>

    <!-- Slide -->
    <div class="carousel-inner">
        @foreach ($banners as $index => $banner)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/'.$banner->foto) }}'); background-size: cover; background-position: center;">
                {{-- Optional caption --}}
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h3>{{ $banner->judul }}</h3>
                    <p>{{ $banner->deskripsi }}</p>
                </div> --}}
            </div>
        @endforeach
    </div>

    <!-- Kontrol Navigasi -->
    <a class="carousel-control-prev" href="#ufcCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#ufcCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>


    <!-- Section Button Tengah -->
    <section class="section-ranking text-center d-flex align-items-center justify-content-center bg-ranking-section">
      <div style="margin: 50px 0">
        <a
          href="#fightList"
          class="btn btn-warning btn-lg text-uppercase font-weight-bold shadow">
          Prediksi Sekarang
        </a>
      </div>
    </section>

     <!-- Fight List Section (langsung tampil) -->
    <div id="fightList" class="card-fight-wrapper opacity-100" style="margin-top:20px; padding-bottom:30px">
         {{-- <span>AAAAA</span> --}}
      {{-- <div class="trapezium-title">
        <span>Lihat Prediksi</span>
      </div>
      <div class="fighter-heading-wrapper">
        <p class="fighter-heading">🎯 Pilih Fightermu</p>
      </div> --}}
    </div>
      

        
        <!-- Pertandingan 1 -->
        @foreach($tontons as $index => $ton)
            <!-- Fight Card -->
            <div class="fight-card">
                @if($ton->is_special == 1)

                <div class="fight-header">
                    <h1 class="fight-title">PERTARUNGAN SPESIAL</h1>
                </div>
                    
                @endif
                
                
                <div class="fighters-container">
                    <div class="fighter">
                        <img src="{{ asset('storage/'.$ton->pemain_1_foto) }}" 
                            alt="{{$ton->pemain_1_nama}}" class="fighter-image">
                        <h2 class="fighter-name">{{$ton->pemain_1_nama}}</h2>
                    
                    </div>
                    
                    <div class="vs-badge">VS</div>
                    
                    <div class="fighter">
                        <img src="{{ asset('storage/'.$ton->pemain_2_foto) }}" 
                            alt="{{$ton->pemain_2_nama}}" class="fighter-image">
                        <h2 class="fighter-name">{{$ton->pemain_2_nama}}</h2>
                    </div>
                </div>

                <!-- Formulir Prediksi -->
                <form class="prediction-form" data-id="{{ $ton->id }}">
                    @csrf
                    <div class="prediction-form">
                    <div class="form-group">
                        <select class="form-control" name="pemenang">
                            <option selected disabled>PILIH PEMENANG</option>
                            <option value="{{ $ton->pemain_1_id }}">{{ $ton->pemain_1_nama }}</option>
                            <option value="{{ $ton->pemain_2_id }}">{{ $ton->pemain_2_nama }}</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control" name="metode">
                            <option selected disabled>METODE KEMENANGAN</option>
                            <option value="ko">KO/TKO</option>
                            <option value="submisi">SUBMISI</option>
                            <option value="keputusan">KEPUTUSAN</option>
                            <option value="diskualifikasi">DISKUALIFIKASI</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control" name="ronde">
                            <option selected disabled>RONDE</option>
                            <option value="1">RONDE 1</option>
                            <option value="2">RONDE 2</option>
                            <option value="3">RONDE 3</option>
                            <option value="4">RONDE 4</option>
                            <option value="5">RONDE 5</option>
                            <option value="keputusan">KEPUTUSAN</option>
                        </select>
                    </div>
                    </div>

                    {{-- <div class="form-group mt-2 text-center">
                        <button type="submit" class="btn btn-primary">PREDIKSI SEKARANG</button>
                    </div> --}}

                     <div class="prediction-container">
                        <div class="prediction-btn-container">
                            <div class="percentage-circle left">0%</div>
                            @auth('member')
                                 <button type="submit" class="prediction-btn">PREDIKSI SEKARANG</button>
                            @else
                                <a class="prediction-btn" href="{{ route('member.login') }}">PREDIKSI SEKARANG</a>
                            @endauth
                           
                            <div class="percentage-circle right">100%</div>
                        </div>
                    </div>

                </form>


            </div>

       @endforeach

   

        {{-- <div class="text-center">
          <button
            type="button"
            class="btn btn-krem btn-lg"
            onclick="window.location.href='prediksi.html'">
            Lihat Semua Prediksi
          </button>
        </div> --}}
      
    </div>


@endsection

@push('js')
  {{-- path path js --}}
    <script>
        document.querySelectorAll('.prediction-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const matchId = this.dataset.id;
                const formData = new FormData(this);

                fetch(`/member/prediksi/${matchId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message || 'Prediksi berhasil!');
                    // TODO: Update UI kalau perlu (misalnya % progress)
                })
                .catch(err => {
                    alert('Terjadi kesalahan saat mengirim prediksi.');
                    console.error(err);
                });
            });
        });

        // RESET tombol khusus (jika tidak pakai <button type="reset">)
        document.querySelectorAll('.prediction-reset-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const form = this.closest('form');
                form.reset();
            });
        });
    </script>
@endpush