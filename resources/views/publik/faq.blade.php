@extends('publik.template.publik')

@section('content')
  {{-- di isi konten --}}
    
    <!-- FAQ Header -->
    <section class="faq-header">
      <div class="container">
        <h1>Pertanyaan yang Sering Diajukan</h1>
        <p class="lead">
          Temukan jawaban dari pertanyaan umum seputar Gila Prediksi.
        </p>
      </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="py-5 faq">
      <div class="container">
        <div id="faqAccordion" class="accordion">
          <!-- FAQ 1 -->
          <div class="card">
            <div class="card-header" id="faq1">
              <h5 class="mb-0">
                <button
                  class="btn btn-link"
                  data-toggle="collapse"
                  data-target="#collapse1"
                >
                  Apa itu Gila Prediksi?
                </button>
              </h5>
            </div>
            <div
              id="collapse1"
              class="collapse show"
              data-parent="#faqAccordion"
            >
              <div class="card-body">
                Gila Prediksi adalah platform digital untuk menyaksikan
                pertandingan dan membuat prediksi seru demi mengumpulkan poin
                dan hadiah.
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="card">
            <div class="card-header" id="faq2">
              <h5 class="mb-0">
                <button
                  class="btn btn-link collapsed"
                  data-toggle="collapse"
                  data-target="#collapse2"
                >
                  Bagaimana cara mendapatkan poin?
                </button>
              </h5>
            </div>
            <div id="collapse2" class="collapse" data-parent="#faqAccordion">
              <div class="card-body">
                Kamu bisa mendapatkan poin dengan membuat prediksi pada
                pertandingan dan menyelesaikan misi yang tersedia.
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="card">
            <div class="card-header" id="faq3">
              <h5 class="mb-0">
                <button
                  class="btn btn-link collapsed"
                  data-toggle="collapse"
                  data-target="#collapse3"
                >
                  Apakah poin bisa ditukar?
                </button>
              </h5>
            </div>
            <div id="collapse3" class="collapse" data-parent="#faqAccordion">
              <div class="card-body">
                Ya, poin dapat ditukar dengan berbagai hadiah menarik di halaman
                katalog seperti voucher digital, merchandise, dan lainnya.
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="card">
            <div class="card-header" id="faq4">
              <h5 class="mb-0">
                <button
                  class="btn btn-link collapsed"
                  data-toggle="collapse"
                  data-target="#collapse4"
                >
                  Apakah saya perlu membayar untuk bergabung?
                </button>
              </h5>
            </div>
            <div id="collapse4" class="collapse" data-parent="#faqAccordion">
              <div class="card-body">
                Tidak. Bergabung di Gila Prediksi sepenuhnya gratis. Kamu
                hanya perlu mendaftar dan mulai bermain.
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

@push('js')
  {{-- path path js --}}
@endpush