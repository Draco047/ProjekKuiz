<?php
require 'sambung.php';
//DAPATKAN ID SUBJEK
session_start();
$topik_pilihan = $_SESSION['pilih_topik'];
?>

<?php
//SEMAKAN
if (!isset($_SESSION['score'])) {
	$_SESSION['score'] = 0;
}
//BILA POST JAWAPAN DIBUAT
if ($_POST) {
	$idquestion = $_POST['idsoalan'];
	$number = $_POST['number'];
	$jawapan_taip = trim(strtoupper($_POST['idJAWAPAN']));
	$next = $number + 1;
	$total = 4;
	//KIRA JUMLAH SOALAN

	$query = "SELECT * FROM soalan
		WHERE idtopik='$topik_pilihan'";

	$results = mysqli_query($hubung, $query);
	$total = mysqli_num_rows($results);
	//DAPATKAN JAWAPAN BETUL

	$q = mysqli_query($hubung, "SELECT * FROM pilihan
WHERE idsoalan='$idquestion' AND nom_soalan = '$number'
AND pilihan_jawapan = '$jawapan_taip'");

	$row = mysqli_num_rows($q);
	$correct_choice = $row['pilihan_jawapan'];
	//BANDINGKAN
	if ($row > 0) {
		$semakan = "TEPAT";
		$_SESSION['score']++;
	}
	if ($number == $total) {
		header("Location: soalan_markah.php");
		exit();

	} else {
		header("Location: soalan_papar.php?semakan=".$semakan."&idtopik=".$topik_pilihan."&n=".$next."&score=".$_SESSION['score']);
	}
}
?>