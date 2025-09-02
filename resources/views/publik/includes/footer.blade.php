@if (!Request::is('member/login') || !Request::is('member/register'))
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-4">
                        <i class="fas fa-heartbeat me-2"></i>Komunitas Rehab
                    </h5>
                    <p>
                        Platform komunitas untuk rehabilitasi dan dukungan kesehatan
                        secara holistik.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="mb-4">Tautan Cepat</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="mb-2"><a href="{{ route('about') }}">Tentang Kami</a></li>
                                <li class="mb-2"><a href="{{ route('forum') }}">Forum</a></li>
                                <li class="mb-2"><a href="{{ route('edukasi') }}">Edukasi</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('proyek') }}">Proyek</a></li>
                                <li class="mb-2"><a href="{{ route('dukungan') }}">Dukungan</a></li>
                                <li class="mb-2"><a href="{{ route('gabung') }}">Bergabung</a></li>
                                <li class="mb-2"><a href="{{ route('faq') }}">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-4">
                    <h5 class="mb-4">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        @php
                            $footer = Cache::remember('footer', 86400, function () {
                                return App\Models\Informasi::where('slug', 'like', '%footer%')->get();
                            });
                        @endphp
                        @foreach ($footer as $item)
                            <li class="mb-2">
                                <i class="{{ $item->nama }} me-2"></i> {{ $item->description }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4" />
            <div class="text-center">
                <p class="small">
                    &copy; <span id="year"></span> Komunitas Rehab. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
@endif
