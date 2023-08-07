
<?php
// error_reporting(0);
// session_start();
// //connect
// $host="localhost";
// $user ="postgres";
// $password="wisely";
// $db="MYKIPG";

// try{
//     $dsn="pgsql:host=$host;port=5432;dbname=$db";
//     $pdo=new PDO($dsn,$user,$password,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);


//     if($pdo){
        
            
//     }
// }catch (PDOException $e){
//         die($e->getMessage());

// }

$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=mykisql", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//login 
if (isset($_POST['login'])) {
    $email = $_POST['emaillogin'];
    $password = MD5($_POST['passwordlogin']);
    $rememberme = $_POST['remembermelogin'];
    if($email==''or$password==''){
        echo'
        <script> 
        alert("masukkan username dan juga password");
        </script>
        ';
    }
    $cekdb="SELECT * FROM calonuser WHERE email=:email and password=:password";
    $stmt=$pdo->prepare($cekdb);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->bindParam(':password',$password,PDO::PARAM_STR);
    $stmt->execute();
    $publisher = $stmt->fetch(PDO::FETCH_ASSOC);
    $emaildb=$publisher['email'];
    $passwordDB=$publisher['password'];
    $usernameDB=$publisher['username'];
    // $roledb=$publisher['role'];
    if($publisher){
        if($emaildb=$email and $passwordDB=$password){
        // if($rememberme == 1){
        //     $cookie_name = "cookie_email";
        //     $cookie_value = $emaildb;
        //     $cookie_time  = time()+60 * 60 ;
        //     setcookie($cookie_name,$cookie_value,$cookie_time,"/");

        //     $cookie_name = "cookie_password";
        //     $cookie_value = $passwordDB;
        //     $cookie_time  = time()+60 * 60 ;
        //     setcookie($cookie_name,$cookie_value,$cookie_time,"/");
        // }
        
            if($usernameDB[0]==('v')){
                $_SESSION["loginvendor"]=true;
            if(isset($_POST['remembermelogin'])){
                $cookie_name = "vendor";
                $cookie_value = $usernameDB;
                $cookie_time  = time()+60*60 ;
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            }
                echo'
                <script>
                alert("login sukses");
                window.location.href="vendorori.php";
                </script>
                ';
             } else if($usernameDB[0]=('c')){
                $_SESSION["logincustomer"]=true;
                if(isset($_POST['remembermelogin'])){
                    $cookie_name = "customer";
                    $cookie_value = $usernameDB;
                    $cookie_time  = time()+60*60 ;
                    setcookie($cookie_name,$cookie_value,$cookie_time,"/");
                }
                echo'
                <script>
                alert("login  sukses");
                window.location.href="customer.php";
                </script>
                ';
        }
    } 
}
}
//loginvendor

