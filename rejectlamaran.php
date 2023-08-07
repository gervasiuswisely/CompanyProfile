<?php 
require 'connectpostgre.php';
require_once 'config.php';
    $tolak='Rejected';
    $lamaranid=$_GET['lamaran_id'];
    // echo $position;
    // echo $jobid,$position,$salarymin,$salarymax,$pekerjaan,$kriteria,$jobstatus,$pendidikan,$pengalamankerja,$kriteriaumum,$deskripsi,$jobdes,$jobcriteriaen,$educationen;
    $sql = 'UPDATE lamaran_
    SET status = :tolak
    WHERE lamaran_id = :lamaranid';

// prepare statement
$statement = $pdo->prepare($sql);

// bind params
$statement->bindParam(':tolak', $tolak, PDO::PARAM_STR);
$statement->bindParam(':lamaranid', $lamaranid);
// 


// execute the UPDATE statment
if ($statement->execute()) {
echo 'The publisher has been updated successfully!';
}
?>