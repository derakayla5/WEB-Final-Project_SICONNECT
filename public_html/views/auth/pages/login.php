<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['role'] == "mahasiswa") {
  header('Location: ../../mahasiswa/pages/beranda.php');
} else if (isset($_SESSION['logged_in']) && $_SESSION['role'] == "admin") {
  header('Location: ../../admin/pages/beranda.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In | Seminar & Workshop Sitem Informasi Universitas Mulawarman</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body>
  <div class="contaier-fluid d-flex align-items-center flex-column justify-content-center" style="height: 100vh;">
    <div class="card border-0 w-100" style="padding: 3rem 6rem;">
      <?php
      if (isset($_SESSION['error']) && $_SESSION['error'] == 'login_failed') {
      ?>
        <div class='alert alert-danger position-absolute z-3 w-50 text-center' role='alert' style="left: 50%; transform: translateX(-50%); top:11%;">
          Log in salah. Silakan coba lagi.
        </div>
      <?php
        unset($_SESSION['error']);
      }

      if (isset($_SESSION['error']) && $_SESSION['error'] == 'access_denied') {
      ?>
        <div class='alert alert-danger position-absolute z-3 w-50 text-center' role='alert' style="left: 50%; transform: translateX(-50%); top:11%;">
          Silakan log in untuk melihat seminar & workshop.
        </div>
      <?php
        unset($_SESSION['error']);
      }
      ?>

      <div class="d-flex shadow-lg rounded">
        <!-- Dekorasi -->
        <div class="d-flex flex-column align-items-center justify-content-center text-center" style="width: 30%;">
          <img src="../../../assets/icons/si_connect.png" alt="" class="mb-3" style="height: 125px;">

          <h6>
            <b>
              Seminar & Workshop <br>
              Sistem Informasi <br>
              Universitas Mulawarman
            </b>
          </h6>
        </div>

        <!-- Form log in -->
        <div style="background-color: var(--cream); width: 70%;">
          <div class="d-flex flex-column h-100" style="padding: 12vh 10vh;">
            <!-- <div class="d-flex align-items-center mb-4">
              <img src="https://si.ft.unmul.ac.id/image/unmul2.png" alt="" class="img-fluid me-4" style="height: 100px;">

              <h3 class="m-0">
                Seminar & Workshop <br>
                Sistem Informasi <br>
                Universitas Mulawarman
              </h3>
            </div> -->

            <h4 class="fw-bold mt-4 mb-4">
              Silakan Log In
            </h4>

            <form action="../../../../handlers/auth/login.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label fw-semibold">Username</label>
                <input type="text" name="username" class="form-control rounded-3 py-2 border-0" id="username" placeholder="Masukkan NIM Anda">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control rounded-3 py-2 border-0" id="password" placeholder="Masukkan password Anda">
              </div>
              <div class="mb-4">
                <label class="form-label fw-semibold me-3">Log in sebagai: </label>

                <div class="d-flex">
                  <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="role" id="mahasiswa" value="mahasiswa" checked>
                    <label class="form-check-label" for="mahasiswa">
                      Mahasiswa
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                    <label class="form-check-label" for="admin">
                      Admin
                    </label>
                  </div>
                </div>
              </div>
              
              <div class="d-flex justify-content-center">
                <button type="submit" name="login" class="btn btn-primary px-5 rounded-pill fw-semibold" style="background-color: var(--blue);">Masuk</a>
              </div>
            </form>

            <div class="d-flex justify-content-center align-items-center h-100">
              <!-- <p class="m-0 fw-semibold">
                Akses website Sistem Informasi <a href="https://si.ft.unmul.ac.id/">di sini</a>
              </p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>