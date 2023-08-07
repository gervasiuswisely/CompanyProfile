<?php 
require 'connectpostgre.php';
require_once 'config.php';
    $terima='Approved';
    $projectid=$_GET['project_id'];
    // echo $position;
    // echo $jobid,$position,$salarymin,$salarymax,$pekerjaan,$kriteria,$jobstatus,$pendidikan,$pengalamankerja,$kriteriaumum,$deskripsi,$jobdes,$jobcriteriaen,$educationen;
    $sql = 'UPDATE projectrequest
    SET status = :terima
    WHERE id = :projectid';

// prepare statement
$statement = $pdo->prepare($sql);

// bind params
$statement->bindParam(':terima', $terima, PDO::PARAM_STR);
$statement->bindParam(':projectid', $projectid);
// 


// execute the UPDATE statment
if ($statement->execute()) {
    echo '
    <script>
        alert("Berhasil approve projectrequest");
        window.location.href="customeradmin.php";
    </script> ';
}
?>