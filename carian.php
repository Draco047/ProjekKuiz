<?php
if (isset($_POST['SUBMIT'])) {
    $jumpakp = $_POST['carikp'];
?>
    <hr>
    <center>
        <h2>HASIL CARIAN</h2>
    </center>
    <table width="70%" border="0" align="center">
        <tr>
            <td><b>Bil.</b></td>
            <td><b>ID Pelajar</b></td>
            <td><b>Password</b></td>
            <td><b>Nama Pelajar</b></td>
            <td><b>Jantina</b></td>
        </tr>
        <?php
        #PANGGIL TABLE PERSERTA
        $no = 1;
        $data1 = mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna='$jumpakp' ORDER BY nama ASC");
        while ($info1 = mysqli_fetch_array($data1)) {
        ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $info1['idpengguna']; ?></td>
                <td><?php echo $info1['password']; ?></td>
                <td><?php echo $info1['nama']; ?></td>
                <td><?php echo $info1['jantina']; ?></td>
            </tr>
        <?php $no++;
        } ?>
    </table>
    <hr>
<?php } ?>

<html>
<form method="post">
    <table width="70%" border=0 align="center">
        <tr>
            <td colspan="5" valign="middle" align="right"><b>
                    CARIAN NO.K/P:
                    <input type="text" name="carikp" maxLength='12'>
                    <input type="submit" name="SUBMIT" value="CARI">
</form>

</html>