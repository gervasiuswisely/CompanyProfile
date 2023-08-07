<?php
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
session_start();
$namavendor=$_SESSION['namavendor'];
$vendorid=$_GET['vendor_id'];
$servername = "localhost";
$username = "root";
$password = "";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=mykisql", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
            $nama = $_POST['nama'];
            $kondisi=$_POST['kondisi'];
            $harga=$_POST['harga'];
            $minimumorder=$_POST['minimumorder'];     
            $satuan =$_POST['satuan'];
            $nama_vendor=$namavendor;
            $vendor_id=$vendorid;

    for($i = 0; $i < sizeof($nama); $i++){
                if(!empty($nama[$i]&&$kondisi[$i]&&$harga[$i]&&$minimumorder[$i]&&$satuan[$i])){
                  $sql='INSERT INTO supplyrequest(namabarang,kondisi,harga,minimum_order,satuan,supplier_name,vendor_id) values (:nama,:kondisi,:harga,:minimumorder,:satuan,:nama_vendor,:vendor_id)';
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute([':nama'=>$nama[$i],':kondisi'=>$kondisi[$i],':harga'=>$harga[$i],':minimumorder'=>$minimumorder[$i],':satuan'=>$satuan[$i],':nama_vendor'=>$nama_vendor,':vendor_id'=>$vendor_id]);

                  if($stmt){
                    echo ' <script>
                    alert("data berhasil di tambahkan");
                    window.location.href="homevendor.php";
                    </script>
                    ';
                }
                }
                else{
                  echo'<script>
                  alert("Anda belum mengisi semua field")
                  window.location.href="vendor2.php";
                  </script>';
                }
               
    }


?>