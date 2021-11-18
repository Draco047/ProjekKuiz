<?php require 'sambung.php'; ?>
<table width="100%" border="0" align="center">
	<tr style='font-size:14px'>
		<td width="3%"><b>Bil.</b></td>
		<td width="97%"><b>Topik</b></td>
	</tr>
	<?php
		$no=1;
		$data1=mysqli_query($hubung,"SELECT * FROM topik ORDER BY idtopik desc limit 0,10");
		while ($info1=mysqli_fetch_array($data1)){
			?>
		<tr style='font-size:14px'>
			<td><?php echo $no; ?></td>
			<td><?php echo $info1['topik']; ?></td>
		</tr>
		<?php $no++; } ?>
</table>
<br>
<center><font style='font-size:14px'>
*Rekod yang dipaparkan adalah 10 yang terkini sahaja* <br/>
Jumlah Rekod:<?php echo $no-1; ?>
</font>
</center>