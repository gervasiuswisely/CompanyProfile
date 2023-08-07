<?php
session_start();
session_destroy();

echo'
<script>
alert("Anda berhasil logout sebagai admin");
window.location.href="login.php";
</script>
';

?>