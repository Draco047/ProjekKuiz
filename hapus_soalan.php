<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';

//Dapatkan ID dari URL
$soalan_terpilih = $_GET['idsoalan'];

//Hapus rekod soalan + pilihan
$hapusSoalan = mysqli_query($hubung, "DELETE soalan,pilihan FROM soalan INNER JOIN pilihan ON soalan.idsoalan = pilihan.idsoalanWHERE soalan.idsoalan='$soalan_terpilih'");

//Papar mesej jika berjaya hapus
echo "<script>alert('Hapus soalan berjaya');
window.location='papar_topik.php'</script>";
