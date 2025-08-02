@extends('publik.template.publik')

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@section('content')
  {{-- di isi konten --}}
    
    <!-- FAQ Header -->
    <section class="faq-header">
      <div class="container">
        <h1>Riwayat Prediksi</h1>
        <p class="lead">
          Informasi Daftar Riwayat Prediksi Anda
        </p>
      </div>
    </section>

    


     <!-- Katalog -->
    <section class="py-4 catalog">

     
      <div class="container">


        <div class="card card-default card-body">
                         {{-- <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="" data-target="#tab1" data-toggle="tab">Riwayat Prediksi</a>
                            </li>
                            
                        </ul>  --}}
                        <!--/tabs-->
                     
                        <div id="tabsJustifiedContent" class="tab-content">

                            <div class="tab-pane active" id="tab1">
                              
                              <div class="table-container">
                                <table id="userTable" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Peringkat</th>
                                        <th>Nama Pengguna</th>
                                        <th class="text-center">Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($tontons as $ton)
                                  <tr>
                                      <td class="text-center">{{ $loop->iteration }}</td>
                                      <td><img src="https://www.gravatar.com/avatar/1?d=identicon&s={{ $ton->id }} " class="rounded-circle me-2" alt="Avatar"> {{ $ton->judul }} </td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>{{ $ton->status }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                </table>
                              </div>

                            </div>
                            
                        </div>
                        <!--/tabs content-->
                    </div><!--/card-->

        
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
   <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

     <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                pageLength: 10,
                searching: false, // Menyembunyikan fitur pencarian
                language: {
                    lengthMenu: "",
                    info: "",
                    search: "Cari:",
                    zeroRecords: "Data tidak ditemukan",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endpush