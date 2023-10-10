<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SPJRR | 2023</title>
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><h2>SPJRR</h2></a>
        {{-- <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{ url('skydash/images/logo-mini.svg') }}" alt="logo"/></a> --}}
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="ti-user"></i>  
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="{{ url('/logoutSiswa') }}">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>