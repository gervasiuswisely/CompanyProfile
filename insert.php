
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
$namacustomer=$_SESSION['namacustomer'];
$client_id=$_GET['client_id'];
$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=mykisql", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
            $nama = $_POST['nama'];
            $gambar=$_POST['gambar'];
            $boq=$_POST['boq'];
            $nama_customer=$namacustomer;
            $clientid=$client_id;
              for($i = 0; $i < sizeof($nama); $i++){
                if(!empty($nama[$i]&&$gambar[$i]&&$boq[$i])){
                  $sql='INSERT INTO projectrequest(project_name,gambar,build_of_quantity,client_name,client_id) values (:nama,:gambar,:boq,:nama_customer,:clientid)';
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute([':nama'=>$nama[$i],':gambar'=>$gambar[$i],':boq'=>$boq[$i],':nama_customer'=>$nama_customer,':clientid'=>$clientid]);
                  if($stmt){
                    echo ' <script>
                    alert("data berhasil di tambahkan");
                    window.location.href="customer2.php"
                    </script>
                    ';
                    }
                }
                
                else{
                  echo'<script>
                  alert("anda belum memasukkan gambar")
                  window.location.href="customer2.php"
                  </script>';
                }
              
        
        }
     
    



 
?>