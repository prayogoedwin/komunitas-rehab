@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}
    
    <!-- FAQ Header -->
    <section class="faq-header">
      <div class="container">
        <h1>Katalog Produk</h1>
        <p class="lead">
          Tukarkan poin anda dengan pilihan produk beragam dan menarik
        </p>
      </div>
    </section>

    


     <!-- Katalog -->
    <section class="py-4 catalog">

     
      <div class="container">

         <!-- Formulir Prediksi -->
        <div class="catalog-form">
            <div class="form-group">
                <select class="form-control" id="hasil">
                    <option selected disabled>PILIH TIPE PRODUK</option>
                     @foreach($tipeProduks as $index => $tp)
                    <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
                     @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control" id="metode">
                    <option selected disabled>KATEGORI</option>
                    @foreach($kategoriProduks as $index => $kp)
                    <option value="{{ $kp->id }}">{{ $kp->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control" id="ronde">
                    <option selected disabled>URUTKAN</option>
                    <option value="1">POIN RENDAH -> TINGGI</option>
                    <option value="2">POIN TINGGI -> RENDAH</option>
                    <option value="3">TERBARU</option>
                    <option value="4">TERLAMA</option>
                </select>
            </div>

            <div class="form-group">
                <input name="pencarian" class="form-control" placeholder="Cari by nama">
            </div>

            <div class="form-group">
                 <button class="btn btn-success">Filter</button>
            </div>
        </div>
        
        <div class="row">
          <div
            class="col-6 col-md-4 col-lg-2 mb-4 catalog-item"
            data-kategori="digital"
          >
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="https://i.pinimg.com/736x/a8/8c/4a/a88c4ab39fc036cde36e52705a7072fb.jpg"
                  alt="Item 1"
                />
              </div>
              <div class="card-body">
                <h5>Item Digital A</h5>
                <p>Deskripsi singkat A</p>
                <button class="btn btn-primary btn-sm btn-block">
                  Tukar 500 Poin
                </button>
              </div>
            </div>
          </div>

          <div
            class="col-6 col-md-4 col-lg-2 mb-4 catalog-item"
            data-kategori="digital"
          >
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="https://i.pinimg.com/736x/0e/a6/01/0ea6018541f559956d9a3eca86f1fd80.jpg"
                  alt="Item 2"
                />
              </div>
              <div class="card-body">
                <h5>Item Digital B</h5>
                <p>Deskripsi singkat B</p>
                <button class="btn btn-primary btn-sm btn-block">
                  Tukar 750 Poin
                </button>
              </div>
            </div>
          </div>

          <div
            class="col-6 col-md-4 col-lg-2 mb-4 catalog-item"
            data-kategori="digital"
          >
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="https://i.pinimg.com/736x/66/01/1f/66011ff61578dabeae5e5d8603d846cf.jpg"
                  alt="Item 3"
                />
              </div>
              <div class="card-body">
                <h5>Item Digital C</h5>
                <p>Deskripsi singkat C</p>
                <button class="btn btn-primary btn-sm btn-block">
                  Tukar 1000 Poin
                </button>
              </div>
            </div>
          </div>

          <div
            class="col-6 col-md-4 col-lg-2 mb-4 catalog-item"
            data-kategori="digital"
          >
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="https://i.pinimg.com/736x/66/01/1f/66011ff61578dabeae5e5d8603d846cf.jpg"
                  alt="Item 3"
                />
              </div>
              <div class="card-body">
                <h5>Item Digital C</h5>
                <p>Deskripsi singkat C</p>
                <button class="btn btn-primary btn-sm btn-block">
                  Tukar 1000 Poin
                </button>
              </div>
            </div>
          </div>

         <div
            class="col-6 col-md-4 col-lg-2 mb-4 catalog-item"
            data-kategori="digital"
          >
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="https://i.pinimg.com/736x/66/01/1f/66011ff61578dabeae5e5d8603d846cf.jpg"
                  alt="Item 3"
                />
              </div>
              <div class="card-body">
                <h5>Item Digital C</h5>
                <p>Deskripsi singkat C</p>
                <button class="btn btn-primary btn-sm btn-block">
                  Tukar 1000 Poin
                </button>
              </div>
            </div>
          </div>

          <div
            class="col-6 col-md-4 col-lg-2 mb-4 catalog-item"
            data-kategori="digital"
          >
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="https://i.pinimg.com/736x/66/01/1f/66011ff61578dabeae5e5d8603d846cf.jpg"
                  alt="Item 3"
                />
              </div>
              <div class="card-body">
                <h5>Item Digital C</h5>
                <p>Deskripsi singkat C</p>
                <button class="btn btn-primary btn-sm btn-block">
                  Tukar 1000 Poin
                </button>
              </div>
            </div>
          </div>

          <div
            class="col-6 col-md-4 col-lg-2 mb-4 catalog-item"
            data-kategori="digital"
          >
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="https://i.pinimg.com/736x/66/01/1f/66011ff61578dabeae5e5d8603d846cf.jpg"
                  alt="Item 3"
                />
              </div>
              <div class="card-body">
                <h5>Item Digital C</h5>
                <p>Deskripsi singkat C</p>
                <button class="btn btn-primary btn-sm btn-block">
                  Tukar 1000 Poin
                </button>
              </div>
            </div>
          </div>


        </div>
      </div>

       <!-- Tombol Kembali -->
    <div class="text-center my-4">
      <a href="{{ route('publik') }}" class="btn btn-secondary btn-sm"
        >← Kembali ke Beranda</a
      >
    </div>
    </section>

   


@endsection

@push('js')
  {{-- path path js --}}
@endpush