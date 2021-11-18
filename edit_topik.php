<?php
//wajib fail ini
require 'sambung.php';
require 'keselamatan.php';

//perlukan fail ini_get
include 'header.php';
?>
<?php
if (isset($_POST['update'])) {
	$idtopik = $_POST['idtopik'];
	$topikBaru = $_POST['paparan_topik'];
	$markahBaru = $_POST['markah'];
	//kemaskini dengan rekod baru
	$result = mysqli_query($hubung, "UPDATE topik SET topik='$topikBaru',markah='$markahBaru' WHERE idtopik='$idtopik'");
	//papar mesej jika rekod berjaya dikemaskini
	echo "<script>alert('Kemaskini rekod telah berjaya');
	window.location='papar_topik.php'</script>";
}
?>
<?php
//dapatkan id soalan
$topikEdit = $_GET['idtopik'];
//pilih data berdasarkan pada id rekod
$pilihTopik = mysqli_query($hubung, "SELECT * FROM topik WHERE idtopik=$topikEdit");
while ($dataTopik = mysqli_fetch_array($pilihTopik)) {
	//paparkan nilai asal
	$idTOPIK = $topikEdit;
	$editTOPIK = $dataTopik['topik'];
	$editMARKAH = $dataTopik['markah'];
}
?>
<html>

<head><?php include 'menu.php'; ?></head>

<body>
	<center>
		<h2>KEMASKINI TOPIK</h2>
	</center>
	<main>
		<table width="70%" border="0" align="center" style='font-size:18px'>
			<tr>
				<td>
					<form method="post" action="edit_topik.php">
						<p>
							<label>Topik :</label>
							<input type="text" name="paparan_topik" size="60%" value="<?php echo $editTOPIK; ?>" />
						</p>
						<p>
							<label>Markah :</label>
							<input type="text" name="markah" size="5%" value="<?php echo $editMARKAH; ?>" />
						</p>
						<p>
							<input type="hidden" name="idtopik" value="<?php echo $idTOPIK; ?>" />
							<input type="submit" name="update" value="KEMASKINI" />
							<input type="button" value="BATAL" onclick="history.back()" />
						</p>
					</form>
				</td>
			</tr>
		</table>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>