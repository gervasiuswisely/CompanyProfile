<?php
require 'connectpostgre.php';
require_once 'config.php';

$project_id=$_GET['project_id'];
$project_id=$_POST['projectid'];
    $projectjudul=$_POST['projectjudul'];
    $projectclient=$_POST['projectclient'];
    $lokasi=$_POST['lokasi'];
    $projecttahun=$_POST['projecttahun'];
    $projectimagepath=$_POST['projectimagepath'];
    // echo $jobid,$position,$salarymin,$salarymax,$pekerjaan,$kriteria,$jobstatus,$pendidikan,$pengalamankerja,$kriteriaumum,$deskripsi,$jobdes,$jobcriteriaen,$educationen;
    $sql = 'UPDATE project
    SET project_id = :project_id,judul=:projectjudul,client=:projectclient,lokasi=:lokasi,tahun=:projecttahun,image_path=:projectimagepath
    WHERE project_id = :project_id';
$statement = $pdo->prepare($sql);

// bind params
$statement->bindParam(':project_id', $project_id, PDO::PARAM_STR);
$statement->bindParam(':projectjudul', $projectjudul);
$statement->bindParam(':projectclient', $projectclient);
$statement->bindParam(':lokasi', $lokasi);
$statement->bindParam(':projecttahun', $projecttahun);
$statement->bindParam(':projectimagepath', $projectimagepath);



// execute the UPDATE statment
if ($statement->execute()) {
echo 'The publisher has been updated successfully!';
}
    ?>