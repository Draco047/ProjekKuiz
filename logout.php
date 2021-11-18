<?php
//TAMATKAN SESI LOGIN
session_destroy();
//LENCONGKAN KE FAIL UTAMA
header("location:index.php");
?>