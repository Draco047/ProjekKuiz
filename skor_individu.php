<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
//PANGGIL SESI
$idpengguna=$_SESSION['idpengguna'];
?>

<html>
	<body>
<center><?php include 'menu.php'; ?>
<h2>REKOD MARKAH YANG DICAPAI</h2></center>
	<main>
<table width="70%" border="0" align="center"
style="font-size:16px">
<tr>
	<td width="2%"><b>Bil.</b></td>
	<td width="50%"><b>Topik</b></td>
	<td width="10%"><b>Tarikh/Masa</b></td>
	<td width="3%"><b>Skor</b></td>
	<td width="5%"><b>Markah</b></td>
</tr>
<?php
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM perekodan
WHERE idpengguna='$idpengguna' ORDER  BY catatan_masa DESC
limit 0,10");
while ($info1=mysqli_fetch_array($data1))
		{
			
//TABLE TOPIK
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik
WHERE idtopik='$info1[idtopik]'");
$getTopik=mysqli_fetch_array($dataTopik);

//TABLE SOALAN
$dataSoalan=mysqli_query($hubung,"SELECT COUNT(idtopik)
AS 'bil' FROM soalan WHERE idtopik='$info1[idtopik]'");
$getBilSoalan=mysqli_fetch_array($dataSoalan);
//LETAK VALUE PADA VARIABLE
$bilSoalan=$getBilSoalan['bil'];
$markah_Topik=$getTopik['markah'];
?>
	<tr style='font-size:14px'>
		<td><?php echo $no; ?></td>
		<td><?php echo $getTopik['topik']; ?></td>
		<td><?php echo date('d-m-Y g:i:A', strtotime($info1['catatan_masa'])); ?></td>
		<td><?php echo $info1['skor']; ?></td>
		<td><?php echo number_format(($info1['skor']/
		$bilSoalan)*$markah_Topik); ?>%</td>
	</tr>
	
<?php $no++; } ?>
</table>
</main>
<center><font style='font-size:14px'>
* Rekod yang dipaparkan adalah 10 yang terakhir *
<br>Jumlah Rekod:<?php echo $no-1; ?></font>
</center>
</body>
</html>