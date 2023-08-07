<?php
require_once 'connectpostgre.php';
require 'config.php';
$query=$pdo->query("select * from about");
$query->execute();
$data=$query->fetchAll();

if($_SESSION['logincareer']){
  $namauser=$_SESSION['namauser'];
  $href='homecareer.php';
}
else if($_SESSION['loginvendor']){
  $namauser=$_SESSION['namavendor'];
$href='homevendor.php';
}


else if($_SESSION['logincustomer']){
  $namauser=$_SESSION['namacustomer'];
  $href='homevendor.php';
}
else{
  $namauser='Login';
  $href='login.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MYKI - Services</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/coba.css" rel="stylesheet">


</head>

<body> 

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="assets/img/logomyki.png" style="width:Auto" alt=""> 
        <h1> <?php echo $lang['judul']?></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" ><span> <?php echo $lang ['home']?></span></a>
            <!-- <ul>
              <li><a href="index.html#home-welcome">About</a></li>
              <li><a href="index.html#constructions">Our Service</a></li>
              <li><a href="index.html#projects">Current Project</a></li>
             
            </ul> -->
          </li>
            <li class="dropdown"><a href="#"><span> <?php echo $lang ['about']?></span> </i></a>
              <ul>
                <li><a href="aboutresponsive.php#aboutus"><?php echo $lang ['#about']?></a></li>
                <li><a href="aboutresponsive.php#legalitasrespon"><?php echo $lang ['#legalitas']?></a></li>
                <li><a href="aboutresponsive.php#targetfokusrespon"><?php echo $lang ['#targetfokus']?></a></li>
<!--                 -->
              </ul>
            </li>
          <li><a href="project.php"><?php echo $lang ['project']?></a></li>
          <li> <a href="services.php"class="active"><span><?php echo $lang ['service']?></span> </a></li>
          <li><a href="careerori2.php"><?php echo $lang ['career']?></a></li>
          <li class="dropdown"><a href="#"><span><?php echo $lang ['eproc']?></span> </i></a>
              <ul>
                <li><a href="loginvendor.php">Vendor / Subcon </a></li>
                <li><a href="logincustomer.php">Customer </a></li>
              </ul>
          </li>
          <li><a href="contactus.php"><?php echo $lang['kontak']?></a></li>
          <li><a href="<?php echo $href?>"><?php echo $namauser?></a></li>
          <li><a href="prefab.php?lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="prefab.php?lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
      </nav><!-- .navbar -->

    </div>
</header>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <!-- <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/foto-projek-dan-produk-myki/putih.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2> contoh Services</h2>
      </div>
    </div>End Breadcrumbs -->

    <!-- ======= Services Section ======= -->

          <section id="prefab" class="prefab2">
          <div class="container-fluid">
        <div class="container-lg container-fluid-md services1">
          <div class="row">
          <h1><?php echo $lang ['prefab']?></h1>
              <p><?php echo $lang ['prefabp']?> </p>
          <div class="img">
          <img src="assets/img/our-services/prefab-houseresize.jpg" alt="">
          </div>
          <ul>
            <h1>Penasaran sama service kami yang lain?</h1>
            <li><a href="roofingandwalling.php"><?php echo $lang ['roof']?> </a></li>
            <li><a href="smartuss.php"><?php echo $lang ['smartuss']?></a></li>
            <li><a href="preengineered.php"><?php echo $lang ['preenginereed']?></a></li>
            <li><a href="prefab.php"><?php echo $lang ['prefab']?></a></li>
            <li><a href="pavment.php"><?php echo $lang ['pavment']?></a></li>
            <li><a href="services.php"><?php echo $lang ['service']?></a></li>
          </ul>
        </div>
        </div>
  
      </div>
        </section>
   
<!-- End Services Section -->

    

  </main><!-- End #main -->

  <!-- <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>PT Marga Yasa Konstruksi Indonesia</h3>
              <p>
                Jl. Raden Patah No. 10, Mojosari, Mojokerto, Indonesia<br><br>
                <strong>Phone:</strong> (031)99841021<br>
                <strong>Email:</strong> info@gayakonin.com<br>
              </p> -->
              <!-- <div class="social-links d-flex mt-3"> -->
                <!-- <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a> -->
              <!-- </div>
            </div> -->
          <!-- </div>End footer info column -->

    <!-- </div> -->

    <!-- <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>PT Marga Yasa Konstruksi Indonesia</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        </div>
      </div>
    </div>

  </footer> -->
  <!-- End Footer -->
  <!-- <footer class="servicef">
    <div class="container">
      <div class="row info">
        <div class="col-12">
        <h3>PT MARGA YASA KONSTRUKSI INDONESIA</h3>
        </div>
        <div class="col">
        Jl. Raden Patah No. 10, Mojosari <br>
        </div>
        <div class="col-12">
          Mojokerto, Indonesia 
          </div>
      </div>
      </div>  
      <div class="container social-con">
      <div class="row social">
      <div class="col-12">
        <a href="https://www.instagram.com/gayakonin/"><i class="bi bi-instagram ig"></i>gayakonin</a>
    
      </div>
      <div class="col">
        <i class="bi bi-telephone tel">(031)99841021</i>
     
      </div>
      <div class="col-12">
        <a href=""><i class="bi bi-envelope mail"></i>info@gayakonin.com</a>
      </div>
      </div>
      </div>
        <div class="container footer"> -->
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.388667834665!2d112.74758131469207!3d-7.310158994724117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb08c82f1957%3A0x319db3a30b32d110!2sCV.%20Mycon%20Indonesia!5e0!3m2!1sid!2sid!4v1664835010344!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" align:right></iframe> -->
        <!-- &copy; Copyright <strong><span>PT Marga Yasa Konstruksi Indonesia</span></strong>. All Rights Reserved
        </div>
        </footer> -->
        <footer class="footer-respon" style="position:fixed">
            <div class="container-md container-lg-fluid footerbaru">
                <div class="atas">
                <p>PT MARGA YASA KONSTRUKSI INDONESIA</p>
                <p class="alamat1b">JL.RADEN PATAH NO. 10, MOJOSARI</p>
                <p class="alamat2b">MOJOKERTO, INDONESIA</p>
                </div>
                <div class="tengah align-self-end">
                &copy; Copyright <strong><span>PT Marga Yasa Konstruksi Indonesia</span></strong>. All Rights Reserved
                </div>
                <div class="bawah">
                    <p><?php echo $lang['contact_us']?></p>
                    <img class="img-ig" src="assets/img/footer/instagram-removebg-preview (6).png"><a class="link-ig" href="https://www.instagram.com/gayakonin/">gayakonin</a>
                    <img class="img-hp" src="assets/img/footer/call-removebg-preview (1).png" alt=""><a class="link-phone">(031)99841021</a>
                    <img class="img-mail" src="assets/img/footer/Asset 1.png" alt=""><a class="link-email">info@gayakonin.com</a>
                </div>
            </div>
        </footer>
        <!-- <footer>
          <div class="container">
            <div class="row-info">
              <div class="col-12">
              <B><P>PT MARGA YASA KONSTRUKSI INDONESIA</P></B>
              
              <div class="col">
                JL.RADEN PATAH NO. 10, MOJOSARI
              </div>
              </div>
              <div class="col-12">
                MOJOKERTO, INDONESIA
                </div>
            </div>
            </div>  
            <div class="container-social-con">
            <div class="row social">
            <div class="col-12">
              <h3>Contact Us :</h3>
              <img class="insta" src="assets/img/footer/instagram-removebg-preview (6).png"><a class="ig" href="https://www.instagram.com/gayakonin/">gayakonin</a>
              <img class="hp" src="assets/img/footer/call-removebg-preview (1).png" alt=""><a class="phone"href="">(031)99841021</a>
              <img class="mail" src="assets/img/footer/Asset 1.png" alt=""><a class="email"href="">info@gayakonin.com</a>
   
            </div>
          </div>
          </div>
            <div class="footero">
              &copy; Copyright <strong><span>PT Marga Yasa Konstruksi Indonesia</span></strong>. All Rights Reserved
            </div>
        </footer> -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>