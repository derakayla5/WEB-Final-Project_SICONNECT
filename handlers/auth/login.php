<?php
require "../../koneksi.php";

session_start();

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $role = $_POST["role"];
  
  if ($role === 'mahasiswa') {
    $result_mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$username'");

    if (mysqli_num_rows($result_mahasiswa) == 1) {
      $mahasiswa = mysqli_fetch_assoc($result_mahasiswa);

      if (password_verify($password, $mahasiswa['password'])) {
        $_SESSION['nama'] = $mahasiswa['nama_lengkap'];
        $_SESSION['nim'] = $mahasiswa['nim'];
        $_SESSION['role'] = 'mahasiswa';
        $_SESSION['logged_in'] = true;
        header("Location: ../../public_html/views/mahasiswa/pages/beranda.php");
        exit();
      }
    }
  } elseif ($role === 'admin') {
    $result_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");

    if (mysqli_num_rows($result_admin) == 1) {
      $admin = mysqli_fetch_assoc($result_admin);

      if (password_verify($password, $admin['password'])) {
        $_SESSION['nama'] = $admin['username'];
        $_SESSION['role'] = 'admin';
        $_SESSION['logged_in'] = true;
        header("Location: ../../public_html/views/admin/pages/beranda.php");
        exit();
      }
    }
  }

  $_SESSION['error'] = 'login_failed';
  header("Location: ../../public_html/views/auth/pages/login.php");
  exit();
}