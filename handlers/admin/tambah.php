<?php
require_once "../../koneksi.php";

session_start();

if (!(isset($_SESSION['logged_in']) && $_SESSION['role'] == "admin")) {
  header('Location: ../../public_html/views/auth/pages/login.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $description = $_POST["description"];
  $type = $_POST["type"];
  $location = $_POST["location"];
  $event_date = $_POST["event_date"];
  $event_time = $_POST["event_time"];
  $kuota_peserta = $_POST["$kuota_peserta"];

  if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
    $uuid = uniqid();
    $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $file_name = $uuid . "." . $file_extension;
    $file_tmp = $_FILES["photo"]["tmp_name"];

    $sql = "INSERT INTO event (name, description, type, location, event_date, event_time, photo, kuota_peserta_tersisa, total_kuota_peserta) VALUES ('$name', '$description', '$type', '$location', '$event_date', '$event_time', '$file_name', '$kuota_peserta', '$kuota_peserta')";

    if (mysqli_query($koneksi, $sql)) {
      $destination = "../../public_html/storage/event/" . $file_name;

      if (move_uploaded_file($file_tmp, $destination)) {
        $_SESSION['success'] = 'event_uploaded';
        header("Location: ../../public_html/views/admin/pages/kelola.php");
        exit();
      } else {
        $_SESSION['error'] = 'no_photo_uploaded';
      }
    } else {
      $_SESSION['error'] = 'event_not_uploaded';
    }
  } else {
    $_SESSION['error'] = 'no_photo_uploaded';
  }

  header("Location: ../../public_html/views/admin/pages/kelola.php");
  exit();
} else {
  $_SESSION['error'] = 'invalid_request';
  header("Location: ../../public_html/views/admin/pages/kelola.php");
  exit();
}
