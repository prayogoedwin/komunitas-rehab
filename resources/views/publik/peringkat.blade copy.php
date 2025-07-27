@extends('publik.template.publik')

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@section('content')
  {{-- di isi konten --}}
    
    <!-- FAQ Header -->
    <section class="faq-header">
      <div class="container">
        <h1>Papan Peringkat</h1>
        <p class="lead">
          Papan Peringkat Perolehan poin Bulanan / Mingguan
        </p>
      </div>
    </section>

    


     <!-- Katalog -->
    <section class="py-4 catalog">

     
      <div class="container">


        <div class="card card-default card-body">
                        <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="" data-target="#tab1" data-toggle="tab">Bulanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" data-target="#tab2" data-toggle="tab">Mingguan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" data-target="#tab3" data-toggle="tab">Harian</a>
                            </li>
                        </ul>
                        <!--/tabs-->
                        <br>
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
                                  <tr>
                                      <td class="text-center">1</td>
                                      <td><img src="https://www.gravatar.com/avatar/1?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Ahmad Santoso</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9850</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">2</td>
                                      <td><img src="https://www.gravatar.com/avatar/2?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Budi Raharjo</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9840</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">3</td>
                                      <td><img src="https://www.gravatar.com/avatar/3?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Citra Dewi</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9839</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">4</td>
                                      <td><img src="https://www.gravatar.com/avatar/4?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Dian Permata</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9833</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">5</td>
                                      <td><img src="https://www.gravatar.com/avatar/5?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Eko Prasetyo</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">6</td>
                                      <td><img src="https://www.gravatar.com/avatar/6?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Fitriani Sari</td>
                                    <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">7</td>
                                      <td><img src="https://www.gravatar.com/avatar/7?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Guntur Wibowo</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">8</td>
                                      <td><img src="https://www.gravatar.com/avatar/8?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Hana Putri</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">9</td>
                                      <td><img src="https://www.gravatar.com/avatar/9?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Irfan Maulana</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">10</td>
                                      <td><img src="https://www.gravatar.com/avatar/10?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Joko Susanto</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">11</td>
                                      <td><img src="https://www.gravatar.com/avatar/11?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Kurniawan Adi</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">12</td>
                                      <td><img src="https://www.gravatar.com/avatar/12?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Larasati</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">13</td>
                                      <td><img src="https://www.gravatar.com/avatar/13?d=identicon&s=40" class="rounded-circle me-2" alt="Avatar"> Mulyadi</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">14</td>
                                      <td><img src="https://i.pravatar.cc/40?img=14" class="rounded-circle me-2" alt="Avatar"> Nia Kurnia</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">15</td>
                                      <td><img src="https://i.pravatar.cc/40?img=15" class="rounded-circle me-2" alt="Avatar"> Oki Pratama</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">16</td>
                                      <td><img src="https://i.pravatar.cc/40?img=16" class="rounded-circle me-2" alt="Avatar"> Putri Ayu</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">17</td>
                                      <td><img src="https://i.pravatar.cc/40?img=17" class="rounded-circle me-2" alt="Avatar"> Rudi Hartono</td>
                                     <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">18</td>
                                      <td><img src="https://i.pravatar.cc/40?img=18" class="rounded-circle me-2" alt="Avatar"> Sinta Mariana</td>
                                     <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">19</td>
                                      <td><img src="https://i.pravatar.cc/40?img=19" class="rounded-circle me-2" alt="Avatar"> Teguh Santoso</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                  <tr>
                                      <td class="text-center">20</td>
                                      <td><img src="https://i.pravatar.cc/40?img=20" class="rounded-circle me-2" alt="Avatar"> Umi Kulsum</td>
                                      <td class="text-center"><i class="fas fa-star" style="color:gold" >&nbsp;&nbsp;</i>9830</td>
                                  </tr>
                                </tbody>
                                </table>
                              </div>

                            </div>
                            <div class="tab-pane " id="tab2">

                               {{-- //table --}}
                               ss
                               
                            </div>
                            <div class="tab-pane" id="tab3">
                                
                               {{-- //table --}}
                               dd
                                
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