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
		<h2>SENARAI TOPIK</h2>
	</center>
	<main>
		<table width="70%" border="0" align="center" style='font-size:16px'>
			<tr>
				<td width="2%"><b>Bil.</b></td>
				<td width="50%"><b>Topik</b></td>
				<td width="10%"><b>Bilangan Soalan</b></td>
				<td width="8%"><b>Tindakan</b></td>
			</tr>
			<?php
			$no = 1;
			$data1 = mysqli_query($hubung, "SELECT * FROM TOPIK");
			while ($info1 = mysqli_fetch_array($data1)) {
				$dataSoalan = mysqli_query($hubung, "SELECT COUNT(idtopik) as 'bilangan' FROM soalan WHERE idtopik='$info1[idtopik]' GROUP BY idtopik");
				$getSoalan = mysqli_fetch_array($dataSoalan);
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $info1['topik']; ?></td>
					<td><?php echo $getSoalan['bilangan']; ?></td>
					<td><?php if ($getSoalan['bilangan'] == 0) {
					} else { ?>
						<a href="soalan_mula.php?idtopik= 
					<?php echo $info1['idtopik']; ?>">
					<button>BUKA</button></a>
					<?php } ?> </td>
			</tr>
			<?php $no++;
			} ?>
		</table>
		</main>
	<center><font style='font-size:14px'> 
	* Senarai Tamat * <br/>jumlah Rekod:<?php echo $no - 1 ?>
	</font>
		</center>
	</body>
</html>