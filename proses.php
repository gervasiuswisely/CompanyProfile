<?php
$jobid=$_GET['job_id'];
$job_position=$_GET['job_position'];
$namauser=$_GET['nama'];
$employeeid=$_GET['employee_id'];
//ini wajib dipanggil paling 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//ini sesuaikan foldernya ke file 3 ini
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'connectpostgre.php';

$mail = new PHPMailer(true);

           //sesuaikan name dengan di form nya ya 
        //    $file=$_FILES['file0']['tmp_name'];
        //    $namafile=$_FILES['file0']['name'];
        $nama=$namauser;
        $no_hp=$_POST['no_hp3'];
        $email=$_POST['email3'];
        $no_ktp=$_POST['no_ktp3'];
        $no_cv=$_POST['no_cv3'];
        $no_transkrip=$_POST['no_transkrip3'];
        $no_kk=$_POST['no_kk3'];
        $no_sertifikat=$_POST['no_sertifikat3'];
        $no_surat=$_POST['no_surat3'];
        $no_ijazah=$_POST['no_ijazah3'];
        $job_id=$jobid;
        $job_position=$job_position;
        $employee_id=$employeeid;
        if(!empty($no_hp&&$email&&$no_ktp&&$no_cv&&$no_transkrip&&$no_kk&&$no_sertifikat&&$no_surat&&$no_ijazah)){
           for($i=0;$i<=7;$i++){
            $namafile=$_FILES['file'.$i]['name'];
            $ukuranfile=$_FILES['file'.$i]['size'];
            $error=$_FILES['file'.$i]['error'];
            $tmpname=$_FILES['file'.$i]['tmp_name'];
       
            if($i==0){
               $file0=$namafile;
            }
            else if($i==1){
               $file1=$namafile;
            }
            else if($i==2){
               $file2=$namafile;
            }
            else if($i==3){
               $file3=$namafile;
            }
            else if($i==4){
               $file4=$namafile;
            }
            else if($i==5){
               $file5=$namafile;
            }
            else if($i==6){
               $file6=$namafile;
            }
            else if($i==7){
               $file7=$namafile;
            }
            if($error===4){
                echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
                return false;
            }
            $tipegambarvalid=['pdf'];
            $tipegambar=explode('.',$namafile);
            $tipegambar=strtolower(end($tipegambar));
            if(!in_array($tipegambar,$tipegambarvalid)){
            echo "<script>
            alert('pilih file tipe pdf');
            </script>";
            return false;
            }
            if($ukuranfile>1000000){
                echo "<script>
                alert('file pdf terlalu besar');
                </script>";
            }
           //  $namafilebaru= uniqid();
           //  $namafilebaru .= '.';
           //  $namafilebaru .= $tipegambar;
      
           $mail->addAttachment($tmpname,$namafile);
       
           }
//Create an instance; passing `true` enables exceptions

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'wiselybonggo@gmail.com';                     //SMTP username
    $mail->Password   = 'gsphqnmypcxanada';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //pengirim
    $mail->setFrom('wiselybonggo@gmail.com', 'hrd@gayakonin.com');
    $mail->addAddress($email,'gervasiuswisely@gmail.com');     //Add a recipient
 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Surat Lamaran Calon Pegawai MYKI';
    $mail->Body    = "
                      nama:$nama <br>
                      no hp :$no_hp<br>
                      email :$email <br>
                      no KTP :$no_ktp <br>
                      no cv :$no_cv   <br>
                      no transkrip:$no_transkrip<br>
                      no kk       :$no_kk            <br> 
                      no sertifikat:$no_sertifikat   <br>
                      no surat      :$no_surat       <br>
                      no ijazah     :$no_ijazah      <br>
                      "     
                      ;

    $mail->AltBody = '';
    //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
   

    $mail->send();
  
    $sql='INSERT INTO lamaran_(nama,
                                    no_hp,
                                    email,
                                    cv,
                                    no_ktp,
                                    ktp,
                                    transkrip,
                                    pasfoto,
                                    ijazah,
                                    kartu_keluarga,
                                    sertifikat_keterampilan
                                    ,surat_keterangan_kerja,
                                    no_cv,
                                    no_transkrip,
                                    no_surat,
                                    no_sertifikat,
                                    no_kk,
                                    no_ijazah,
                                    job_id,
                                    job_name,
                                    employee_id) 
    values (:nama,:no_hp,:email,:file0,:no_ktp,:file1,:file2,:file7,:file6,:file3,:file4,:file5,:no_cv,:no_transkrip,:no_surat,:no_sertifikat,:no_kk,:no_ijazah,:job_id,:job_position,:employeeid)';
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':nama'=>$nama,
                    ':no_hp'=>$no_hp,
                    ':email'=>$email,
                    ':file0'=>$file0,
                    ':no_ktp'=>$no_ktp,
                    ':file1'=>$file1,
                    ':file2'=>$file2,
                    ':file7'=>$file7,
                    ':file6'=>$file6,
                    ':file3'=>$file3,
                    ':file4'=>$file4,
                    ':file5'=>$file5,
                    ':no_cv'=>$no_cv,
                    ':no_transkrip'=>$no_transkrip,
                    ':no_surat'=>$no_surat,
                    ':no_sertifikat'=>$no_sertifikat,
                    ':no_kk'=>$no_kk,
                    ':no_ijazah'=>$no_ijazah,
                  ':job_id'=>$job_id,
               ':job_position'=>$job_position,
            ':employeeid'=>$employeeid]);
    if($stmt){
           
        echo '
        <script>
            alert("lamaran telah dikirim");
        </script>
        ';
    } else{
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php;
        </script>
        ';
    }
    echo "<script>
    alert('Email berhasil terkirim!');
    window.location.href='index.php';
    </script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
else{
   echo'<script>
   alert("Anda belum mengisi semua field");
   window.location.href="lamaran3.php"
   </script>';
}
         //  redirect ke halaman index.php
     
        
        ?>