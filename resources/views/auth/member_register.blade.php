@extends('publik.app')

@section('content')
    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h2 class="section-title text-center">Formulir Pendaftaran</h2>
                        <p class="text-center mb-4">
                            Isi data diri Anda untuk bergabung dengan Komunitas Rehab
                        </p>

                        <form action="{{ route('member.register.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name" required />
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Nomor WahatsApp</label>
                                    <input type="tel" class="form-control" name="whatsapp" id="phone" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" name="password" id="password" required />
                            </div>

                            {{-- <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" id="confirmPassword" required />
                            </div> --}}

                            <div class="mb-3" id="type">
                                <label for="userType" class="form-label">Saya adalah</label>
                                <select class="form-select" id="userType" name="profesi" required>
                                    <option value="">Pilih kategori</option>
                                    <option value="patient">Pasien</option>
                                    <option value="family">Keluarga Pasien</option>
                                    <option value="caregiver">Pendamping</option>
                                    <option value="professional">Tenaga Kesehatan</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3" id="otherInput" style="display:none;">
                                <label for="profesi_lainnya" class="form-label">Sebutkan Profesi Anda</label>
                                <input type="text" class="form-control" id="profesi_lainnya" name="profesi_lainnya"
                                    placeholder="Masukkan profesi Anda">
                            </div>
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token" />
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Daftar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    {{-- path path js --}}
    <script src="https://www.google.com/recaptcha/api.js?render=6LdYxo0rAAAAABFf45sqd6cD1p9E9S6BpUG2ItM5"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdYxo0rAAAAABFf45sqd6cD1p9E9S6BpUG2ItM5', {
                action: 'login'
            }).then(function(token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#userType').on('change', function() {
                if ($(this).val() === 'other') {
                    $('#otherInput').show();
                    $('#type').hide();
                    $('#profesi_lainnya').attr('required', true);
                } else {
                    $('#otherInput').hide();
                    $('#profesi_lainnya').removeAttr('required');
                }
            });
        });
    </script>
@endpush
