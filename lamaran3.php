<?php
require_once 'config.php';
// require_once 'function.php';
session_start();


if($_SESSION['logincareer']){
  $namauser=$_SESSION['namauser'];
  $href='homecareer.php';
}
else{
  echo'
  <script>
  alert("Anda belum login sebagai partner myki");
  window.location.href="login.php";
  </script>
  ';
}

$employee_id=$_GET['employee_id'];
$jobid=$_GET['job_id'];
$job_position=$_GET['job_position'];
$namauser=$_SESSION['namauser'];
$query=$pdo->query("select * from lowongan_kerja order by job_id");
$query->execute();
$data=$query->fetchAll();

$query=$pdo->query("select * from employee order by employee_id");
$query->execute();
$dataemployee=$query->fetchAll();

foreach($dataemployee as $employee){

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
          <li> <a href="services.php"><span><?php echo $lang ['service']?></span> </a></li>
          <li><a href="careerori2.php" class="active"><?php echo $lang ['career']?></a></li>
          <li class="dropdown"><a href="#"><span><?php echo $lang ['eproc']?></span> </i></a>
              <ul>
                <li><a href="loginvendor.php">Vendor / Subcon </a></li>
                <li><a href="logincustomer.php">Customer </a></li>
              </ul>
          </li>
          <li><a href="contactus.php"><?php echo $lang['kontak']?></a></li>
          <li><a href="<?php echo $href?>"><?php echo $namauser?></a></li>
          <li><a href="lamaran3.php?lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="lamaran3.php?lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
      </nav><!-- .navbar -->

    </div>
</header>
<section class="lamaran3">
<form action="proses.php?job_id=<?php echo $jobid?>&nama=<?php echo $namauser;?>&job_position=<?php echo $job_position;?>&employee_id=<?php echo $employee_id?>" method="post" enctype="multipart/form-data">
<div class="container-fluid ">
    <div class="container-lg container-md-fluid lamaran3container">
        <div class="row ">
            <div class="col-6">
              <h1>Form Lamaran MYKI</h1> 
                <label for="inama3"> <?php echo $lang ['nama']?> </label>
                <br>
                <input class="inama3" name="nama3" type="text" value="<?php echo $namauser?>">
                <br>
                <label for="iemail3"> <?php echo $lang ['email']?></label>
                <br>
                <input type="text" class="iemail3" name="email3"value="<?php echo $employee['email']?>">
                <br>
                <label for="inohp3"> <?php echo $lang ['nohp']?></label>
                <br>
                <input type="text" class="inohp3" name="no_hp3">
                <br>
                <label for="inotranskrip3"> <?php echo $lang ['notranskrip']?></label>
                <br>
                <input type="text" class="inotranskrip3" name="no_transkrip3">
                <br>
                <input type="file" class="itranskrip3" name="file0">
                <br>
                <label for="inosertifikat3"> <?php echo $lang ['nosertifikat']?></label>
                <br>
                <input type="text" class="inosertifikat3" name="no_sertifikat3">
                <br>
                <input type="file" class="isertifikat3" name="file1">
                <br>
                <label for="inoijazah3"> <?php echo $lang ['noijazah']?></label>
                <br>
                <input type="text" class="inoijazah3" name="no_ijazah3">
                <br>
                <input type="file" class="iijazah3" name="file2">
            </div>
            <div class="col-6 col2">
                <label for="inocv3"> <?php echo $lang ['nocv']?> </label>
                <br>
                <input class="inocv3" name="no_cv3" type="text">
                <br>
                <input type="file" class="icv3" name="file3">
                <br>
                <label for="inkoktp3"> <?php echo $lang ['noktp']?></label>
                <br>
                <input class="inoktp3" name="no_ktp3" type="text">
                <br>
                <input type="file" class="iktp3" name="file4">
                <br>
                <label for="inokk3"> <?php echo $lang ['nokk']?> </label>
                <br>
                <input class="inokk3" name="no_kk3" type="text">
                <br>
                <input type="file" class="ikk3" name="file5">
                <br>
                <label for="inosurat3"> <?php echo $lang ['nosurat']?> </label>
                <br> 
                <input class="inosurat3" name="no_surat3" type="text">
                <br>
                <input type="file" class="isurat3" name="file6">
                <br>
                <label for="ipasfoto3" class="pasfoto3"> <?php echo $lang ['pasfoto']?> </label>
                <br> 
                <input type="file" class="ipasfoto3" name="file7">
            </div>
           
        </div>
        <div class="container container3">
        <div class="row">
            <div class="col">
            <center> <a href="careerori2.php?>"><button Stype="button" name="back"><?php echo $lang ['back']?></a></button>
  <button  type="submit" name="apply3"><?php echo $lang ['apply']?></button>
</div></center><div class="">
  
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