if (isset($_POST['loginvendor'])) {
    $email = $_POST['emailvendor'];
    $password = MD5($_POST['passwordvendor']);
    $rememberme = $_POST['remembermevendor'];
    if($email==''or$password==''){
        echo'
        <script> 
        alert("masukkan email dan juga password");
        </script>
        ';
    }
    $cekdb="SELECT * FROM vendor WHERE email=:email and password=:password";
    $stmt=$pdo->prepare($cekdb);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->bindParam(':password',$password,PDO::PARAM_STR);
    $stmt->execute();
    $publisher = $stmt->fetch(PDO::FETCH_ASSOC);
    $emaildb=$publisher['email'];
    $passwordDB=$publisher['password'];
    if($publisher){
        if($_SESSION['logincustomer']){
            session_destroy();
            session_start();
            $_SESSION["loginvendor"]=true;
            echo'
            <script>
            alert("login sukses");
            window.location.href="homevendor.php";
            </script>
            ';
         }
        else if($emaildb=$email and $passwordDB=$password){
            $_SESSION["loginvendor"]=true;
            $_SESSION['namavendor']=$publisher['nama'];
             echo'
             <script>
             alert("login sukses");
             window.location.href="homevendor.php";
             </script>
             ';
             }
          
        }
        else if(!empty($email&&$password)||($email!=$emaildb&&$password!=$passwordDB)){
            echo'<script>
            alert("email atau password anda belum terdaftar")
            window.location.href="loginvendor.php"
            </script>';
        }
    } 


    // login customer

    if (isset($_POST['logincustomer'])) {
        $email = $_POST['emailcustomerlogin'];
        $password = MD5($_POST['passwordcustomerlogin']);
        $rememberme = $_POST['remembermecustomerlogin'];
        $roledb=$publisher['role'];
        if($email==''or$password==''){
            echo'
            <script> 
            alert("Anda belum memasukkan email atau password");
            </script>
            ';
        }
        $cekdb="SELECT * FROM client WHERE email=:email and password=:password";
        $stmt=$pdo->prepare($cekdb);
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->bindParam(':password',$password,PDO::PARAM_STR);
        $stmt->execute();
        $publisher = $stmt->fetch(PDO::FETCH_ASSOC);
        $emaildb=$publisher['email'];
        $passwordDB=$publisher['password'];
        if($publisher){
            if($_SESSION["loginvendor"]){
              
                echo'
                <script>
                alert("login gagal");
                window.location.href="logincustomer.php";
                </script>
                ';
                session_destroy();
                session_start();
                $_SESSION["logincustomer"]=true;
                header("location:homecustomer.php");
             }
            else if($emaildb=$email and $passwordDB=$password){
                $_SESSION["logincustomer"]=true;
                $_SESSION['namacustomer']=$publisher['client_name'];
                 echo'
                 <script>
                 alert("login sukses");
                 window.location.href="homecustomer.php";
                 </script>
                 ';
                 }
           
            }
            else if(!empty($email&&$password)||($email!=$emaildb&&$password!=$passwordDB)){
                echo'<script>
                alert("email atau password anda belum terdaftar")
                window.location.href="logincustomer.php"
                </script>';
            }
        } 
            
        if (isset($_POST['registercareer'])) {
            $email = $_POST['emailmyki'];
            $nama=$_POST['nama'];
            $no_telp=$_POST['no_telp'];
            $fax=$_POST['fax'];
            $alamat=$_POST['alamat'];
            $kota=$_POST['kota'];
            $propinsi=$_POST['propinsi'];
            $kodepos=$_POST['kodepos'];
            $password = MD5($_POST['password']);

            echo $email.$nama,$no_telp,$fax,$alamat,$kota,$propinsi,$kodepos,$password;
            $cekpegawai=$pdo->query("select * from employee");
            $cekpegawai->execute();
            $data=$cekpegawai->fetchAll();
            if(!empty($nama&&$no_telp&&$email&&$password&&$alamat&&$kota&&$propinsi&&$kodepos)){
                $sql='INSERT INTO employee(nama,no_hp,email,password,alamat,kota,propinsi,kodepos) values (:nama,:no_telp,:email,:password,:alamat,:kota,:propinsi,:kodepos)';
                $stmt=$pdo->prepare($sql);
                $stmt->execute([':nama'=>$nama,':no_telp'=>$no_telp,':email'=>$email,':password'=>$password,':alamat'=>$alamat,':kota'=>$kota,':propinsi'=>$propinsi,':kodepos'=>$kodepos]);
                
                if($stmt){
                   echo'
                   <script>
                   alert("Registrasi Sukses")
                   window.location.href="login.php"
                   </script>';
                } else{
                    echo '
                    <script>
                        alert("Registrasi gagal");
                        window.location.href="register.php";
                    </script>man
                    ';
                }
            }
        }
        //login myki
        if (isset($_POST['loginmyki'])) {
            $email = $_POST['emailmyki'];
            $password = md5($_POST['passwordmyki']);
            $cekpegawai=$pdo->query("select * from employee where email='$email' and password='$password'");
            $cekpegawai->execute();
            $data=$cekpegawai->fetchAll();
            foreach($data as $value){
                
            }
            if($email==$value['email']&&$password==$value['password']){
                $status=1;
            }
           
            else if($email=='admin@gmail.com'&&$password=='21232f297a57a5a743894a0e4a801fc3'){
                $_SESSION["loginadmin"]=true;
                header("location:indexadmin.php");
            }
             else if($email==''or$password==''){
                echo'
                <script> 
                alert("Anda belum memasukkan email atau password");
                </script>
                ';
            } 

          
              if ($status==1){
                session_start();
                $_SESSION['logincareer']=true;
                $_SESSION['namauser']=$value['nama'];
                echo'
                <script> 
                window.location.href="homecareer.php";
                </script>
                ';
            }
       
            // $cekdb="SELECT * FROM client WHERE email=:email and password=:password";
            // $stmt=$pdo->prepare($cekdb);
            // $stmt->bindParam(':email',$email, PDO::PARAM_STR);
            // $stmt->bindParam(':password',$password,PDO::PARAM_STR);
            // $stmt->execute();
            // $publisher = $stmt->fetch(PDO::FETCH_ASSOC);
            // $emaildb=$publisher['email'];
            // $passwordDB=$publisher['password'];
            // if($publisher){
            //     if($_SESSION["loginvendor"]){
                  
            //         echo'
            //         <script>
            //         alert("login gagal");
            //         window.location.href="logincustomer.php";
            //         </script>
            //         ';
            //         session_destroy();
            //         session_start();
            //         $_SESSION["logincustomer"]=true;
            //         header("location:customer2.php");
            //      }
            //     else if($emaildb=$email and $passwordDB=$password){
            //         $_SESSION["logincustomer"]=true;
            //          echo'
            //          <script>
            //          alert("login sukses");
            //          window.location.href="customer2.php";
            //          </script>
            //          ';
            //          }
               
            //     }
            //     else if(!empty($email&&$password)||($email!=$emaildb&&$password!=$passwordDB)){
            //         echo'<script>
            //         alert("email atau password anda belum terdaftar")
            //         window.location.href="logincustomer.php"
            //         </script>';
            //     }
            } 
