<?php
//WAJIB FAIL INI
require 'sambung.php';
//PERLUKAN FAIL INI
include 'header.php';
?>

<?php session_start(); ?>

<?php

//DAPATKAN ID TOPIK
$topik_pilihan = $_SESSION['pilih_topik'];

//TABLE TOPIK
$dataTopik = mysqli_query($hubung, "SELECT * FROM soalan AS q INNER JOIN topik AS t ON t.idtopik = q.idtopik WHERE t.idtopik=$topik_pilihan GROUP BY q.idsoalan");
$getSoalan = mysqli_fetch_array($dataTopik);
//JUMLAH BILANGAN SOALAN
$total = mysqli_num_rows($dataTopik);

//TETAPKAN NOM SOALAN
$number = (int) $_GET['n'];

//DAPATKAN SOALAN
$query1 = mysqli_query($hubung, "SELECT * FROM soalan
WHERE nom_soalan = $number AND idtopik= $topik_pilihan");
$question = mysqli_fetch_assoc($query1);

//DAPATKAN PILIHAN JAWAPAN
$query2 = mysqli_query($hubung, "SELECT * FROM pilihan AS c INNER JOIN soalan AS q ON c.idsoalan= q.idsoalan WHERE q.nom_soalan = $number AND c.idsoalan=$question[idsoalan]");

//DAPATKAN JAWAPAN
$choices = $query2;
?>

<html>

<body>
	<center>
		<h2>TOPIK: <?php echo $getSoalan['topik']; ?></h2>
	</center>
	<table width="70%" border="0" align="center">
		<tr>
			<td><?php
				//RESPON JAWAPAN BETUL ATAU TIDAK
				if ($number == 1) {
					echo "Sila baca soalan dengan teliti";
				} else {
					$jawapan = $_GET['semakan'];
					if ($jawapan == "TEPAT") {
						echo "Tahniah, jawapan bagi soalan ";
						echo $number - 1;
						echo " adalah <font color='blue'>TEPAT </font>";
					} else {
						echo "Maaf, jawapan bagi soalan ";
						echo $number - 1;
						echo " adalah <font color='red'>SALAH</font>";
					}
				}
				?>
			</td>
		</tr>
		<tr>
			<td>
				Soalan <?php echo $number; ?> dari <?php echo $total; ?>
				<br><br><?php echo $question['soalan'] ?><br>
				<?php
				if ($question['gambarajah'] == NULL) {
				} else {
					echo "<img src='gambar/" . $question['gambarajah'] . " 'width='30%' height='30%'/>";
				}
				?>
				<form method="post" action="soalan_semak.php">
					<input type="text" name="idJAWAPAN" placeholder="Taip Jawapan Di sini" size='70%'>
					<br><br>
					<input type="submit" value="HANTAR">
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					<input type="hidden" name="idsoalan" value="<?php echo $question['idsoalan']; ?>">
				</form>
			</td>
		</tr>
	</table>
	<?php include 'footer.php'; ?>
</body>

</html>