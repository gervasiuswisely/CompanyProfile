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

  <title>  PT MARGA YASA KONSTRUKSI INDONESIA  - About</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/logomyki.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

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
<body class="body1">

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
            <li class="dropdown active"><a  class="active"><span> <?php echo $lang ['about']?></span> </i></a>
              <ul>
                <li><a href="aboutresponsive.php"><?php echo $lang ['#about']?></a></li>
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
          <li><a href="aboutresponsive.php?lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="aboutresponsive.php?lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
      </nav><!-- .navbar -->

    </div>
</header>

    <section id="aboutus" class="aboutus">
        <div class="container-fluid containerabout">
            <div class="container-lg container-md-fluid aboutcontainer">
                <div class="row">
                    <div class="col-12">
                        <h1 class="panjang"><?php echo $lang ['ourprofile'] ?></h1>
                        <p><?php echo $lang ['our_profile']?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="pendek"><?php echo $lang['visih5']?></h1>
                       <p><?php echo $lang['visi']?></p> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="pendek"><?php echo $lang['misih5']?></h1>
                      <ul style="list-style:number">
                        <li><?php echo $lang['misi']?></li>
                        <li><?php echo $lang['misi2']?></li>
                        <li><?php echo $lang['misi3']?></li>
                      </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 link-1">
                        <h1 class="verylong"><?php echo $lang['link1']?></h1>
                        <ul>
                            <li><a href="#legalitasrespon"><?php echo $lang['#legalitas']?></a></li>
                            <li><a href="#targetfokusrespon"><?php echo $lang['#targetfokus']?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="legalitasrespon" class="legalitasrespon">
        <div class="container-fluid legalbaru">
          <div class="container-lg container-sm-fluid">
            <div class="row">
              <h1 class="panjang">Legalitas Perusahaan</h1>
              <ul class="legalli">
              <li><?php echo $lang['legal1']?></li>
              <li><?php echo $lang['legal2']?></li>
              <li><?php echo $lang['legal3']?></li>
              <li><?php echo $lang['legal4']?></li>
              <li><?php echo $lang['legal5']?></li>
              <li><?php echo $lang['legal6']?></li>
              <li><?php echo $lang['legal7']?></li>
              <li><?php echo $lang['legal8']?></li>
              </ul>
            </div>
            <div class="row">
                    <div class="col-12 link-2">
                        <h1 class="verylong"><?php echo $lang['link1']?></h1>
                        <ul>
                            <li><a href="#aboutus"><?php echo $lang['#about']?></a></li>
                            <li><a href="#legalitasrespon"><?php echo $lang['#legalitas']?></a></li>
                            <li><a href="#targetfokusrespon"><?php echo $lang['#targetfokus']?></a></li>
                        </ul>
                    </div>
                </div>
          </div>
        </div>
        
    </section>

    <section id="targetfokusrespon" class="targetfokusrespon">
      <div class="container-fluid targetrespon">
        <div class="container-lg containerd-md-fluid">
        <div class="row">
          <div class="col-12">
          <h1><?php echo $lang['#targetfokus']?></h1>
          <p><?php echo $lang['target_fokus']?></p>
          <li><?php echo $lang['target1']?></li>
          <li><?php echo $lang['target2']?></li>
          <li><?php echo $lang['target3']?></li>
          <li><?php echo $lang['target4']?></li>
          </div>
          
        </div>
        <div class="row">
          <div class="col-12 link-5">
          <h1 class="verylong"><?php echo $lang['link1']?></h1>
          <li><a href="#aboutus"><?php echo $lang['#about']?></a></li>
                <li><a href="#legalitasrespon"><?php echo $lang['#legalitas']?></a></li>
                <li><a href="#targetfokusrespon"><?php echo $lang['#targetfokus']?></a></li>
          </div>
        </div>
        </div>
        </div>
    </section>
    <!-- <section  id="targetdanfokus" class="team">
        <div  class="container sumpa" data-aos="fade-up">
  
          <div class="section-header">
            <h2><?php echo $lang['#targetfokus']?></h2>
            <p><?php echo $lang['target_fokus']?>
                
              </p>
          </div>
  
          <div class="row gy-5 super member-info">
                <ul>
                <li><h4><?php echo $lang['target1']?></h4></li>
                <li><h4><?php echo $lang['target2']?></h4></li>
                <li><h4><?php echo $lang['target3']?></h4></li>
                <li><h4><?php echo $lang['target4']?></h4></li>
              
                </ul>
              </div>
              <div class="navfooter">
                <li><a href="#about">Our Profile</a></li>
                <li><a href="#legalitas">Legalitas</a></li>
                <li><a href="#targetdanfokus">Target dan fokus</a></li>
              </div>  
            </div> 
</div>
</div>
            </section>  -->


    
    
</body>
        <!-- </footer> --> 
        <!-- <footer class=ori>
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
              <img class="insta" src="assets/img/footer/instagram-removebg-preview (6) (2).png"><a class="ig" href="https://www.instagram.com/gayakonin/">gayakonin</a>
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
                    <p><?php echo $lang['contact_us']?></p>
                    <img class="img-ig" src="assets/img/footer/instagram-removebg-preview (6).png"><a class="link-ig" href="https://www.instagram.com/gayakonin/">gayakonin</a>
                    <img class="img-hp" src="assets/img/footer/call-removebg-preview (1).png" alt=""><a class="link-phone">(031)99841021</a>
                    <img class="img-mail" src="assets/img/footer/Asset 1.png" alt=""><a class="link-email">info@gayakonin.com</a>
                </div>
            </div>
        </footer>
        <!-- <footer class="footer">
          <div class="footer-left">
            <h3>PT MARGA YASA KONSTRUKSI INDONESIA</h3>
          <div class="alamat">
            <p>
              JL.RADEN PATAH N0.10, MOJOSARI<br>
              MOJOKERTO, INDONESIA
            </p>
          </div>
          </div>
          <div class="footer-right">
            <div>
              <h3>contact us</h3>
              <img src="assets/img/footer/instagram-removebg-preview (6).png"><a href="">gayakonin</a>
              <img src="assets/img/footer/call-removebg-preview (1).png" alt=""><a href="">(031)99841021</a>
              <img src="assets/img/footer/mail-removebg-preview.png" alt=""><a href="">info@gayakonin.com</a>
            </div>
          </div>
          <p class="myki-copyright">  &copy; Copyright <strong><span>PT Marga Yasa Konstruksi Indonesia</span></strong>. All Rights Reserved</p>

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