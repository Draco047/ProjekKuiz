<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//REKOD YANG DIPOST
if (isset($_POST['submit'])) {
    $picAsal = $_POST['gambarAsal'];
    if ($_FILES['gambar']['name'] == NULL) {
        $newnamepic = $picAsal;
    } else {
        $gambar = $FILES['gambar']['name'];
        //PROSES FAIL GAMBAR
        $imageArr = explode('.', $gambar);
        $random = rand(10000, 99999);
        $newnamepic = $imageArr[0] . $random . '.' . $imageArr[1];
        $uploadPath = "gambar/" . $newnamepic;
        $isUploaded = move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadPath);
    }
    //NILAI YANG DI POST
    $idsoalan = $_POST['idsoalan'];
    $soalan = $_POST['paparan_soalan'];
    //KEMASKINI DENGAN REKOD BARU
    $result = mysqli_query($hubung, "UPDATE soalan SET nom_soalan=nom_soalan,soalan='$soalan',
gambarajah='$newnamepic',idtopik=idtopik WHERE idsoalan='$idsoalan'");
    //MESEJ POP UP
    echo "<script>alert('Soalan berjaya dikemaskini');
window.location='papar_topik.php'</script>";
}
