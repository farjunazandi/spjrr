
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin Dashboard</title>
  <!-- endinject -->
  <link rel="stylesheet" href="{{ url('skydash/vendors/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{ url('skydash/vendors/codemirror/ambiance.css') }}">
  <link rel="stylesheet" href="{{ url('skydash/vendors/pwstabs/jquery.pwstabs.min.css') }}">
  <!-- End plugin css for this page -->

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('skydash/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ url('skydash/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('skydash/vendors/css/vendor.bundle.base.css') }}">

  <link rel="stylesheet" href="{{ url('skydash/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ url('skydash/images/favicon.png') }}" />

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="skydash/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="skydash/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- endinject -->
</head>

<body>
    <div class=" container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="main-panel w-100  documentation">
            <div class="content-wrapper">
              <div class="container-fluid">
                <div class="row pt-5 mt-5">
                    <div class="col-12 pt-5 text-center">
                        <!-- Nav pills -->
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'A' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeA">Tipe Soal A</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'B' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeB">Tipe Soal B</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'C' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeC">Tipe Soal C</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'D' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeD">Tipe Soal D</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'E' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeE">Tipe Soal E</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'F' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeF">Tipe Soal F</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'G' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeG">Tipe Soal G</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'H' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeH">Tipe Soal H</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ (session('tipe')) == 'I' ? 'active' : 'disabled' }}" data-toggle="pill" href="#tipeI">Tipe Soal I</a>
                            </li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container {{ (session('tipe')) == 'A' ? 'active' : '' }}" id="tipeA">
                                <div class="card">
                                    <div class="card-body">
                                      <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-10">
                                                <label for="pekerjaan">Nama Pekerjaan</label>
                                              </div>
                                              <div class="col-sm-2">
                                                <label for="prioritas">Urutan Prioritas</label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @foreach ($soalA as $tipeA)
                                            <div class="row">
                                              <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                              <input type="hidden" name="id_soal[]" value="{{ $tipeA->id }}">
                                              <input type="hidden" name="id_kategori[]" value="{{ $tipeA->id_kategori }}">
                                              <input type="hidden" name="tipe_soal[]" value="{{ $tipeA->tipe_soal }}">
                                              <input type="hidden" name="next_tipe" value="B">
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeA->nama_pekerjaan }}" readonly>
                                              </div>
                                              <div class="col-sm-2">
                                                <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                              </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'B' ? 'active' : '' }}" id="tipeB">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalB as $tipeB)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeB->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeB->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeB->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="C">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeB->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'C' ? 'active' : '' }}" id="tipeC">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalC as $tipeC)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeC->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeC->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeC->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="D">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeC->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'D' ? 'active' : '' }}" id="tipeD">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalD as $tipeD)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeD->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeD->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeD->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="E">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeD->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'E' ? 'active' : '' }}" id="tipeE">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalE as $tipeE)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeE->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeE->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeE->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="F">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeE->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'F' ? 'active' : '' }}" id="tipeF">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalF as $tipeF)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeF->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeF->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeF->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="G">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeF->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'G' ? 'active' : '' }}" id="tipeG">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalG as $tipeG)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeG->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeG->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeG->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="H">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeG->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'H' ? 'active' : '' }}" id="tipeH">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalH as $tipeH)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeH->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeH->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeH->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="I">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeH->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane container {{ (session('tipe')) == 'I' ? 'active' : '' }}" id="tipeI">
                              <div class="card">
                                <div class="card-body">
                                  <form class="forms-sample" action="{{ url('/siswa/tesRmibSiswa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-10">
                                            <label for="pekerjaan">Nama Pekerjaan</label>
                                          </div>
                                          <div class="col-sm-2">
                                            <label for="prioritas">Urutan Prioritas</label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($soalI as $tipeI)
                                        <div class="row">
                                          <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                          <input type="hidden" name="id_soal[]" value="{{ $tipeI->id }}">
                                          <input type="hidden" name="id_kategori[]" value="{{ $tipeI->id_kategori }}">
                                          <input type="hidden" name="tipe_soal[]" value="{{ $tipeI->tipe_soal }}">
                                          <input type="hidden" name="next_tipe" value="end">
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan[]" value="{{ $tipeI->nama_pekerjaan }}" readonly>
                                          </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Selanjutnya</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
            <!-- partial -->
          </div>
        </div>
      </div>
<!-- plugins:js -->
<script src="{{ url('skydash/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ url('skydash/js/off-canvas.js') }}"></script>
<script src="{{ url('skydash/js/hoverable-collapse.js') }}"></script>
<script src="{{ url('skydash/js/template.js') }}"></script>
<script src="{{ url('skydash/js/settings.js') }}"></script>
<script src="{{ url('skydash/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ url('skydash/js/codeEditor.js') }}"></script>
<script src="{{ url('skydash/js/tabs.js') }}"></script>
<script src="{{ url('skydash/js/tooltips.js') }}"></script>
<script src="{{ url('skydash/js/documentation.js') }}"></script>
<!-- End custom js for this page-->
</body>

</html>