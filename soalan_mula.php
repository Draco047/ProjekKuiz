<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//ID TOPIK
$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilih_topik'] = $topik_pilihan;
//TABLE TOPIK
$dataTopik = mysqli_query($hubung, "SELECT * FROM topik WHERE idtopik=$topik_pilihan");
$getTopik=mysqli_fetch_array($dataTopik);

//TABLE SOALAN
$dataSoalan = mysqli_query($hubung, "SELECT*FROM soalan WHERE idtopik=$getTopik[idtopik]");
$getSoalan = mysqli_fetch_array($dataSoalan);
$total = mysqli_num_rows($dataSoalan);
?>

<html>

<body>
	<center>
		<h2>TOPIK: <?php echo $getTopik['topik']; ?></h2>
	</center>

	<table width="70%" border="0" align="center">
		<tr>
			<td>
				<h2>Arahan kepada Pelajar:</h2>
				<p>Jawapan semua soalan. Pilih jawapan yang terbaik.</p>
				<br><strong>Jumlah soalan:</strong><?php echo $total; ?>
				<br><strong>Jenis Soalan: </strong>Berbilang Jawapan dan Benar/Palsu
				<br><strong>Peruntukan Masa:</strong>
				<?php echo $total * 0.5; ?> minit
				<br><br>

				<button onclick="window.location.href='soalan_papar.php?n=1&idtopik=<?php echo $topik_pilihan; ?>&total=<?php echo$total; ?>'">MULAKAN</button>
				<input type="button" value="BATAL" onclick="history.back
()" />
			</td>
		</tr>
	</table>
	<?php include 'footer.php'; ?>
</body>

</html>