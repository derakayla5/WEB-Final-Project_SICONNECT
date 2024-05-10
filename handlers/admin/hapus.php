<?php
require_once "../../koneksi.php";

session_start();

if (!(isset($_SESSION['logged_in']) && $_SESSION['role'] == "admin")) {
  header('Location: ../../public_html/views/auth/pages/login.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
  $id = $_POST['id'];

  $sql = "DELETE FROM event WHERE id = '$id'";

  if (mysqli_query($koneksi, $sql)) {
    $_SESSION['success'] = 'event_deleted';
    header("Location: ../../public_html/views/admin/pages/kelola.php");
    exit();
  } else {
    $_SESSION['error'] = 'invalid_request';
    header("Location: ../../public_html/views/admin/pages/kelola.php");
    exit();
  }
} else {
  $_SESSION['error'] = 'invalid_request';
  header("Location: ../../public_html/views/admin/pages/kelola.php");
  exit();
}
