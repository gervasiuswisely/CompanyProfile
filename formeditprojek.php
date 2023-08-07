<?php
require_once 'config.php';
require_once 'function.php';
$project_id=$_GET['project_id'];
$query=$pdo->query("select * from project where project_id ='$project_id' order by project_id");
$query->execute();
$data=$query->fetchAll();

foreach ($data as $value){

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PT MARGA YASA KONSTRUKSI INDONESIA  - About</title>
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

  <!-- =======================================================
  * Template Name: UpConstruction - v1.1.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body >

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="indexadmin.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="assets/img/logomyki.png" style="width:Auto" alt=""> 
        <h1> <?php echo $lang['judul']?></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="indexadmin.php"><span> <?php echo $lang ['home']?></span></a>
            <!-- <ul>
              <li><a href="index.html#home-welcome">About</a></li>
              <li><a href="index.html#constructions">Our Service</a></li>
              <li><a href="index.html#projects">Current Project</a></li>
             
            </ul> -->
          </li>
            <li class="dropdown"><a href="#"><span> <?php echo $lang ['about']?></span> </i></a>
              <ul>
                <li><a href="#"><?php echo $lang ['#about']?></a></li>
                <li><a href="#"><?php echo $lang ['#legalitas']?></a></li>
                <li><a href="#"><?php echo $lang ['#targetfokus']?></a></li>
<!--                 -->
              </ul>
            </li>
          <li><a href="projectadmin.php" class="active"><?php echo $lang ['project']?></a></li>
          <li> <a href="#"><span><?php echo $lang ['service']?></span> </a></li>
          <li><a href="careeradmin.php" ><?php echo $lang ['career']?></a></li>
          <li class="dropdown"><a href="#"><span><?php echo $lang ['eproc']?></span> </i></a>
              <ul>
                <li><a href="vendoradmin.php">Vendor / Subcon </a></li>
                <li><a href="customeradmin.php">Customer </a></li>
              </ul>
          </li>
       
          <li><a href="#"><?php echo $lang['kontak']?></a></li>
          <li><a href="#">LOGIN</li></a> 
          <li><a href="logoutadmin.php">LOGOUT</li></a> 
          <li><a href="indexadmin.php?lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="indexadmin.php?lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
          
      </nav><!-- .navbar -->

    </div>
</header>
<section class="lamaran3">
<form action="editprojek.php?project_id=<?php echo $value['project_id']?>" method="post">
<div class="container-fluid ">
    <div class="container-lg container-md-fluid lamaran3container">
        <div class="row ">
            <div class="col-6">
              <h1>Form Tambah Projek MYKI</h1> 
              <label for="projectid"> Project id</label>
                <br>
                <input class="projectid" name="projectid" type="text" value="<?php echo $value['project_id'] ;?>">
                <br>
                <label for="projectjudul">Judul</label>
                <br>
                <input type="text" class="projectjudul" name="projectjudul"value="<?php echo $value['judul'] ;?>">
                <br>
                <label for="projectclient"> Client </label>
                <br>
                <input type="text" class="projectclient" name="projectclient"value="<?php echo $value['client'] ;?>">
                <br>
                <label for="lokasi"> lokasi</label>
                <br>
                <input type="text" class="lokasi" name="lokasi"value="<?php echo $value['lokasi'] ;?>">
                <br>
                <label for="projecttahun"> Tahun</label>
                <br>
                <input type="text" class="projecttahun" name="projecttahun"value="<?php echo $value['tahun'] ;?>">
                <br>
                <label for="projectimagepath">Image Path</label>
                <br>
                <input type="text" class="projectimagepath" name="projectimagepath" value="<?php echo $value['image_path'] ;?>">
                <br>
            </div>
            
           
        </div>
        <div class="container container3">
        <div class="row">
            <div class="col">
  <button  type="submit" name="udpateprojek"><?php echo $lang ['apply']?></button>
</div>\<div class="">
  
        </div>
      
    </div>
</div>                
</form>

</section>

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
                    <p><?php echo $lang['contact_us']?></p>
                    <img class="img-ig" src="assets/img/footer/instagram-removebg-preview (6).png"><a class="link-ig" href="https://www.instagram.com/gayakonin/">gayakonin</a>
                    <img class="img-hp" src="assets/img/footer/call-removebg-preview (1).png" alt=""><a class="link-phone">(031)99841021</a>
                    <img class="img-mail" src="assets/img/footer/Asset 1.png" alt=""><a class="link-email">info@gayakonin.com</a>
                </div>
            </div>
        </footer>
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