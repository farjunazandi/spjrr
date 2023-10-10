@include('siswa/partial/headerSiswa')
@include('siswa/partial/sidebarSiswa')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Hasil Tes RMIB</h3>
          </div>
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success'); }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <table style="font-size: 25px">
                <tbody>
                  <tr>
                    <td>NISN</td>
                    <td style="width: 30%; text-align :center;">:</td>
                    <td>{{ $siswa->nisn }}</td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td style="width: 30%; text-align :center;">:</td>
                    <td>{{ $siswa->nama }}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td style="width: 30%; text-align :center;">:</td>
                    <td>{{ $siswa->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                  </tr>
                  <tr>
                    <td>Kelas</td>
                    <td style="width: 30%; text-align :center;">:</td>
                    <td>{{ $siswa->kls->nama_kelas }}</td>
                  </tr>
                </tbody>
            </table>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="myTable" class="display expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 30px">No.</th>
                        <th style="text-align:center">Kategori RMIB</th>
                        <th style="text-align:center">Deskripsi</th>
                        <th style="text-align:center">Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilRmib as $hRmib)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $hRmib->ktg->kategori }}</td>
                                <td>{{ $hRmib->ktg->deskripsi }}</td>
                                <td style="text-align: center">{{ $hRmib->total_bobot }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p>Anda belum menginput nilai rapor, sehingga proses rekomendasi belum dapat diproses. Anda dapat masuk melalui menu nilai rapor atau klik <a href="{{ url('/siswa/raporSiswa') }}">Input Nilai Rapor</a></p>
            </div>
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->

  @include('siswa/partial/footerSiswa')