function Generate_Username_vendor($panjang=4)
{
    $karakter='abcdefghijk0123456789';
    $data='v';
    for( $i=0 ; $i<$panjang; $i++)
    {
        $rand = rand(0,strlen($karakter)-1);
        $data .=$karakter{$rand};
    }
    return $data;
}
function Generate_Username_customer($panjang=4)
{
    $karakter='abcdefghijk0123456789';
    $data='c';
    for( $i=0 ; $i<$panjang; $i++)
    {
        $rand = rand(0,strlen($karakter)-1);
        $data .=$karakter{$rand};
    }
    return $data;
}
//register
if(isset($_POST['register'])){
    //jika tombol register diklik
    $email =$_POST['email'];
    $password = MD5($_POST['password']);
    $role    =$_POST['role'];
    if($role=='customer'){
        $username=Generate_Username_customer();
    }
    else if($role=='vendor'){
        $username=Generate_Username_vendor();
    }
    //pure inputan user -- blom dienkripsi

    //fungsi enkripsi
    // $epassword = password_hash($password,PASSWORD_DEFAULT);
    //insert to db postgre
   
    
    $sql='INSERT INTO calonuser(username,email,password,role) values (:username,:email,:password,:role)';
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':username'=>$username,':email'=>$email,':password'=>$password,':role'=>$role]);
    
    if($stmt){
        header('location:login.php');
    } else{
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php;
        </script>
        ';
    }
}
// register2
if(isset($_POST['register2'])){
    //jika tombol register diklik
    $nama=$_POST['nama2'];
    $email =$_POST['email2'];
    $password = MD5($_POST['password2']);
    $role =$_POST['role2'];

    // $role=$_POST['role'];
    // if($role=='customer'){
    //     $username=Generate_Username_customer();
    // }
    // else if($role=='vendor'){
    //     $username=Generate_Username_vendor();
    // }
    //pure inputan user -- blom dienkripsi

    //fungsi enkripsi
    // $epassword = password_hash($password,PASSWORD_DEFAULT);
    //insert to db postgre
   
    
    $sql='INSERT INTO calonuser(nama,email,password,role) values (:nama,:email,:password,:role)';
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':nama'=>$nama,':email'=>$email,':password'=>$password,':role'=>$role]);
    
    if($stmt){
        header('location:loginvendor.php');
    } else{
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="register2.php;
        </script>
        ';
    }
}
if(isset($_POST['registercustomer'])){
    //jika tombol register diklik
    // header ('location:loginvendor.php');
    $nama=$_POST['nama'];
    $jenisbadanusaha =$_POST['badanusaha'];
    $no_telp = ($_POST['no_telp']);
    $fax =$_POST['fax'];
    $email =$_POST['email'];
    $alamat=$_POST['alamat'];
    $kota=$_POST['kota'];
    $propinsi=$_POST['propinsi'];
    $kode_pos=$_POST['kodepos'];
    $password=MD5($_POST['password']);


   
    if(!empty($nama&&$jenisbadanusaha&&$no_telp&&$fax&&$email&&$alamat&&$kota&&$propinsi&&$kode_pos&&$password)){
        $sql='INSERT INTO client(client_name,password,jenis_badan_usaha,no_telepon,fax,alamat,kota,propinsi,kode_pos,email) values (:nama,:password,:jenisbadanusaha,:no_telp,:fax,:alamat,:kota,:propinsi,:kodepos,:email)';
        $stmt=$pdo->prepare($sql);
        $stmt->execute([':nama'=>$nama,':password'=>$password,':jenisbadanusaha'=>$jenisbadanusaha,':no_telp'=>$no_telp,':fax'=>$fax,':alamat'=>$alamat,':kota'=>$kota,':propinsi'=>$propinsi,':kodepos'=>$kode_pos,':email'=>$email]);
        
        if($stmt){
           echo'
           <script>
           alert("Registrasi Sukses")
           window.location.href="logincustomer.php"
           </script>';
        } else{
            echo '
            <script>
                alert("Registrasi gagal");
                window.location.href="registercustomer.php";
            </script>man
            ';
        }
    }
    else{
        echo'
        <script>
        alert("Anda harus mengisi semua field");
    </script>
    ';
    }

}
if(isset($_POST['registervendor'])){
    //jika tombol register diklik
    $nama=$_POST['nama'];
    $jenis_badan_usaha =$_POST['badanusaha'];
    $no_telp = ($_POST['no_telp']);
    $fax =$_POST['fax'];
    $homepagewebsite=$_POST['website'];
    $email =$_POST['email'];
    $alamat=$_POST['alamat'];
    $kota=$_POST['kota'];
    $propinsi=$_POST['propinsi'];
    $kode_pos=$_POST['kodepos'];
    $password=MD5($_POST['password']);


    // // $role=$_POST['role'];
    // // if($role=='customer'){
    // //     $username=Generate_Username_customer();
    // // }
    // // else if($role=='vendor'){
    // //     $username=Generate_Username_vendor();
    // // }
    // //pure inputan user -- blom dienkripsi

    // //fungsi enkripsi
    // // $epassword = password_hash($password,PASSWORD_DEFAULT);
    // //insert to db postgre
   
    if (!empty($nama&&$password&&$jenis_badan_usaha&&$no_telp&&$fax&&$alamat&&$kota&&$propinsi&&$kode_pos&&$email&&$homepagewebsite)){
        $sql='INSERT INTO vendor(nama,password,
        badan_usaha,no_telp,fax,alamat,kota,propinsi,kode_pos,email,website) values (:nama,:password,:badan_usaha,:no_telp,:fax,:alamat,:kota,:propinsi,:kodepos,:email,:homepagewebsite)';
        $stmt=$pdo->prepare($sql);
        $stmt->execute([':nama'=>$nama,':password'=>$password,':badan_usaha'=>$jenis_badan_usaha,':no_telp'=>$no_telp,':fax'=>$fax,':alamat'=>$alamat,':kota'=>$kota,':propinsi'=>$propinsi,':kodepos'=>$kode_pos,':email'=>$email,':homepagewebsite'=>$homepagewebsite]);
        
        if($stmt){
            header ('location:loginvendor.php');
        } else{
            echo '
            <script>
                alert("Registrasi gagal");
                window.location.href="registercustomer.php;
            </script>
            ';
        }
    }
    else{
        echo'
        <script>
        alert("Anda harus mengisi semua field");
    </script>
    ';
    }
}
//     if (isset($_POST['save'])){
//        $username=htmlspecialchars($_POST["username"]);
//        $password=htmlspecialchars($_POST["password"]);
//        $nama=htmlspecialchars($_POST["nama"]);
//        $no_telepon=htmlspecialchars($_POST["no_telepon"]);
//        $no_hp=htmlspecialchars($_POST["no_hp"]);
//        $alamat=htmlspecialchars($_POST["alamat"]);
//        $kota=htmlspecialchars($_POST["kota"]);
//        $propinsi=htmlspecialchars($_POST["propinsi"]);
//        $kode_pos=htmlspecialchars($_POST["kode_pos"]);
//        $gambar=htmlspecialchars($_POST["gambar"]);

