<?php
require_once 'connectpostgre.php';
require 'config.php';
if($_SESSION['logincareer']){
  $namauser=$_SESSION['namauser'];
  $href='homecareer.php';
  $back='homecareer.php';
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
  $back='careerori2.php';
}
$job_id=$_GET['job_id'];
$job_position=$_GET['job_position'];
$namauser=$_SESSION['namauser'];
$query=$pdo->query("select * from lowongan_kerja where job_name='$job_position'");
$query->execute();
$data=$query->fetchAll();

$query=$pdo->query("select * from employee where nama='$namauser'");
$query->execute();
$dataemployee=$query->fetchAll();

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
  <!-- ======= Header ======= -->
</head>
<body>
    

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
          <li><a href="index.php" class="active"><span> <?php echo $lang ['home']?></span></a>
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
          <li class="dropdown"><a href="#"><span><?php echo $lang ['eproc']?></span> </i></a>
              <ul>
                <li><a href="loginvendor.php">Vendor / Subcon </a></li>
                <li><a href="logincustomer.php">Customer </a></li>
              </ul>
          </li>
          <li><a href="contactus.php"><?php echo $lang['kontak']?></a></li>
          <li><a href="<?php echo $href?>"><?php echo $namauser?></a></li>
          <li><a href="careerdetails.php?job_id=<?php echo $job_id?>&lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="careerdetails.php?job_id=<?php echo $job_id?>&lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
      </nav><!-- .navbar -->

    </div>
</header>
  <section>
    <?php 
    foreach($dataemployee as $valueemployee)
    {

   
    ?>
    <?php
    }
    ?>
  <?php
      foreach($data as $value){

      }
      ?>
        <div class="container-fluid detaillowongan">
        <div class="container-lg container-md-fluid">
            <div class="row">
                <div class="col">
                <h2><?php echo $value['job_id']?></h2>
                <div class="job_name">
                <h3><?php echo $value['job_name']?> <img src="assets/img/projectmanager.png" class="img-fluid"  alt="lowonganprojectmanager"></h3>
                
                </div>
                
                <?php echo $value['education']?>
            <br>
            <?php echo $value['year_experience']?>&nbsp;<?php echo $lang['tahun']?> <?php echo $lang['bidang']?>
            <div class="deskripsi">
            <br>
            <h4><?php echo $lang['job']?> :</h4>
            <p>
            <?php echo $value['job_desc']?>
           </p>
            <h4><?php echo $lang['criteria']?></h4>
            <?php echo $value['job_criteria']?>
            <div class="contact">
                <p></p>
            </div>
            <a href="<?php echo $back?>"><button type="button" name="back"><?php echo $lang['back']?></a></button>
            <a href="lamaran3.php?job_id=<?php echo $value['job_id'];?>&nama=<?php echo $namauser;?>&job_position=<?php echo $job_position;?>&employee_id=<?php echo $valueemployee['employee_id']?>"><button  type="submit"><?php echo $lang['apply']?></a></button>   
                </div>
            </div>
        </div>
    </div>
     </section>
    </form>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
  </html>