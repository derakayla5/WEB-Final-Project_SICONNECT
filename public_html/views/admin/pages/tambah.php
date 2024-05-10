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
  <title>Kelola | Dashboard SI Connect</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="../../../assets/css/main.css">
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
            <a href="beranda.php" class="ps-0 nav-link text-black fw-semibold" aria-current="page">
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
            <h2 class="m-0 fw-bold text-white mb-2">Tambah Seminar & Workshop</h2>
            <h5 class="m-0 text-white">Tambah seminar & workshop di sini</h5>
          </div>
        </div>

        <div class="p-0 m-5">
          <form action="../../../../handlers/admin/tambah.php" method="POST" enctype="multipart/form-data">
            <div class="d-flex">
              <div class="w-75 me-3">
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea class="form-control" id="description" name="description" rows="8" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="location" class="form-label">Lokasi</label>
                  <input type="text" class="form-control" id="location" name="location" required>
                </div>
              </div>

              <div class="w-25">
                <div class="mb-3">
                  <label for="photo" class="form-label">Foto</label>
                  <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>

                <div class="mb-3">
                  <label for="type" class="form-label">Tipe</label>
                  <select class="form-select" id="type" name="type" required>
                    <option value="">Pilih Tipe Acara</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Talkshow">Talkshow</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="event_date" class="form-label">Tanggal Pelaksanaan</label>
                  <input type="date" class="form-control" id="event_date" name="event_date" required>
                </div>
                <div class="mb-3">
                  <label for="event_time" class="form-label">Waktu Pelaksanaan</label>
                  <input type="time" class="form-control" id="event_time" name="event_time" required>
                </div>
                <div class="mb-3">
                  <label for="kuota_peserta" class="form-label">Kuota Peserta</label>
                  <input type="number" class="form-control" id="kuota_peserta" name="kuota_peserta" required>
                </div>
              </div>
            </div>

            <button type="submit" class="btn border-0 text-white fw-semibold" style="background-color: var(--blue)">Tambah Event</button>
          </form>
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