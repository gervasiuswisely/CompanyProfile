<?php
include_once("connectpostgre.php");
$jobid=$_GET['job_id'];
$sql = 'DELETE FROM lowongan_kerja
        WHERE job_id = :jobid';
$statement = $pdo->prepare($sql);
$statement->bindParam(':jobid', $jobid, PDO::PARAM_STR);
if ($statement->execute()) {
    echo'
         <script>
     alert("Berhasil menghapus lowongan")
         window.location.href="careeradmin.php"
      </script>';
}
// if($stmt){
//     echo'
//     <script>
//     alert("Berhasil menghapus lowongan")
//     window.location.href="careeradmin.php"
//     </script>';
//  } else{
//      echo '
//      <script>
//          alert("Gagal menghapus Lowongan");
//          window.location.href="careeradmin.php";
//      </script> ';
//  }
?>