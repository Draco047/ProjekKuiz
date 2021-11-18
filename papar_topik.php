<?php
//WAJIB FAIl INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
?>
<html>

<head><?php include 'menu.php'; ?></head>

<body>
	<center>
		<h2>SENARAI TOPIK SUBJEK: <?php echo $subjek; ?></h2>
	</center>
	<main>
		<table width="70% border=" 0" align="center" style=font-size:18px'>
			<tr>
				<td colspan="4" vallign="middle" align="right" <b>
					<a href="tambah_topik.php"><button>Tambah Topik Baru</button></a></b>
				</td>
			</tr>
			<tr>
				<td width="2%"><b>Bil.</b></td>
				<td width="40%"><b>Topik</b></td>
				<td width="14%"><b>Pengurusan Soalan</b></td>
				<td width="14%"><b>Pegurusan Topik</b></td>
			</tr>
			<?php
			$no = 1;
			$data1 = mysqli_query($hubung, "SELECT * FROM topik");
			while ($info1 = mysqli_fetch_array($data1)) {
			?>
				<tr>
					<td><?php echo $no; ?> </td>
					<td><?php echo $info1['topik']; ?></td>
					<td>
						<a href="tambah_soalan.php?idtopik=<?php echo $info1['idtopik']; ?>"> <button>Tambah</button> </a>
						<a href="papar_soalan.php?idtopik=<?php echo $info1['idtopik']; ?>"> <button>Papar</button> </a>
					</td>
					<td>
						<a href="edit_topik.php?idtopik=<?php echo $info1['idtopik']; ?>"> <button>Edit</button> </a>
						<a href="hapus_topik.php?idtopik=<?php echo $info1['idtopik']; ?>"> <button>Hapus</button> </a>
					</td>
				</tr>
			<?php $no++;
			} ?>
		</table>
	</main>
	<br>
	<center>
		<font style='font-size:14px'>*Senarai Tamat*<br />Jumlah Rekod:<?php echo $no - 1 ?> </font>
	</center>
</body>

</html>