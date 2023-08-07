<?php
error_reporting(0);
session_start();
if(isset($_SESSION['logincustomer'])){
  header("location:customer2.php");
}
require_once 'config.php';
require_once 'function.php'

 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Login | MYKI </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/logomyki.png" rel="icon">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/sweetalert2.min.css" rel="stylesheet">
  <link href="assets/css/coba.css" rel="stylesheet">
  <script src="assets/dist/sweetalert2.all.min.js"></script>
</head>


<body>
<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="indexresponsive.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="assets/img/logomyki.png" style="width:Auto" alt=""> 
        <h1> <?php echo $lang['judul']?></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="indexresponsive.php" class="active"><span> <?php echo $lang ['home']?></span></a>
            <!-- <ul>
              <li><a href="index.html#home-welcome">About</a></li>
              <li><a href="index.html#constructions">Our Service</a></li>
              <li><a href="index.html#projects">Current Project</a></li>
             
            </ul> -->
          </li>
            <li class="dropdown"><a href="aboutresponsive.php"><span> <?php echo $lang ['about']?></span> </i></a>
              <ul>
                <li><a href="aboutresponsive.php#aboutus"><?php echo $lang ['#about']?></a></li>
                <li><a href="aboutresponsive.php#legalitasrespon"><?php echo $lang ['#legalitas']?></a></li>
                <li><a href="aboutresponsive.php#targetfokusrespon"><?php echo $lang ['#targetfokus']?></a></li>
<!--                 -->
              </ul>
            </li>
          <li><a href="project.php"><?php echo $lang ['project']?></a></li>
          <li> <a href="services.php"><span><?php echo $lang ['service']?></span> </a></li>
          <li><a href="careerori2.php"><?php echo $lang ['career']?></a></li>
          <li class="dropdown"><a href="#"><span><?php echo $lang ['eproc']?></span> </i></a>
              <ul>
                <li><a href="loginvendor.php">Vendor / Subcon </a></li>
                <li><a href="logincustomer.php">Customer </a></li>
              </ul>
          </li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="indexresponsive.php?lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="indexresponsive.php?lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
      </nav><!-- .navbar -->

    </div>
</header>

<section class="vh-100" style="background-color:#eaeaea;">
  <div class="container-fluid logincustomer2">
  <div class="container py-5 h-100">
    <div class="row login2row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card  shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 ">
            <form action="">
          <div class="d-flex justify-content-center align-items-center">
            <img src="assets/img/logomyki.png" style="width:10%"alt="">
            <h1>Vendor login Page</h1></center>
          </div>
            <div class="row formlogin2">
             <div class="form-outline mb-4">
                <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="emailvendor" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div  class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="passwordvendor" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3" name="remembermevendor"> Remember password </label>
              
            </div>
            <p class="donthaveaccount">Dont have An Account? <a href="register2.php">Register Here</a></p>
            </div>
            <center><button name="loginvendor">Login</button></center>


                        </div>
                    </div>
                </div>
            </div>
    </div>
            
</div>
  </form>
  
           
  
</section>
<!-- <footer class="ori">
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
        <footer class="footer-respon">
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
                    <p>Contact Us:</p>
                    <img class="img-ig" src="assets/img/footer/instagram-removebg-preview (6).png"><a class="link-ig" href="https://www.instagram.com/gayakonin/">gayakonin</a>
                    <img class="img-hp" src="assets/img/footer/call-removebg-preview (1).png" alt=""><a class="link-phone"href="">(031)99841021</a>
                    <img class="img-mail" src="assets/img/footer/Asset 1.png" alt=""><a class="link-email"href="">info@gayakonin.com</a>
                </div>
            </div>
        </footer>
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
</body>