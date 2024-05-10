<?php
require_once "../../koneksi.php";

session_start();

if (!(isset($_SESSION['logged_in']) && $_SESSION['role'] == "admin")) {
  header('Location: ../../public_html/views/auth/pages/login.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $name = $_POST["name"];
  $description = $_POST["description"];
  $type = $_POST["type"];
  $location = $_POST["location"];
  $event_date = $_POST["event_date"];
  $event_time = $_POST["event_time"];
  $kuota_peserta_old = $_POST["kuota_peserta_old"];
  $kuota_peserta_new = $_POST["kuota_peserta_new"];
  $kuota_peserta_tersisa_old = $_POST["kuota_peserta_tersisa"];

  $kuota_peserta_terisi = $kuota_peserta_old - $kuota_peserta_tersisa_old;
  $kuota_peserta_tersisa_new = $kuota_peserta_new - $kuota_peserta_terisi;

  if ($kuota_peserta_new < $kuota_peserta_terisi) {
    $_SESSION['error'] = 'insufficient_quota';
    header("Location: ../../public_html/views/admin/pages/kelola.php");
    exit();
  }

  $sql = "";

  if (isset($_FILES["photo"]) && $_FILES["photo"]["size"] > 0) {
    $uuid = uniqid();
    $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $file_name = $uuid . "." . $file_extension;
    $file_tmp = $_FILES["photo"]["tmp_name"];

    $sql = "UPDATE event SET name='$name', description='$description', type='$type', location='$location', event_date='$event_date', event_time='$event_time', photo='$file_name', total_kuota_peserta='$kuota_peserta_new', kuota_peserta_tersisa='$kuota_peserta_tersisa_new' WHERE id='$id'";

    $destination = "../../public_html/storage/event/" . $file_name;

    if (move_uploaded_file($file_tmp, $destination)) {
      if (mysqli_query($koneksi, $sql)) {
        $_SESSION['success'] = 'event_updated';
        header("Location: ../../public_html/views/admin/pages/kelola.php");
        exit();
      } else {
        $_SESSION['error'] = 'event_not_updated';
        header("Location: ../../public_html/views/admin/pages/kelola.php");
        exit();
      }
    } else {
      $_SESSION['error'] = 'no_photo_updated';
      header("Location: ../../public_html/views/admin/pages/kelola.php");
      exit();
    }
  } else {
    $sql = "UPDATE event SET name='$name', description='$description', type='$type', location='$location', event_date='$event_date', event_time='$event_time', total_kuota_peserta='$kuota_peserta_new', kuota_peserta_tersisa='$kuota_peserta_tersisa_new' WHERE id='$id'";

    if (mysqli_query($koneksi, $sql)) {
      $_SESSION['success'] = 'event_updated';
      header("Location: ../../public_html/views/admin/pages/kelola.php");
      exit();
    } else {
      $_SESSION['error'] = 'event_not_updated';
      header("Location: ../../public_html/views/admin/pages/kelola.php");
      exit();
    }
  }
} else {
  $_SESSION['error'] = 'invalid_request';
  header("Location: ../../public_html/views/admin/pages/kelola.php");
  exit();
}
