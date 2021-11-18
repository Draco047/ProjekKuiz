<?php
//SETUP PANGKALAN DATA
//TIDAK PERLU UBAH
$host = "localhost";
$user = "root";
//BIARKAN KOSONG JIKA GUNA XAMPP
$password = "";
//NAMA P.DATA-BOLEH UBAH
$database = "projekkuiz";
////////////////////////
$hubung = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
	echo "Proses sambung ke pangkalan data gagal";
	exit();
}
////////////////////////
//PENEPATAN SISTEM ANDA
$lencana = "lencana.jpeg";
$subjek = "Matematik Tingkatan 1";
$nama_sekolah = "SMK (L) Methodist, <BR> Jalan Hang Jebat, <BR> 50150 Kuala Lumpur, <BR> Wilayah Persekutuan Kuala Lumpur.";
$nama_sistem = "EduQuiz";
$motto_sistem = "FORMAT:SOALAN ISI TEMPAT KOSONG";
$footer = "Self Monitoring Learning System";

$logo = "logo.png";
