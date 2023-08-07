<?php
require_once'connectsqlexpress.php';
$sql="select * from pegawai";
$query=sqlsrv_query($conn,$sql) or die (sqlsrv_errors());;

while ($data=sqlsrv_fetch_array($query)){
?>
<tr>
<td><?php echo $data['id'];?></td>
<td><?php echo $data['nama'];?></td>
</tr>
<?php
}
?>




