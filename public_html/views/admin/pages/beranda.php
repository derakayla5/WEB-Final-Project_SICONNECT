<?php
require "../../../../koneksi.php";

session_start();

if (!(isset($_SESSION['logged_in']) && $_SESSION['role'] == "admin")) {
  header('Location: ../../auth/pages/login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | Dashboard SI Connect</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="../../../assets/css/main.css">

  <style>
    .active {
      background-color: var(--purple) !important;
    }
  </style>
</head>

<body>
  <div class="d-flex flex-row">
    <!-- Sidebar -->
		<div class="d-flex flex-column py-3 shadow px-4" style="position: fixed; top: 0; bottom: 0; left: 0; width: 200px; background-color: #f8f9fa; z-index: 1000; overflow-y: auto; padding-top: 20px;">
      <a href="/" class="mb-3 text-white text-decoration-none text-center">
        <span class="fs-3 fw-bold text-black">Dashboard</span>
      </a>

      <div class="ms-4">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a href="beranda.php" class="ps-0 nav-link active text-black fw-semibold" aria-current="page">
              <i class="fa-solid fa-house me-2"></i>
              Beranda
            </a>
          </li>
          <li>
            <a href="kelola.php" class="ps-0 nav-link text-black fw-semibold">
              <i class="fa-solid fa-bars-progress me-2"></i>
              Kelola
            </a>
          </li>
        </ul>
      </div>
    </div>

		<div class="d-flex flex-column w-100" style="margin-left: 200px;">
      <nav class="navbar navbar-expand-lg w-100" style="height: 60px;">
        <div class="container-fluid d-flex justify-content-end mx-4">
          <div class="navbar-nav">
            <a class="fw-bold text-decoration-none text-reset" href="../../../../handlers/auth/logout.php"><i class="fa-solid fa-right-from-bracket me-1"></i> Log out</a>
          </div>
        </div>
      </nav>

      <main>
        <div style="background-color: var(--blue);">
          <div class="mx-4 py-4">
            <h2 class="m-0 fw-bold text-white mb-2">Beranda</h2>
            <h5 class="m-0 text-white">Lihat informasi website di sini</h5>
          </div>
        </div>

        <div class="p-0 m-5">
          <div class="row row-cols-1 row-cols-md-3 g-5">
            <div class="col">
              <div class="border-4 border-start border-primary card shadow rounded-3 border-0">
                <div class="card-body d-flex justify-content-start">
                  <div class="my-auto me-3">
                    <!-- <i class="fa-solid fa-list fa-2xl text-secondary"></i> -->
                    <p class="card-text fs-1 fw-bold">10</p>
                  </div>

                  <div class="my-auto">
                    <h5 class="card-title m-0">
                      Jumlah <br>
                      Seminar & Workshop
                    </h5>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="border-4 border-start border-success card shadow rounded-3 border-0">
                <div class="card-body d-flex justify-content-start">
                  <div class="my-auto me-3">
                    <!-- <i class="fa-solid fa-list fa-2xl text-secondary"></i> -->
                    <p class="card-text fs-1 fw-bold">5</p>
                  </div>

                  <div class="my-auto">
                    <h5 class="card-title m-0">
                      Upcoming <br>
                      Seminar & Workshop
                    </h5>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="border-4 border-start border-warning card shadow rounded-3 border-0">
                <div class="card-body d-flex justify-content-start">
                  <div class="my-auto me-3">
                    <!-- <i class="fa-solid fa-list fa-2xl text-secondary"></i> -->
                    <p class="card-text fs-1 fw-bold">5</p>
                  </div>

                  <div class="my-auto">
                    <h5 class="card-title m-0">
                      Past <br>
                      Seminar & Workshop
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();

    AOS.init({
      duration: 750,
    })
  </script>
</body>

</html>