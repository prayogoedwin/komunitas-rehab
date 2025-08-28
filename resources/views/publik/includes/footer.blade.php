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
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="mb-4">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Beranda</a></li>
                        <li class="mb-2"><a href="#">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#">Forum</a></li>
                        <li class="mb-2"><a href="#">Edukasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="mb-4">Layanan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Proyek</a></li>
                        <li class="mb-2"><a href="#">Dukungan</a></li>
                        <li class="mb-2"><a href="#">Bergabung</a></li>
                        <li class="mb-2"><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 mb-4">
                    <h5 class="mb-4">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i> Jl. Kesehatan No.
                            123, Jakarta
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2"></i> (021) 1234-5678
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i> info@komunitasehab.id
                        </li>
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
