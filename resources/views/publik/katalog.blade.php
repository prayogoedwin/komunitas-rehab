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
        <form method="GET" class="catalog-form">
          @csrf
          <div class="form-group">
              <select class="form-control" name="tipe_id">
                  <option selected disabled>PILIH TIPE PRODUK</option>
                  @foreach($tipeProduks as $tp)
                      <option value="{{ $tp->id }}" {{ request('tipe_id') == $tp->id ? 'selected' : '' }}>{{ $tp->nama }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <select class="form-control" name="kategori_id">
                  <option selected disabled>KATEGORI</option>
                  @foreach($kategoriProduks as $kp)
                      <option value="{{ $kp->id }}" {{ request('kategori_id') == $kp->id ? 'selected' : '' }}>{{ $kp->nama }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <select class="form-control" name="sort">
                  <option selected disabled>URUTKAN</option>
                  <option value="1" {{ request('sort') == 1 ? 'selected' : '' }}>POIN RENDAH → TINGGI</option>
                  <option value="2" {{ request('sort') == 2 ? 'selected' : '' }}>POIN TINGGI → RENDAH</option>
                  <option value="3" {{ request('sort') == 3 ? 'selected' : '' }}>TERBARU</option>
                  <option value="4" {{ request('sort') == 4 ? 'selected' : '' }}>TERLAMA</option>
              </select>
          </div>

          <div class="form-group">
              <input type="text" name="q" class="form-control" placeholder="Cari by nama" value="{{ request('q') }}">
          </div>

          <div class="form-group d-flex gap-2">
              <button class="btn btn-success" type="submit">Filter</button>
              &nbsp;
              <a href="{{ route('katalog') }}" class="btn btn-secondary">Reset</a>
          </div>
        </form>
        
        <div class="row">


         @foreach($produks as $index => $prd)
          <div class="col-6 col-md-4 col-lg-2 mb-4 catalog-item" data-kategori="digital">
            <div class="catalog-card">
              <div class="image-wrapper">
                <img
                  src="{{ asset('storage/'.$prd->foto) }}"
                  alt="{{ $prd->nama }}"
                />
              </div>
              <div class="card-body">
                <h5>{{ $prd->nama }}</h5>
                <p>{{ $prd->tipe->nama }} - {{ $prd->kategori->nama }}</p>
         
                {{-- <button class="btn btn-primary btn-sm btn-block">
                  Tukar {{ $prd->poin }} Poin
                </button> --}}

                <button 
                  type="button"
                  class="btn btn-primary btn-sm btn-block btn-tukar"
                  data-id="{{ $prd->id }}"
                  data-nama="{{ $prd->nama }}"
                  data-kategori="{{ $prd->kategori->nama }}"
                  data-tipe="{{ $prd->tipe->nama }}"
                  data-foto="{{ asset('storage/'.$prd->foto) }}"
                >
                  Tukar {{ $prd->poin }} Poin
                </button>

              </div>
            </div>
          </div>
        @endforeach

        <div class="modal fade" id="modalProdukDetail" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form id="formTukarPoin">
                <div class="modal-header">
                  <h5 class="modal-title" id="produkModalLabel">Detail Produk</h5>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body text-center">
                  <img id="modalGambarProduk" class="img-fluid mb-3" />
                  <h5 id="modalNamaProduk"></h5>
                  <p id="modalKategoriProduk"></p>

                  <div class="mb-3">
                    <label for="varianSelect">Pilih Varian</label>
                    <select name="produk_stok_varian_id" id="varianSelect" class="form-control"></select>
                  </div>

                  <input type="hidden" id="produkId" name="produk_id" />
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Tukar Poin</button>
                </div>
              </form>
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

<script>
$(document).on('click', '.btn-tukar', function () {
  console.log('Tombol diklik');
    let button = $(this);

    let produkId = button.data('id');
    let nama = button.data('nama');
    let kategori = button.data('kategori');
    let tipe = button.data('tipe');
    let foto = button.data('foto');

    $('#modalNamaProduk').text(nama);
    $('#modalKategoriProduk').text(`${tipe} - ${kategori}`);
    $('#produkId').val(produkId);

    // Ganti gambar produk jika tersedia
    // $('#modalGambarProduk').attr('src', 'https://i.pinimg.com/736x/66/01/1f/66011ff61578dabeae5e5d8603d846cf.jpg');
    $('#modalGambarProduk').attr('src', foto || '{{ asset('img/logo.png') }}');


    $.get(`/produk/${produkId}/varians`, function (res) {
        $('#varianSelect').empty().append('<option selected disabled>Pilih Varian</option>');
        res.forEach(item => {
            let label = `${item.varian} - (${item.ukuran}) - (stok: ${item.stok})`;
            let disabled = item.stok < 1 ? 'disabled' : '';
            $('#varianSelect').append(`<option value="${item.id}" ${disabled}>${label}</option>`);
        });
    });

    // Tampilkan modal
    let modal = new bootstrap.Modal(document.getElementById('modalProdukDetail'));
    modal.show();
});
</script>

@endpush