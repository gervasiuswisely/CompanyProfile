<?php 
$servername="Wisely";
$connectioninfo = array ("Database"=>"mykipg");
$conn=sqlsrv_connect($servername,$connectioninfo);

if ( $conn ){
    echo "sukses";
}
else{
    echo "gagal";
}
?>

