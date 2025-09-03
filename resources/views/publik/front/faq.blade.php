@extends('publik.app')
@section('content')
    <!-- FAQ Content -->
    <section class="faq-container">
        <div class="container">

            <!-- FAQ Content -->
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <!-- Keanggotaan Category -->
                    <div class="faq-category">
                        <div class="category-header">
                            <div class="category-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h2 class="section-title mb-0">Pertanyaan Umum</h2>
                        </div>

                        <div class="accordion" id="accordionMembership">
                            @foreach ($data as $index => $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}" aria-expanded="true"
                                            aria-controls="collapse{{ $index }}">
                                            {{ ucwords($item->nama) }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}"
                                        class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionMembership">
                                        <div class="accordion-body">
                                            {!! $item->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <h3>Masih ada pertanyaan?</h3>
                        <p>Jika Anda tidak menemukan jawaban yang Anda cari, jangan ragu untuk menghubungi tim dukungan
                            kami.</p>
                        @php
                            $no_hp = $wa->description;
                            // ganti 081 dengan 62
                            $waNumber = preg_replace('/^0/', '62', $no_hp);
                        @endphp
                        <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="btn btn-primary mt-3">
                            <i class="fas fa-envelope me-2"></i>Hubungi Dukungan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        // Category filter functionality
        document.querySelectorAll('.category-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.category-btn').forEach(btn => {
                    btn.classList.remove('active');
                });

                // Add active class to clicked button
                this.classList.add('active');

                // Here you would typically filter the FAQs based on category
                // For demonstration, we're just showing an alert
                const category = this.textContent;
                console.log(`Filtering by category: ${category}`);
            });
        });
    </script>
@endpush