//        $sql='INSERT INTO calon_employee(username,password,nama,no_telepon,no_hp,alamat,kota,propinsi,kode_pos,gambar) values (:username,:password,:nama,:no_telepon,:no_hp,:alamat,:kota,:propinsi,:kode_pos,:gambar)';
//        $stmt=$pdo->prepare($sql);
//        $stmt->execute([':username'=>$username,
//                       ':password'=>$password,
//                       ':nama'=>$nama,
//                       ':no_telepon'=>$no_telepon,
//                       ':no_hp'=>$no_hp,
//                       ':alamat'=>$alamat,
//                       ':kota'=>$kota,
//                       ':propinsi'=>$propinsi,
//                       ':kode_pos'=>$kode_pos,
//                       ':gambar'=>$gambar]);
//     if($stmt){
//         echo '
//         <script>
//             alert("data berhasil ditambah");
//         </script>
//         ';
//     } else{
//         echo '
//         <script>
//             alert("gagal menambahkan data");
//         </script>
//         ';
//     }
// }

// if (isset($_POST['save'])){
//     $file=upload();
//     if(!$file){
//         return false;
//     }
// }


// if (isset($_POST['save'])){
//      $file=upload();
//      $i++;
//      if(!$file){
//          return false;
//      }
//     }
//  if(isset($_POST['save'])){
//     $file='file';
//     $nama=$_POST['nama'];
//     $no_hp=$_POST['no_hp'];
//     $email=$_POST['email'];
//     $nik=$_POST['nik'];
//     for($i=0;$i<=7;$i++){
//      $namafile=$_FILES['file'.$i]['name'];
//      $ukuranfile=$_FILES['file'.$i]['size'];
//      $error=$_FILES['file'.$i]['error'];
//      $tmpname=$_FILES['file'.$i]['tmp_name'];

