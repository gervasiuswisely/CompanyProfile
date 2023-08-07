<?php
require_once 'config.php';
require_once 'function.php';
$namavendor=$_SESSION['namavendor'];
$vendorid=$_GET['vendor_id'];
if($_SESSION['loginvendor']){
  
}
else{
  echo'
  <script>
  alert("Anda belum login sebagai vendor");
  window.location.href="loginvendor.php";
  </script>
  ';
 
  
}
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

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="assets/img/logomyki.png" style="width:Auto" alt=""> 
        <h1> <?php echo $lang['judul']?></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php"><span> <?php echo $lang ['home']?></span></a>
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
          <li class="dropdown" ><a href="#"><span><?php echo $lang ['eproc']?></span> </i></a>
              <ul>
                <li><a href="homevendor.php">Vendor / Subcon </a></li>
                <li><a href="homecustomer.php">Customer </a></li>
              </ul>
          </li>
          <li><a href="contactus.php"><?php echo $lang['kontak']?></a></li>
          <li><a href="homevendor.php" class="active"><?php echo $namavendor?></a></li>
          <li><a href="logout2.php">logout</a></li>
          <li><a href="vendor2.php?lang=idn"><img class="logoindo" src="assets/img/icon/indonesia.png" alt=""></a></li>
          <li><a href="vendor2.php?lang=en"><img class="logoeng" src="assets/img/icon/united-kingdom.png" alt=""></a></li>
      </nav><!-- .navbar -->

    </div>
</header>
  <section class="">
  <div class="container-md-fluid container-lg supplycontainer">
        <h1 style="font-size:24px;color:#1930ff;"><?php echo $lang['formrequestvendor']?></h1> 
        <hr>
        <form action="insertvendor.php?vendor_id=<?php echo $vendorid?>" method="POST" enctype="multipart/formdata">
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-primary" id="btn-tambah">Tambah Produk</button>    
                </div>
            </div>
            <div class="row">
                <div class="table-responsive" style="width:100%">
                    <table class="table">
                        <thead>
                          <tr>
                          <th><?php echo $lang['no-request']?></th>
                            <th><?php echo $lang['namaproduk']?></th>
                            <th><?php echo $lang['kondisi']?></th>
                            <th><?php echo $lang['harga']?></th>
                            <th><?php echo $lang['minorder']?></th>
                            <th><?php echo $lang['satuan']?></th>
                          </tr>
                          
                        </thead>
                        <tbody id="tbl-barang-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row btnSave" style="display:none;">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>    
                </div>
            </div>
        </form>        
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

  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script>
        $(function(){
            var idCount_remove = 0;
            var count = 0;
            // print("masuk sini");
            if(count == 0){
                $('.btnSave').hide();
            }
            $('#btn-tambah').on('click', function(){
                count +=1;
                // console.log("countcek " + count)
                $('#tbl-barang-body').append(`
                    <tr>
                        <td>`+ count +`</td>
                        <td>
                            <input type="text" name="nama[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="kondisi[]" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="harga[]" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="minimumorder[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="satuan[]" class="form-control">
                        </td>

                        <?php
                        echo '
                        <td>
                            <button type="button" class="btn btn-danger removeItem"  >HAPUS</button>
                        </td>';
                        ?>
                    </tr>
                `);

                if(count > 0){
                    $('.btnSave').show();
                }
                //problem : function jquery class ke trigger bolak balik
                //solution : https://stackoverflow.com/questions/14969960/jquery-click-events-firing-multiple-times
                $('.removeItem').off().on('click', function(){
                    count --;
                    $(this).closest("tr").remove();
                    // console.log("countcek" + count);
                    if(count == 0){
                        $('.btnSave').hide();
                    }
                })
            }
            )
        })
    </script>
  </body>



</html>