<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "si_connect fix";
  $koneksi = mysqli_connect($server, $username, $password, $database);

  if(!$koneksi) {
    die("Gagal terhubung ke database" . mysqli_connect_error());
  }
?>