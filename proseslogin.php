<?php
require 'sambung.php';
include 'header.php';
session_start();

if (isset($_POST['idpengguna'])) {
  $user = $_POST['idpengguna'];
  $pass = $_POST['password'];
  $query = mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna = '$user' AND password = '$pass'");
  $row = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) == 0 || $row['password'] != $pass){
  echo "<script> window.location = 'index2.php'</script>";
}
else {
  $_SESSION['idpengguna'] = $row ['idpengguna'];
  $_SESSION['level'] = $row ['aras'];
  echo "<script> window.location = 'index2.php'</script>";
}
}
?>