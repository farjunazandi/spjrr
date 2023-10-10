
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
                <div class="row">
                  <div class="col-12 pt-5">
                    <a class="btn btn-secondary" href="{{ url('/siswa/homeSiswa') }}"><i class="ti-home mr-2"></i>Kembali</a>
                  </div>
                </div>
                <div class="row pt-5 mt-5">
                  <div class="col-12 pt-5 text-center">
                    <i class="text-primary mdi mdi-file-document-box-multiple-outline display-1"></i>
                    <h3 style="margin-left: 10%; margin-right:10%;">
                      Tugas anda mengurutkan daftar pekerjaan yang tersedia ke dalam nomor urut prioritas 1-12 berdasarkan kadar kesukaan / minat anda terhadap pekerjaan tersebut.
                    </h3>
                    <h3 style="margin-left: 10%; margin-right:10%;">
                        Dalam hal ini, nomor 1 menunjukkan pekerjaan yang paling anda sukai, sedangkan nomor urut 12 merupakan pekerjaan yang paling anda tidak sukai.
                    </h3>
                    <div class="col-12 pt-5">
                        <a class="btn btn-primary" href="{{ url('/siswa/formSiswa') }}"><h3>Mulai Tes RMIB</h3></a>
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