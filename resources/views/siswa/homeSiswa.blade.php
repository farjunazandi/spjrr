@include('siswa/partial/headerSiswa')
@include('siswa/partial/sidebarSiswa')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Selamat Datang!</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin transparent">
        <div class="row">
          <div class="col-md-12 mb-4 stretch-card transparent">
            <div class="card">
              <div class="card-header">
                <h3>Data Siswa</h3>
              </div>
              <div class="card-body">
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
              <div class="card-footer">
                <h5>Sistem pendukung keputusan dalam pemilihan jurusan di perguruan tinggi berbasis tes RMIB dan nilai rapor dirancang untuk memberikan gambaran jurusan kuliah kepada kelas XI sebagai modal awal untuk merencanakan karir ke depan, dengan harapan agar di kelas XII nanti dapat lebih fokus dan matang pada goal yang dituju. Semangat!!</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  @include('siswa/partial/footerSiswa')
