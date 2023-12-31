<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPJRR | 2023</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('softland/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ url('softland/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('softland/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('softland/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('softland/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('softland/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('softland/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('softland/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SoftLand
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">SPJRR</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{ url('/auth') }}">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 iphone-wrap">
          <img src="{{ url('assets/assets/img/sman3.jpg') }}" alt="Image" class="phone-1">
          <!-- <img src="assets/img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200"> -->
        </div>
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
              <h2 data-aos="fade-right">Sistem Pendukung Keputusan Dalam Pemilihan Jurusan Di Perguruan Tinggi Berbasis Tes Minat RMIB Dan Nilai Rapor</h2>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100">
                Sistem yang diberi nama SPJRR (Sistem Pendukung Keputusan Pemilihan Jurusan Berbasis Tes Rmib dan Rapor) ini merupakan suatu proyek dari kegiatan bimbingan dan konseling yang dirancang untuk membantu siswa SMA yakni kelas XI dalam memilih jurusan kuliah sesuai dengan minat dan kemampuan akademiknya sebagai modal awal untuk merencanakan karier ke depan agar di kelas XII nanti dapat lebih fokus dan matang pada goal yang dituju. Adapun metode yang digunakan dalam sistem ini adalah metode Multi Attribute Utility Theory (MAUT) atau yang sering disebut sebagai metode penjumlahan terbobot
              </p>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="{{ url('/auth') }}" class="btn btn-outline-white">Masuk</a></p>
            </div>
            
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('softland/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('softland/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('softland/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('softland/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('softland/assets/js/main.js') }}"></script>

</body>

</html>