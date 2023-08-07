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
?>


