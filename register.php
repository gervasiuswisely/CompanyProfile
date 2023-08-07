<?php
require_once 'config.php';
require_once 'function.php';
$query=$pdo->query("select * from about");
$query->execute();
$data=$query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MYKI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <link href="assets/img/logomyki.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <link href="assets/css/coba.css" rel="stylesheet">

 
</head>

<body>

  <!-- ======= Header ======= -->
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
          <li><a href="indexresponsive.php"><span> <?php echo $lang ['home']?></span></a>
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
          <li> <a href="services.php"><span><?php echo $lang ['service']?></span> </a></li>
          <li><a href="careerori2.php"><?php echo $lang ['career']?></a></li>
          <li class="dropdown"  class="active"><a href="#"><span><?php echo $lang ['eproc']?></span> </i></a>
              <ul>
                <li><a href="loginvendor.php">Vendor / Subcon </a></li>
                <li><a href="logincustomer.php">Customer </a></li>
              </ul>
          </li>
          <li><a href="contactus.php"><?php echo $lang['kontak']?></a></li>
          <li><a href="login.php">LOGIN</a></li>
          <li><a href="register.php?lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="register.php?lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
      </nav><!-- .navbar -->

    </div>
</header>
  <section class="headercustomer2">
  <div class="container-fluid reqcustomer">
    <div class="container-lg  container-md-fluid containercustomer">
      <h1><?php echo $lang ['formregistercareer']?></h1>
      <form action="" method="post">
        <div class="row">
          <div class="col-6">
            <label for="nama"><?php echo $lang ['nama']?></label>
            <br>
            <input type="text" name="nama">
            <br>
            <label for="notelp"><?php echo $lang ['notelp']?></label>
            <br>
            <input type="text" name="no_telp">
            <br>
            <label for="email"><?php echo $lang ['email']?></label>
            <br>
            <input type="email" name="emailmyki">
            <br>
            <label for="password"><?php echo $lang ['password-register']?></label>
            <br>
            <input type="password" name="password">
    
          </div>
          <div class="col-6">
          <label for="alamat"><?php echo $lang ['alamat']?></label>
            <br>
            <input type="text" name="alamat">
            <br>
            <label for="kota"><?php echo $lang ['kota']?></label>
            <br>
            <input type="text" name="kota">
            <br>
            <label for="propinsi"><?php echo $lang ['propinsi']?></label>
            <br>
            <input type="text" name="propinsi">
            <br>
            <label for="kodepos"><?php echo $lang ['kodepos']?></label>
            <br>
            <input type="text" name="kodepos">
            <br>
          
            <br>
            <br>
            <button class="project" type="submit" name="registercareer"><?php echo $lang ['register']?></button>
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
        </footer>
  </body> -->

  <footer class="footer-respon fixed-bottom">
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

        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>
</body>
</html>