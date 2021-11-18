<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
?>

<html>

<head><?php include 'menu.php'; ?></head>

<body>
	<center>
		<h2>IMPORT NAMA PELAJAR DARI FAIL CSV</h2>
	</center>
	<main>
		<table width="70%" border="0" align="center">
			<tr>
				<td>
					<label>Kemudahan untuk daftar nama pelajar secara berkelompok</label><br>
					<label>Pilih lokasi fail CSV/Excel:</label>

					<!-- PANGGIL FAIL CSV UNTUK LAKSANAKAN ARAHAN IMPORT -->
					<form action="import_csv.php" method="post" name="upload_excel" enctpye="multipart/form-data">
						<input type="file" name="file" id="file" class="input-large"><br>

						<button type="submit" id="submit" name="import">Upload
						</button>
						<center>
					</form>

					*Cipta fail dalam Ms Ecxell dan save as csv mengikut aturan lajur seperti di bawah :
					<table width="70%" border="1" align="center">
						<tr>
							<td>Nombor KP</td>
							<td>Kata Laluan</td>
							<td>Nama</td>
							<td>Jantina</td>
						</tr>
						<tr>
							<td>111213031234</td>
							<td>1234</td>
							<td>SITI NORHALIZA BINTI SAMAD</td>
							<td>PEREMPUAN</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>