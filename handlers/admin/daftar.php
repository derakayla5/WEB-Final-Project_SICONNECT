<?php
require_once "../../koneksi.php";

session_start();

if (!(isset($_SESSION['logged_in']) && $_SESSION['role'] == "mahasiswa")) {
  header('Location: ../../public_html/views/auth/pages/login.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["id"]) && isset($_POST["url"])) {
    $id = $_POST['id'];

    $sql = "SELECT kuota_peserta_tersisa FROM event WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $kuota_tersisa = $row['kuota_peserta_tersisa'] - 1;

      $sql_update = "UPDATE event SET kuota_peserta_tersisa = '$kuota_tersisa' WHERE id = '$id'";
      $update_result = mysqli_query($koneksi, $sql_update);

      if($update_result){
        $wa_link = $_POST['url'];
        header("Location: $wa_link");
        exit();
      } else {
        header('Location: ../../public_html/views/mahasiswa/pages/lihat_upcoming.php');
        exit();
      }
    } else {
      header('Location: ../../public_html/views/mahasiswa/pages/lihat_upcoming.php');
      exit();
    }
  } else {
    header('Location: ../../public_html/views/mahasiswa/pages/lihat_upcoming.php');
    exit();
  }
} else {
  header('Location: ../../public_html/views/mahasiswa/pages/lihat_upcoming.php');
  exit();
}
