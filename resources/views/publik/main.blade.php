@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}

      <!-- Hero -->
   <div id="ufcCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indikator -->
    <ul class="carousel-indicators">
        <li data-target="#ufcCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#ufcCarousel" data-slide-to="1"></li>
    </ul>

    <!-- Slide -->
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('https://pbs.twimg.com/media/C0oYhv2VQAAHXAO.jpg')">
            {{-- <div class="carousel-caption d-none d-md-block">
                <h3>Conor McGregor</h3>
                <p>McGregor memegang sabuk juara UFC</p>
            </div> --}}
        </div>
        <div class="carousel-item" style="background-image: url('https://images.slivcdn.com/videoasset_images/ufc2023_1_landscape_thumb.jpg')">
            {{-- <div class="carousel-caption d-none d-md-block">
                <h3>UFC 2023</h3>
                <p>Pertandingan UFC seru tahun 2023</p>
            </div> --}}
        </div>
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
      <div style="margin: 40px 0">
        <a
          href="#fightList"
          class="btn btn-warning btn-lg text-uppercase font-weight-bold shadow">
          Prediksi Sekarang
        </a>
      </div>
    </section>

     <!-- Fight List Section (langsung tampil) -->
    <div id="fightList" class="card-fight-wrapper mt-10 opacity-100">
      {{-- <div class="trapezium-title">
        <span>Lihat Prediksi</span>
      </div>
      <div class="fighter-heading-wrapper">
        <p class="fighter-heading">🎯 Pilih Fightermu</p>
      </div> --}}
      

        
        <!-- Pertandingan 1 -->
        <!-- Fight Card -->
    <div class="fight-card">
        <div class="fight-header">
            <h1 class="fight-title">PERTARUNGAN SPESIAL</h1>
        </div>
        
        <div class="fighters-container">
            <div class="fighter">
                <img src="https://i.pinimg.com/736x/46/aa/d6/46aad64828793b5bdbfc353916a37e4b.jpg" 
                     alt="Max Holloway" class="fighter-image">
                <h2 class="fighter-name">MAX HOLLOWAY</h2>
              
            </div>
            
            <div class="vs-badge">VS</div>
            
            <div class="fighter">
                <img src="https://i.pinimg.com/736x/c8/bb/48/c8bb48dc2f8b6f67209da64a8dae6bb7.jpg" 
                     alt="Dustin Poirier" class="fighter-image">
                <h2 class="fighter-name">DUSTIN POIRIER</h2>
            </div>
        </div>

        <!-- Formulir Prediksi -->
        <div class="prediction-form">
            <div class="form-group">
                <select class="form-control" id="hasil">
                    <option selected disabled>PILIH PEMENANG</option>
                    <option value="holloway">MAX HOLLOWAY</option>
                    <option value="poirier">DUSTIN POIRIER</option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control" id="metode">
                    <option selected disabled>METODE KEMENANGAN</option>
                    <option value="ko">KO/TKO</option>
                    <option value="submisi">SUBMISI</option>
                    <option value="keputusan">KEPUTUSAN</option>
                    <option value="diskualifikasi">DISKUALIFIKASI</option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control" id="ronde">
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

       
        
        <!-- Kontainer untuk tombol dan lingkaran persentase -->
        <div class="prediction-container">
            <div class="prediction-btn-container">
                <div class="percentage-circle left">0%</div>
                <button class="prediction-btn">PREDIKSI SEKARANG</button>
                <div class="percentage-circle right">100%</div>
            </div>
        </div>

    </div>

    <div class="fight-card">
       
        
        <div class="fighters-container">
            <div class="fighter">
                <img src="https://i.pinimg.com/736x/46/aa/d6/46aad64828793b5bdbfc353916a37e4b.jpg" 
                     alt="Max Holloway" class="fighter-image">
                <h2 class="fighter-name">MAX HOLLOWAY</h2>
              
            </div>
            
            <div class="vs-badge">VS</div>
            
            <div class="fighter">
                <img src="https://i.pinimg.com/736x/c8/bb/48/c8bb48dc2f8b6f67209da64a8dae6bb7.jpg" 
                     alt="Dustin Poirier" class="fighter-image">
                <h2 class="fighter-name">DUSTIN POIRIER</h2>
            </div>
        </div>

        <!-- Formulir Prediksi -->
        <div class="prediction-form">
            <div class="form-group">
                <select class="form-control" id="hasil">
                    <option selected disabled>PILIH PEMENANG</option>
                    <option value="holloway">MAX HOLLOWAY</option>
                    <option value="poirier">DUSTIN POIRIER</option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control" id="metode">
                    <option selected disabled>METODE KEMENANGAN</option>
                    <option value="ko">KO/TKO</option>
                    <option value="submisi">SUBMISI</option>
                    <option value="keputusan">KEPUTUSAN</option>
                    <option value="diskualifikasi">DISKUALIFIKASI</option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control" id="ronde">
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

       
        
        <!-- Kontainer untuk tombol dan lingkaran persentase -->
        <div class="prediction-container">
            <div class="prediction-btn-container">
                <div class="percentage-circle left">20%</div>
                <button class="prediction-btn">PREDIKSI SEKARANG</button>
                <div class="percentage-circle right">80%</div>
            </div>
        </div>

    </div>

    <div class="fight-card">
       
        
        <div class="fighters-container">
            <div class="fighter">
                <img src="https://i.pinimg.com/736x/46/aa/d6/46aad64828793b5bdbfc353916a37e4b.jpg" 
                     alt="Max Holloway" class="fighter-image">
                <h2 class="fighter-name">MAX HOLLOWAY</h2>
              
            </div>
            
            <div class="vs-badge">VS</div>
            
            <div class="fighter">
                <img src="https://i.pinimg.com/736x/c8/bb/48/c8bb48dc2f8b6f67209da64a8dae6bb7.jpg" 
                     alt="Dustin Poirier" class="fighter-image">
                <h2 class="fighter-name">DUSTIN POIRIER</h2>
            </div>
        </div>       
        
        <!-- Kontainer untuk tombol dan lingkaran persentase -->
        <div class="prediction-container">
            <div class="prediction-btn-container">
                <div class="percentage-circle left">20%</div>
                <button class="prediction-btn">PREDIKSI SEKARANG</button>
                <div class="percentage-circle right">80%</div>
            </div>
        </div>

    </div>

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
@endpush