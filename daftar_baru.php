<?php
//WAJIB FAIL INI
require 'sambung.php';
//PERLUKAN FAIL INI
include 'header.php';
//POST VALUE
if (isset($_POST['idpengguna'])) {
	$idpengguna = $_POST['idpengguna'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$jantina = $_POST['jantina'];
	//TAMBAH REKOD
	$daftar = "INSERT INTO pengguna(idpengguna,password,nama,jantina,aras) VALUES ('$idpengguna','$password','$nama','$jantina','PELAJAR')";
	//LAKSANAKAN ARAHAN SQL
	$hasil = mysqli_query($hubung, $daftar);
	//MESEJ POP UP
	if ($hasil) {
		echo "<script>alert('Pendaftaran berjaya');
		window.location='login.php' </script>";
	} else {
		echo "<script>alert('Pendaftaran gagal');
		window.location='daftar_baru.php' </script>";
	}
}
?>

<html>

<head><?php include 'menu1.php' ?></head>

<body>
	<center>
		<h2>PENDAFTARAN PENGGUNA BARU</h2>
	</center>
	<table width="70%" border="0" align="center">
		<tr>
			<td>
				<!-- Papar Borang Pendaftaran -->
				<form method="POST">
					<label>Nombor Kad Pengenalan</label><br>
					<input type="text" name="idpengguna" placeholder="Nombor tanpa tanda -" maxlength='12' minlength='12' onkeypress='return event.charCode >= 48 && event.charCode <=57' required autofocus>
					<br>
					<label>Kata Laluan</label><br>
					<input type="password" name="password" id="password" placeholder="4 Digit Sahaja" maxlength='4' onkeypress='return event.charCode >= 48 && event.charCode <=57' required>
					<br>
					<label>Nama Pelajar</label><br>
					<input type="text" name="nama" placeholder="Nama Penuh Anda" required>
					<br>
					<label>Jantina</label><br>
					<select name="jantina">
						<option value="">---Pilih---</option>
						<option value="LELAKI">LELAKI</option>
						<option value="PEREMPUAN">PEREMPUAN</option>
					</select>
					<br><br><input type="reset" value="Reset">
					<button type="submit">Daftar</button><br><br>
					<font color='blue'>*Pastikan maklumat anda betul sebelum membuat pendaftaran.</font>
				</form>
			</td>
		</tr>
	</table>
	<?php include 'footer.php' ?>
</body>

</html>