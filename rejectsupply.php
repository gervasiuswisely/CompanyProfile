<?php 
require 'connectpostgre.php';
require_once 'config.php';
    $terima='Rejected';
    $supply_id=$_GET['supply_id'];
    // echo $position;
    // echo $jobid,$position,$salarymin,$salarymax,$pekerjaan,$kriteria,$jobstatus,$pendidikan,$pengalamankerja,$kriteriaumum,$deskripsi,$jobdes,$jobcriteriaen,$educationen;
    $sql = 'UPDATE supplyrequest
    SET status = :terima
    WHERE id = :supply_id';

// prepare statement
$statement = $pdo->prepare($sql);

// bind params
$statement->bindParam(':terima', $terima, PDO::PARAM_STR);
$statement->bindParam(':supply_id', $supply_id);
// 


// execute the UPDATE statment
if ($statement->execute()) {
    echo '
    <script>
        alert("Berhasil Reject Supply Request");
        window.location.href="vendoradmin.php";
    </script> ';
}
?>