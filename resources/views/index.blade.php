<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pegadaian</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="shortcut icon" href="/assets/image/logopg.png" type="image/x-icon" class="lg">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Scaffold
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <img src="{{asset('assets/image/logo-pegadaian.png')}}" alt="">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="https://www.instagram.com/pegadaian_id/" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>Pegadaian Mengatasi Masalah Tanpa Masalah</h1>
            <h2>lebih mudah gadai dengan pegadaian</h2>
            @if (Auth::check())
            @if (Auth::user()->role === 'admin')
            <a href="{{route('data.admin')}}" class="btn-get-started scrollto">Lihat Data</a>
            @elseif (Auth::user()->role == 'petugas')
            <a href="{{route('data.petugas')}}" class="btn-get-started scrollto">Lihat Data</a>
            @endif
            @else
            <a href="{{route('login')}}" class="btn-get-started scrollto">Ayo Masuk!</a>
            @endif
            
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="{{asset('assets/image/pgd1.jpeg')}}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in">
            <img src="{{asset('assets/image/pgd2.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3>Tentang Pegadaian</h3>
              <p class="fst-italic">
              pegadaian adalah badan usaha milik negara (BUMN) yang meminjamkan uang dengan menerima barang sebagai jaminan dari peminjamnya
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Produk Utama : Kredit Cepat Aman, Krasida, Kreasi, Gadai Efek.</li>
                <li><i class="bi bi-check-circle"></i> Investasi Emas : Mulia, Tabungan Emas, Konsinyasi Emas.</li>
                <li><i class="bi bi-check-circle"></i> Produk Syariah : Rahn, Amanah, Arrum, Arrum Haji</li>
              </ul>
              <p>
                Biasanya, barang tersebut berupa perhiasan (emas) atau barang-barang rumah tangga (barang elektronik, sertifikat rumah, dan lainnya).</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
        </div>

        {{-- <section class="form-container">
          <div class="card form-card">
              <h2 style="text-align: center; margin-bottom: 20px;">Buat Pengaduan</h2> --}}

              {{-- menampilkan falidasi --}}
              {{-- @if ($errors->any())
                   <ul style="width: 100%; background: red; padding: 10px;">
                      @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li> 
                      @endforeach     
                   </ul>
              @endif --}}

              {{-- menampilkan notif berhasil tambah data --}}
              {{-- @if (Session::get('success'))
                   <div style="width: 100%; background: green; padding:10px">
                  {{ Session::get('success') }}
                  </div>
              @endif
              
              <form action="" method="POST" enctype="multipart/form-data">
              @csrf --}}

              {{-- <div class="containere">
                <div class=" text-center mt-5 ">
                  <div class="row" style="width: 1470px;">
                   <div class="card mt- mx-auto p-4 bg-light">
                      <div class="card-body bg-light">
                        <div class = "container">
                         <div class="controls">
                     <strong><h5>SILAHKAN ISI FORM TERSBUT</h5></strong>
                     <h6>UNTUK MELAKUKAN PENGADIAN</h6>
                     <br><br><br><br>
                        </div>
                      </div>
                    </div>
                   </div>
                 </div>
              </div> --}}
                    
                     @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li style="font-weight: bold">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        @if (Session::get('Succes'))
        <div class="alert alert-success" role="alert" style="text-align:center;">
        {{ Session::get('Succes') }}
        </div>
        @endif
        
        <form action="{{route('store.data')}}" method="POST" enctype="multipart/form-data">
                @csrf
              
              <div class="row">
                <div class="col-md-5">
                    <div class ="form-group mb-3" >
                        <label class for="form_name"><strong> NAME</strong></label>
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Masukan NAME*" required="required" data-error="Firstname is required.">
                     </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="form_email"><strong>EMAIL</strong></label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your Email*" required="required" data-error="Valid email is required.">
                        </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-11">
                        <div class ="form-group mb-3" >
                            <label class for="form_name"><strong>AGE</strong></label>
                            <input id="form_name" type="number" name="age" class="form-control" placeholder="Masukan Nama Age*" required="required" data-error="Firstname is required.">
                         </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-11">
                        <div class="form-group mb-3">
                            <label for="form_email"><strong>PHONE</strong></label>
                            <input id="form_email" type="number" name="phone_number" class="form-control" placeholder="Please enter your Number*" required="required" data-error="Valid email is required.">
                        </div>
                    </div>
                 </div>

                  <div class="col-md-11">
                        <div class="form-group mb-3">
                            <label for="form_email"><strong>NIK</strong></label>
                            <input id="form_email" type="number" name="nik" class="form-control" placeholder="Please enter your NIK*" required="required" data-error="Valid email is required.">
                        </div>
                  </div>

                  <div class="col-md-11">
                    <div class="form-group mb-3">
                      <label for="form_email"><strong>ITEM</strong><label>
                        <select id="form_email" name="item" class="form-control" required="required" data-error="Please specify your need.">
                            <option value="" selected disabled>--Select Your Item--</option>
                            <option >Barang</option>
                            <option >Sertifikat</option>
                            <option >Kendaraan</option>
                        </select>
                      </div>
                  </div><br>

                  <div class="input-card">
                    <label for=""><strong>ITEM PHOTO</strong></label>
                    <input type="file" name="item_photo">
                  </div><br>

                  <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" style="padding: 10px; margin: 10px;"value="Send Message" >
                  </div>
              </form>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Kantor Pusat: Jl. Kramat Raya 162 Jakarta Pusat 10430 INDONESIA</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>@pegadaian.co.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>0213155550 / 02180635162</p>
              </div>

              <iframe src="//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.044116917679!2d106.83446451406625!3d-6.641443995197583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c9954f5878b1%3A0x94767279e34ab864!2sPT.%20Pegadaian%20Tajur!5e0!3m2!1sen!2sid!4v1679035980687!5m2!1sen!2sid" frameborder="0" style="border:0; width: 250%; height: 300px;" allowfullscreen></iframe>
            </div>

          </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Pegadaian</h3>
              <p>
                Kantor Pusat: Jl. Kramat Raya 162 Jakarta Pusat<br>
                10430 INDONESIA <br><br>
                <strong>Phone:</strong> 0213155550 / 02180635162<br>
                <strong>Email:</strong> @pegadaian.co.id<br>
              </p>
              
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>nevaor</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/ -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>