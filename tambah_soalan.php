<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
//ID DARI URL 
$idTopik = $_GET['idtopik'];
//DAPATKAN JUMLAH SOALAN
$query = "SELECT * FROM soalan WHERE idtopik='$idTopik'";
$soalan = mysqli_query($hubung, $query);
$total = mysqli_num_rows($soalan);
$next = $total + 1;
?>

<html>
<!-- SAMBUNG KE JQUERY EXTERNAL -->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	function add_row() {
		$rowno = $("#jawapan tr").length;
		$rowno = $rowno + 1;
		$("#jawapan tr:last").after("<tr id='row" + $rowno + "'><td><input type='text' name='idJAWAPAN1[]' placeholder='Taip Cadangan Jawapan' size='70%'></td><td><input type='text' name='idTopik[]' value='<?php echo $idTopik; ?>' size='60%' hidden></td><td><input class='button' type='button' value='BUANG' onclick=delete_row('row" + $rowno + "')></td></tr>");
	}

	function delete_row(rowno) {
		$('#' + rowno).remove();
	}
</script>

<head>
	<?php include 'menu.php'; ?>
</head>
<center>
	<h2>TAMBAH SOALAN</h2>
</center>
<main>
	<table width="70%" border="0" align="center">
		<tr>
			<td>

				<body>
					<form method="post" enctype="multipart/form-data" action="tambah_proses.php">
						<p>
							<label>Bilangan Soalan</label>
							<input size='2%' type text="text" value="<?php echo $next; ?>" name="nom_soalan" readonly />
							<input type="text" value="<?php echo $idTopik; ?>" name="idtopik" hidden />
						</p>
						<label>Soalan:</label><br>
						<textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" required autofocus></textarea>
						</p>
						<p>
							<label>Gambar<small style="color:red"> *Jika perlu
								</small></label><br>
							<input type="file" name="gambar" />
						</p>
						<label>Cadangan Jawapan:<label><br>
								<small>*Klik butang <b>TAMBAH CADANGAN</b> untuk tambah jawapan</small></span><br>
								<table id="jawapan" align="left" width='30%' border="0">
									<tr id="row1">
										<td><input type="text" name="idJAWAPAN1[]" placeholder="Taip Cadangan Jawapan" size='70%'></td>
									</tr>
									<tr></tr>
								</table><br>
								<table width='100%' border="0">
									<tr>
										<td>
											<fieldset>
												<legend>MENU</legend>
												<center>
													<input class= "button" type="button" onclick="add_row();" value="TAMBAH CADANGAN">
													<input class="button" type="submit" name="submit" value="SIMPAN SOALAN">
													<input class="button" type="button" value="BATAL" onclick="window.location.href='papar_topik.php'">
												</center>
										</td>
									</tr>
								</table>
					</form>
			</td>
		</tr>
	</table>
	</body>

</html>