//      if($i==0){
//         $file0=$namafile;
//      }
//      else if($i==1){
//         $file1=$namafile;
//      }
//      else if($i==2){
//         $file2=$namafile;
//      }
//      else if($i==3){
//         $file3=$namafile;
//      }
//      else if($i==4){
//         $file4=$namafile;
//      }
//      else if($i==5){
//         $file5=$namafile;
//      }
//      else if($i==6){
//         $file6=$namafile;
//      }
//      else if($i==7){
//         $file7=$namafile;
//      }
//      if($error===4){
//          echo "<script>
//          alert('pilih gambar terlebih dahulu');
//          </script>";
//          return false;
//      }
//      $tipegambarvalid=['pdf'];
//      $tipegambar=explode('.',$namafile);
//      $tipegambar=strtolower(end($tipegambar));
//      if(!in_array($tipegambar,$tipegambarvalid)){
//      echo "<script>
//      alert('pilih file tipe pdf');
//      </script>";
//      return false;
//      }
//      if($ukuranfile>1000000){
//          echo "<script>
//          alert('file pdf terlalu besar');
//          </script>";
//      }
//     //  $namafilebaru= uniqid();
//     //  $namafilebaru .= '.';
//     //  $namafilebaru .= $tipegambar;
    
    
    
  
//      move_uploaded_file($tmpname,'assets/img/career/' . $namafile);
  
//     }
    
