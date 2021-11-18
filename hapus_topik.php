<?php
require 'sambung.php';
require 'keselamatan.php';
$idtopik = $_GET['idtopik'];
//laksana delete
$result1 = mysqli_query($hubung, "DELETE FROM topik WHERE idtopik='$idtopik'");
$result2 = mysqli_query($hubung, "DELETE FROM soalan WHERE idtopik='$idtopik'");
$result3 = mysqli_query($hubung, "DELETE FROM pilihan WHERE idtopik='$idtopik'");
$result4 = mysqli_query($hubung, "DELETE FROM perekodan WHERE idtopik='$idtopik'");
//mesej pop up
echo "<script>alert('Hapus topik berjaya');
	window.location='papar_topik.php'</script>";
?>