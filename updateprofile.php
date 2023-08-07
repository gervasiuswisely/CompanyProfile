
<?php
require_once ("connectpostgre.php");
session_start();
    $employee_id=$_GET['employee_id'];
    $employeeid=$employee_id;
    $nama=$_POST['profilenama'];
    $nohp=$_POST['no_hp_profile'];
    $email=$_POST['email_profile'];
    $password=$_POST['password_profile'];
    $alamat=$_POST['alamat_profile'];
    $kota=$_POST['kota_profile'];
    $propinsi=$_POST['propinsi_profile'];
    $kodepos=$_POST['kode_pos_profile'];
    // echo $jobid,$position,$salarymin,$salarymax,$pekerjaan,$kriteria,$jobstatus,$pendidikan,$pengalamankerja,$kriteriaumum,$deskripsi,$jobdes,$jobcriteriaen,$educationen;
    $sql = 'UPDATE employee
    SET nama = :nama,no_hp=:nohp,email=:email,password=:password,alamat=:alamat,
    kota=:kota,propinsi=:propinsi,kodepos=:kodepos
    WHERE employee_id = :employeeid';

// prepare statement
$statement = $pdo->prepare($sql);

// bind params
$statement->bindParam(':employeeid', $employeeid, PDO::PARAM_INT);
$statement->bindParam(':nama', $nama, PDO::PARAM_STR);
$statement->bindParam(':nohp', $nohp);
$statement->bindParam(':email', $email);
$statement->bindParam(':password', $password);
$statement->bindParam(':alamat', $alamat);
$statement->bindParam(':kota', $kota);
$statement->bindParam(':propinsi', $propinsi);
$statement->bindParam(':kodepos', $kodepos);



// // execute the UPDATE statment
if ($statement->execute()) {
echo 'The publisher has been updated successfully!';
}

?>