//     $sql='INSERT INTO calon_employee(nama,no_hp,email,cv,nik,ktp,transkrip,pasfoto,ijazah,kartu_keluarga,sertifikat_keterampilan,surat_keterangan_kerja) 
//     values (:nama,:no_hp,:email,:file0,:nik,:file1,:file2,:file3,:file4,:file5,:file6,:file7)';
//     $stmt=$pdo->prepare($sql);
//     $stmt->execute([':nama'=>$nama,
//                     ':no_hp'=>$no_hp,
//                     ':email'=>$email,
//                     ':file0'=>$file0,
//                     ':nik'=>$nik,
//                     ':file1'=>$file1,
//                     ':file2'=>$file2,
//                     ':file3'=>$file3,
//                     ':file4'=>$file4,
//                     ':file5'=>$file5,
//                     ':file6'=>$file6,
//                     ':file7'=>$file7]);
//     if($stmt){
//         echo '
//         <script>
//             alert("lamaran telah dikirim");
//         </script>
//         ';
//     } else{
//         echo '
//         <script>
//             alert("Registrasi gagal");
//             window.location.href="register.php;
//         </script>
//         ';
//     }
//  }

//  function upload(){
//     $namafile=$_FILES['file']['name'];
//     $ukuranfile=$_FILES['file']['size'];
//     $error=$_FILES['file']['error'];
//     $tmpname=$_FILES['file']['tmp_name'];

//     if($error===4){
//         echo "<script>
//         alert('pilih gambar terlebih dahulu');
//         </script>";
//         return false;
//     }
//     $tipegambarvalid=['pdf'];
//     $tipegambar=explode('.',$namafile);
//     $tipegambar=strtolower(end($tipegambar));
//     if(!in_array($tipegambar,$tipegambarvalid)){
//     echo "<script>
//     alert('pilih file tipe pdf');
//     </script>";
//     return false;
//     }
//     if($ukuranfile>1000000){
//         echo "<script>
//         alert('file pdf terlalu besar');
//         </script>";
//     }
//     $namafilebaru= uniqid();
//     $namafilebaru .= '.';
//     $namafilebaru .= $tipegambar;
//     move_uploaded_file($tmpname,'assets/img/career/' . $namafilebaru);
//     return $namafilebaru;
// }

// if(isset($_POST['save'])){
//     $nama=$_POST['nama'];
//     $no_hp=$_POST['no_hp'];
//     $email=$_POST['email'];
//     $nik=$_POST['nik'];
//     for($i=0;$i<=7;$i++){
//      $namafile=$_FILES['file'.$i]['name'];
//      $ukuranfile=$_FILES['file'.$i]['size'];
//      $error=$_FILES['file'.$i]['error'];
//      $tmpname=$_FILES['file'.$i]['tmp_name'];
//      if($error===4){
//          echo "<script>
//          alert('pilih gambar terlebih dahulu');
//          </script>";
//          return false;
//      }
//      $tipegambarvalid=['pdf'];
//      $tipegambar=explode('.',$namafile);
//      $tipegambar=strtolower(end($tipegambar));
//      if(!in_array($tipegambar,$tipegambarvalid)){
//      echo "<script>
//      alert('pilih file tipe pdf');
//      </script>";
//      return false;
//      }
//      if($ukuranfile>1000000){
//          echo "<script>
//          alert('file pdf terlalu besar');
//          </script>";
//      }
//      move_uploaded_file($tmpname,'assets/img/career/' . $namafile);
//     }
// }
if(isset($_POST['save'])){
    $file='file';
    $nama=$_POST['nama'];
    $no_hp=$_POST['no_hp'];
    $email=$_POST['email'];
    $no_ktp=$_POST['no_ktpb'];
    $no_cv=$_POST['no_cv'];
    $no_transkrip=$_POST['no_transkripbaru'];
    $no_kk=$_POST['no_kkbaru'];
    $no_sertifikat=$_POST['no_sertifikat'];
    $no_surat=$_POST['no_suratbaru'];
    $no_ijazah=$_POST['no_ijazah'];
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
    
    
    
  
     move_uploaded_file($tmpname,'assets/img/career/' . $namafile);
  
    }
    
    $sql='INSERT INTO calon_employee(nama,
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
                                    no_ijazah) 
    values (:nama,:no_hp,:email,:file0,:no_ktp,:file1,:file2,:file7,:file6,:file3,:file4,:file5,:no_cv,:no_transkrip,:no_surat,:no_sertifikat,:no_kk,:no_ijazah)';
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
                    ':no_ijazah'=>$no_ijazah]);
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
 }

 if(isset($_POST['apply3'])){
    $file='file';
    $nama=$_POST['nama3'];
    $no_hp=$_POST['no_hp3'];
    $email=$_POST['email3'];
    $no_ktp=$_POST['no_ktp3'];
    $no_cv=$_POST['no_cv3'];
    $no_transkrip=$_POST['no_transkrip3'];
    $no_kk=$_POST['no_kk3'];
    $no_sertifikat=$_POST['no_sertifikat3'];
    $no_surat=$_POST['no_surat3'];
    $no_ijazah=$_POST['no_ijazah3'];
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
    
    
    
  
     move_uploaded_file($tmpname,'assets/img/career/' . $namafile);
  
    }
    
    $sql='INSERT INTO calon_employee(nama,
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
                                    no_ijazah) 
    values (:nama,:no_hp,:email,:file0,:no_ktp,:file1,:file2,:file7,:file6,:file3,:file4,:file5,:no_cv,:no_transkrip,:no_surat,:no_sertifikat,:no_kk,:no_ijazah)';
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
                    ':no_ijazah'=>$no_ijazah]);
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
 }
