<?php
//wajib fail ini
require 'sambung.php';
require 'keselamatan.php';
if (isset($_POST['submit'])) {
	//proses fail gambar
	if ($_FILES['gambar']['name'] == NULL) {
		$newnamepic = "";
	} else {
		$gambar = $_FILES['gambar']['name'];
		$imageArr = explode('.', $gambar);
		$random = rand(10000, 99999);
		$newnamepic = $imageArr[0] . $random . '.' . $imageArr[1];
		$uploadPath = "gambar/" . $newnamepic;
		$isUploaded = move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadPath);
	}
	//variable yang di post
	$nom_soalan = $_POST['nom_soalan'];
	$idtopik = $_POST['idtopik'];
	$soalan = $_POST['paparan_soalan'];
	//tambah rekod soalan
	$query = "INSERT INTO soalan (nom_soalan, soalan, gambarajah, idtopik) values('$nom_soalan','$soalan','$newnamepic','$idtopik')";
	$insert_row = mysqli_query($hubung, $query);
	$last_id = mysqli_insert_id($hubung);


	//variable
	$jawapan = $_POST['idJAWAPAN1'];
	$topikal = $_POST['idtopik'];

	for ($i = 0; $i <= count($jawapan); $i++) {
		if ($jawapan[$i] != "" && $topikal[$i] != "") {
			$jawapan2 = $jawapan[$i];
			$idtopikal = $topikal[$i];

			//tambah rekod ke dalam jadual pilihan
			$query = "INSERT INTO pilihan (nom_soalan, pilihan_jawapan, idsoalan, idtopik)
values('$nom_soalan','$jawapan2','$last_id', '$idtopik')";
			$insert_row = mysqli_query($hubung, $query);
		}
	}
	echo "<script>alert('Tambah soalan anda berjaya');
	window.location='tambah_soalan.php?idtopik=$idtopik' </script>";
}
