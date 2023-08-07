<?php 
require 'connectpostgre.php';
require_once 'config.php';
    $jobid=$_GET['job_id'];
    $job_id=$_POST['jobid'];
    $position=$_POST['jobposition'];
    $salarymin=$_POST['salarymin'];
    $salarymax=$_POST['salarymax'];
    $pekerjaan=$_POST['pekerjaan'];
    $kriteria=$_POST['kriteria'];
    $jobstatus=$_POST['jobstatus'];
    $pendidikan=$_POST['pendidikan'];
    $pengalamankerja=$_POST['pengalamankerja'];
    $kriteriaumum=$_POST['kriteriaumum'];
    $deskripsi=$_POST['deskripsi'];
    $jobdes=$_POST['jobdes'];
    $jobcriteriaen=$_POST['jobcriteriaen'];
    $educationen=$_POST['educationen'];
    echo $position;
    // echo $jobid,$position,$salarymin,$salarymax,$pekerjaan,$kriteria,$jobstatus,$pendidikan,$pengalamankerja,$kriteriaumum,$deskripsi,$jobdes,$jobcriteriaen,$educationen;
    $sql = 'UPDATE lowongan_kerja
    SET job_name = :position,salary_min=:salarymin,salary_max=:salarymax,job_desc=:pekerjaan,job_criteria=:kriteria,
    job_status=:jobstatus,education=:pendidikan,year_experience=:pengalamankerja,kriteria_umum=:kriteriaumum,deskripsi_umum=:deskripsi,jobdescen=:jobdes,jobcriteriaen=:jobcriteriaen,educationen=:educationen
    WHERE job_id = :jobid';

// prepare statement
$statement = $pdo->prepare($sql);

// bind params
$statement->bindParam(':jobid', $jobid, PDO::PARAM_STR);
$statement->bindParam(':position', $position);
$statement->bindParam(':salarymin', $salarymin);
$statement->bindParam(':salarymax', $salarymax);
$statement->bindParam(':pekerjaan', $pekerjaan);
$statement->bindParam(':kriteria', $kriteria);
$statement->bindParam(':jobstatus', $jobstatus);
$statement->bindParam(':pendidikan', $pendidikan);
$statement->bindParam(':pengalamankerja', $pengalamankerja);
$statement->bindParam(':kriteriaumum', $kriteriaumum);
$statement->bindParam(':deskripsi', $deskripsi);
$statement->bindParam(':jobdes', $jobdes);
$statement->bindParam(':jobcriteriaen', $jobcriteriaen);
$statement->bindParam(':educationen', $educationen);


// execute the UPDATE statment
if ($statement->execute()) {
echo 'The publisher has been updated successfully!';
}
?>