//  if(isset($_POST['tambahprojek'])){
//     $project_id=$_POST['projectid'];
//     $projectjudul=$_POST['projectjudul'];
//     $projectclient=$_POST['projectclient'];
//     $lokasi=$_POST['lokasi'];
//     $projecttahun=$_POST['projecttahun'];
//     $projectimagepath=$_POST['projectimagepath'];
//     $cekprojek='SELECT * FROM project ';
//     $stmt2=$pdo->prepare($cekprojek);
//     $stmt2->execute();
//     $publisher = $stmt2->fetch(PDO::FETCH_ASSOC);
//     $sql='INSERT INTO project(project_id,judul,client,lokasi,tahun,image_path) values (:project_id,:projectjudul,:projectclient,:lokasi,:projecttahun,:projectimagepath)';
//     $stmt=$pdo->prepare($sql);
//     $stmt->execute([':project_id'=>$project_id,':projectjudul'=>$projectjudul,':projectclient'=>$projectclient,':lokasi'=>$lokasi,':projecttahun'=>$projecttahun,':projectimagepath'=>$projectimagepath]);
//     if($stmt){
//             echo'
//             <script>
//             alert("Berhasil menambahkan projek")
//             window.location.href="project.php"
//             </script>';
//         }
       
//      else{
//          echo '
//          <script>
//              alert("Gagal menambahkan projek");
//              window.location.href="projectadmin.php";
//          </script> ';
//      }

//  }

if(isset($_POST['tambahprojek'])){
    $project_id=$_POST['projectid'];
    $projectjudul=$_POST['projectjudul'];
    $projectclient=$_POST['projectclient'];
    $lokasi=$_POST['lokasi'];
    $projecttahun=$_POST['projecttahun'];
    $projectimagepath=$_POST['projectimagepath'];
    $ambilid = $pdo->query("SELECT count(*) FROM project")->fetchColumn();
    $totalprojek=$ambilid;
    $cekprojek=$pdo->query("select * from project");
    $cekprojek->execute();
    $data=$cekprojek->fetchAll();
        foreach($data as $value){
            if($project_id==$value['project_id']){
                $status=1;
                echo'
                         <script>
                     alert("Projek sudah pernah ditambahkah")
                 window.location.href="projectadmin.php"
      </script>';
            }
            else{
                $status++;
            }
        }   
                if($status>1){
                    $sql='INSERT INTO project(project_id,judul,client,lokasi) values (:project_id,:projectjudul,:projectclient,:lokasi)';
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute([':project_id'=>$project_id,':projectjudul'=>$projectjudul,':projectclient'=>$projectclient,':lokasi'=>$lokasi]);
                    if($stmt){
                            echo'
                            <script>
                            alert("Berhasil menambahkan projek")
                            window.location.href="project.php"
                            </script>';
                        }
                       
                     else{
                         echo '
                         <script>
                             alert("Gagal menambahkan projek");
                             window.location.href="projectadmin.php";
                         </script> ';
                     }
                }
           
        }
    
?>
