@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Selamat Datang!</h3>
            <h6 class="font-weight-normal mb-0">All systems are running smoothly!
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin transparent">
        <div class="row">
          <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Data Siswa</p>
                <p class="fs-30 mb-4">10</p>
                <p>Lihat Detail</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Data Kriteria</p>
                <p class="fs-30 mb-4">13</p>
                <p>Lihat Detail</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Data Alteratif</p>
                <p class="fs-30 mb-4">12</p>
                <p>Lihat Detail</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Rekapan Hasil Siswa</p>
                <p class="fs-30 mb-4">12</p>
                <p>Lihat Detail</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  @include('admin/partial/footerAdmin')
