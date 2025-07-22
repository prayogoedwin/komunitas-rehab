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
         @foreach($faqs as $index => $faq)
            <div class="card">
              <div class="card-header" id="faq{{ $faq->id }}">
                <h5 class="mb-0">
                  <button
                    class="btn btn-link"
                    data-toggle="collapse"
                    data-target="#collapse{{ $faq->id }}"
                  >
                    {{ $faq->nama }}
                  </button>
                </h5>
              </div>
              <div
                id="collapse{{ $faq->id }}"
                class="collapse {{ $index == 0 ? 'show' : '' }}"
                data-parent="#faqAccordion"
              >
                <div class="card-body">
                  {!! trim($faq->description, '"') !!}
                </div>
              </div>
            </div>
          @endforeach

          
        </div>
      </div>
    </section>

@endsection

@push('js')
  {{-- path path js --}}
@endpush