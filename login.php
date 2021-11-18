<?php
//WAJIB FAIL INI
require 'sambung.php';
//PERLUKAN FAIL INI
include 'header.php';
?>

<html>
	<head><?php include 'menu1.php' ?></head>
	<body>
		<center><h2>LOG MASUK PENGGUNA</h2></center>
		  <main>
<table width="70%" border="0" align="center">
	<tr><td>
   <form action="proseslogin.php" method="post">
   Nombor Kad Pengenalan:<br>
	<input onblur="checkLength(this)" type="text"name="idpengguna" placeholder="Nombor KP Tanpa -"maxlength='12' size="25"onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
		<script>
			function checkLength(el) {
			if (el.value.length != 12) {
				alert("Nombor KP mesti 12 digit")
			}
			}
		</script>
	<br><br>
   Katalaluan: <br>
	<input type="password" name="password"
	placeholder="4 Digit" maxlength='4'size="10"
	onkeypress='return event.charCode >= 48 &&
	event.charCode <= 57' required>
	<br><br>
	<button type="submit">DAFTAR MASUK</button>
	<button type="reset">RESET</button><br>
	<h5>*Jika belum mendaftar, <a href="daftar_baru.php">Daftar di sini</a></h5></br>
	</form>
</td></tr>
</table>
<?php include 'footer.php';?>
</body>
</html>