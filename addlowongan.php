<?php
require 'connectpostgre.php';
require_once 'config.php';
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
    $ceklowongan=$pdo->query("select * from lowongan_kerja");
    $ceklowongan->execute();
    $data=$ceklowongan->fetchAll();
        foreach($data as $value){
                 if($job_id==$value['job_id']){
                    $status=1;
                     echo'
                             <script>
                         alert("lowongan kerja sudah pernah ditambahkah")
                     window.location.href="formlowongan.php"
        </script>';
            }
                else{
                    $status++;
                }
        }
        if($status>1){
            $sql='INSERT INTO lowongan_kerja(job_id,job_name,salary_min,salary_max,job_desc,job_criteria,job_status,education,year_experience,kriteria_umum,deskripsi_umum,jobdescen,jobcriteriaen,educationen) values (:job_id,:position,:salarymin,:salarymax,:pekerjaan,:kriteria,:jobstatus,:pendidikan,:pengalamankerja,:kriteriaumum,:deskripsi,:jobdes,:jobcriteriaen,:educationen)';
            $stmt=$pdo->prepare($sql);
            $stmt->execute([':job_id'=>$job_id,':position'=>$position,':salarymin'=>$salarymin,':salarymax'=>$salarymax,':pekerjaan'=>$pekerjaan,':kriteria'=>$kriteria,':jobstatus'=>$jobstatus,':pendidikan'=>$pendidikan,':pengalamankerja'=>$pengalamankerja,':kriteriaumum'=>$kriteriaumum,':deskripsi'=>$deskripsi,':jobdes'=>$jobdes,':jobcriteriaen'=>$jobcriteriaen,':educationen'=>$educationen]);
    
            if($stmt){
                echo'
                <script>
                alert("Berhasil menambahkan lowongan")
                window.location.href="careeradmin.php"
                </script>';
             } else{
                 echo '
                 <script>
                     alert("Gagal menambahkan Lowongan");
                     window.location.href="formlowongan.php";
                 </script> ';
             }
        }
  

?>









