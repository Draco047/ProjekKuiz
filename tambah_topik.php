<?php
//WAJIB FAIl INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
?>

<?php
if (isset($_POST['submit'])) {
	$nom_soalan = $_POST['nom_soalan'];
	$topik = $_POST['paparan_topik'];
	$markah = $_POST['markah'];

	//QUERY TOPIK + INSERT NEW TOPIK
	$query = "INSERT INTO topik(topik,markah) values ('$topik','$markah')";
	$insert_row = mysqli_query($hubung, $query);
	$last_id = mysqli_insert_id($hubung);

	//MESEJ
	echo "<script>alert('Topik baru telah ditambah');
window.location='tambah_soalan.php?idtopik=$last_id'</script>";
}
//KIRA JUMLAH TOPIK DALAM SENARAI
$query = "SELECT * FROM topik";
$topik = mysqli_query($hubung, $query);
$total = mysqli_num_rows($topik);
$next = $total + 1;
?>

<html>

<head><?php include 'menu.php'; ?></head>

<body>
	<center>
		<h2>TAMBAH TOPIK</h2>
	</center>
	<main>
		<table width="70%" border="0" align="center" style='font-size:18px'>
			<tr>
				<td>
					<form method="post" action="tambah_topik.php">
						<p>
							<label>Topik ke-</label>
							<?php echo $next; ?>
							<input type="text" value="<?php echo $next; ?>" name="nom_soalan" hidden />
						</p>
						<p>
							<label>Topik :</label>
							<input type="text" name="paparan_topik" size="60%" required />
						</p>
						<p>
							<label>Markah :</label>
							<input type="text" name="markah" size="5%" required />
						</p>
						<p>
							<input type="submit" name="submit" value="TAMBAH" />
						</p>
					</form>
				</td>
			</tr>
			<table>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>