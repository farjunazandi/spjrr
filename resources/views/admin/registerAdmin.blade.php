<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="skydash/vendors/feather/feather.css">
  <link rel="stylesheet" href="skydash/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="skydash/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="skydash/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="skydash/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="skydash/images/logo.svg" alt="logo">
              </div>
              <h2>Daftar</h2>
              @if(session()->has('loginerror'))
                <div class="autohide alert alert-danger alert-dismissible fade show text-center" role="alert">
                  {{ session('loginerror'); }}
                </div>
              @endif
                @if(session()->has('registersuccess'))
                <div class="autohide alert alert-success alert-dismissible fade show text-center" role="success">
                    {{ session('registersuccess'); }}
                </div>
              @endif
              <h6 class="font-weight-light">Hai, Selamat Datang!</h6>
              <form class="pt-3" action="/createAdmin" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" placeholder="Nama" required>
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Passwoard" required>
                </div>
                <div class="mt-3">
                    <div class="form-group">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
                    </div>
                </div>
               </form>
                <div class="text-center mt-4 font-weight-light">
                  Sudah mempunyai akun? <a href="{{ url('admin') }}" class="text-primary">Masuk</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="skydash/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="skydash/js/off-canvas.js"></script>
  <script src="skydash/js/hoverable-collapse.js"></script>
  <script src="skydash/js/template.js"></script>
  <script src="skydash/js/settings.js"></script>
  <script src="skydash/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
