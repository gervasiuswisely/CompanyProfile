<?php

//ini wajib dipanggil paling 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// //ini sesuaikan foldernya ke file 3 ini
// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';
// require 'connectpostgre.php';

// $mail = new PHPMailer(true);

           //sesuaikan name dengan di form nya ya 
        //    $file=$_FILES['file0']['tmp_name'];
        //    $namafile=$_FILES['file0']['name'];

           //  $namafilebaru= uniqid();
           //  $namafilebaru .= '.';
           //  $namafilebaru .= $tipegambar;
        //    $nama = $_POST['nama'];
        //    $gambar=$_POST['gambar'];
        //    $boq=$_POST['boq']; 
       
        //    $allowed = array('pdf');
        //    $count_salahFile = 0;
           
        //    for ($i = 0; $i< sizeof($nama); $i++){
        //        $getExtension = pathinfo($gambar[$i], PATHINFO_EXTENSION);
        //     //    $tmpname1=$_FILES[$gambar[$i]]['tmp_name'];
        //     //    $tmpname2=$_FILES[$boq[$i]]['tmp_name'];
        //        $getExtension2 = pathinfo($boq[$i], PATHINFO_EXTENSION);
        //        if (!in_array($getExtension, $allowed) || !in_array($getExtension2, $allowed)){
        //            $count_salahFile ++;
        //        }
        //    }
        //    if ($count_salahFile >0){
        //        echo '<script>
        //        alert("only pdf yang boleh masuk")
        //        </script>';      
        //    }
        //    else{
        //        echo '<script>
        //        alert("oke semua pdf aman")
        //        </script>';
        //        for($i = 0; $i < sizeof($nama); $i++){
            //     move_uploaded_file($tmpname1,'./assets/img/career/' . $gambar[$i]);
            //     move_uploaded_file($tmpname2,'./assets/img/career/'.$boq[$i]);
            //    $mail->addAttachment("./assets/img/career/".$gambar[$i]);
            //    $mail->addAttachment("./assets/img/career/".$boq[$i]);
         //  }
       //}
           
           
//Create an instance; passing `true` enables exceptions

// try {
//     //Server settings
//     $mail->SMTPDebug = 0;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'wiselybonggo@gmail.com';                     //SMTP username
//     $mail->Password   = 'gsphqnmypcxanada';                               //SMTP password
//     $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
//     $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //pengirim
//     $mail->setFrom('wiselybonggo@gmail.com', 'hrd@gayakonin.com');
//     $mail->addAddress($nama,'gervasiuswisely@gmail.com');     //Add a recipient
 
//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Surat Lamaran Calon Customer MYKI';
//     $mail->Body    = "
//                       nama:$nama <br>
//                       "     
//                       ;

//     $mail->AltBody = '';
//     //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
   

//     $mail->send();
//     for($i = 0; $i < sizeof($nama); $i++){
//     $sql='INSERT INTO client(project_name,gambar,build_of_quantity) values (:nama,:gambar,:boq)';
//     $stmt=$pdo->prepare($sql);
//     $stmt->execute([':nama'=>$nama[$i],':gambar'=>$gambar[$i],':boq'=>$boq[$i]]);
//     }
//     if($stmt){
//         echo ' <script>
//         alert("data berhasil di tambahkan");
//         window.location.href="customertemp.php";
//         </script>
//         ';
//     }
//     echo "<script>alert('Email berhasil terkirim!');
//     window.location.href'indexresponsive.php';
//     </script>";
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

// }
         //  redirect ke halaman index.php
     
        
        // ?>
<?php
 $host="localhost";
 $user ="postgres";
 $password="wisely";
 $db="MYKIPG";

 try{
     $dsn="pgsql:host=$host;port=5432;dbname=$db";
     $pdo=new PDO($dsn,$user,$password,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);


     if($pdo){
       
     }
 }catch (PDOException $e){
         die($e->getMessage());

 }
             $nama = $_POST['nama'];
             $gambar=$_POST['gambar'];
             $boq=$_POST['boq']; 

             $allowed = array('pdf');
             $count_salahFile = 0;
            
             for ($i = 0; $i< sizeof($nama); $i++){
                $getExtension = pathinfo($gambar[$i], PATHINFO_EXTENSION);
                 $getExtension2 = pathinfo($boq[$i], PATHINFO_EXTENSION);
                if (!in_array($getExtension, $allowed) || !in_array($getExtension2, $allowed)){
                   $count_salahFile ++;
                }
            }
             if ($count_salahFile >0){
                echo '<script>
               alert("only pdf yang boleh masuk")
               </script>';      
            }
           else{
                echo '<script>
                alert("oke semua pdf aman")
                </script>';
               for($i = 0; $i < sizeof($nama); $i++){
                $sql='INSERT INTO client(project_name,gambar,build_of_quantity) values (:nama,:gambar,:boq)';
              $stmt=$pdo->prepare($sql);
                $stmt->execute([':nama'=>$nama[$i],':gambar'=>$gambar[$i],':boq'=>$boq[$i]]);

              if($stmt){
                   echo ' <script>
                    alert("data berhasil di tambahkan");
                    window.location.href="customertemp.php";
                    </script>
                    ';
                }
             }
        } 
            $ext = pathinfo($gambar[0], PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                echo'<script>
                alert("only pdf yang boleh masuk")
                </script>';
            }
             else{
                 echo'<script>
                 alert("oke kamu sukses masukin pdfnya, terima kasih")
                 </script>';
             }
            

     for($i = 0; $i < sizeof($nama); $i++){
                 $sql='INSERT INTO client(project_name,gambar,build_of_quantity) values (:nama,:gambar,:boq)';
                 $stmt=$pdo->prepare($sql);
                 $stmt->execute([':nama'=>$nama[$i],':gambar'=>$gambar[$i],':boq'=>$boq[$i]]);

     }


?>