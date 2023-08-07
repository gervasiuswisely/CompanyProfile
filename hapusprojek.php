<?php
include_once("connectpostgre.php");
$projectid=$_GET['project_id'];
echo $projectid;
$sql = 'DELETE FROM project
        WHERE project_id = :projectid';
$statement = $pdo->prepare($sql);
$statement->bindParam(':projectid', $projectid, PDO::PARAM_STR);
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