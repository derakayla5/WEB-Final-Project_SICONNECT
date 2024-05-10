<?php
require "../../../../koneksi.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | SI Connect</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body>
  <div class="contaier-fluid">
    <?php
    require "../partials/navbar.php";
    ?>

    <!-- Selamat datang -->
    <div class="p-0 container-fluid d-flex flex-row justify-content-center align-items-center" style="height: 90vh; background-color: var(--cream); ">
      <div class="me-5" data-aos="fade-right">
        <span class="text-end">
          <h2>Selamat datang di</h2>
          <h1 class="fw-bold">Seminar & Workshop</h1>
          <h4>Sistem Informasi Universitas Mulawarman</h4>
        </span>
      </div>

      <div data-aos="fade-left">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="width: 512px; height: 288px;">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
              <img src="../../../assets/img/slide_1.jpg" class="d-block w-100" style="max-width: 100%;" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="../../../assets/img/slide_2.jpg" class="d-block w-100" style="max-width: 100%;" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="../../../assets/img/slide_3.jpg" class="d-block w-100" style="max-width: 100%;" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!-- <div class="d-flex justify-content-center align-items-center text-center h-50 w-100 d-inline-block rounded-top-circle" style="background-color: var(--blue);" data-aos="fade-up">
        <h1 class="fw-bold" style="color: var(--cream);">
          Temukan Seminar & Workshop <br>
          BERKUALITAS di sini
        </h1>
      </div> -->
    </div>

    <!-- Daftar seminar terbaru -->
    <div class="p-0 container-fluid d-flex flex-column justify-content-center align-items-center" style="background-color: var(--blue); height: 100vh;">
      <div class="mb-5">
        <h1 class="fw-bold text-center m-0" style="color: var(--cream);" data-aos="fade-down">
          Temukan Seminar & Workshop <br>
          BERKUALITAS di sini
        </h1>
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-center" style="margin-inline: 12rem;">
        <?php
        $sql = "SELECT * FROM event ORDER BY event_date DESC LIMIT 3";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col" data-aos="fade-up">
              <div class="card border-0 rounded-4 h-100 shadow">
                <img src="../../../storage/event/<?php echo $row['photo']; ?>" class="rounded-top-4 card-img-top" alt="...">
                <div class="card-body h-100">
                  <h5 class="card-title"><?php echo $row['name']; ?></h5>
                </div>
                <!-- <div class="card-body text-center d-grid">
                  <a href="lihat_detail.php?id=<?php echo $row['id']; ?>" type="button" class="btn border-0 rounded-3 px-4 py-2 fs-5 fw-semibold text-white" style="background-color: var(--blue);">Daftar</a>
                </div> -->
                <!-- <div class="card-footer text-center">
                  <span class="fw-semibold text-body-secondary fs-6"><?php echo $row['event_time'] . ' | ' . $row['event_date']; ?></span>
                </div> -->
              </div>
            </div>
        <?php
          }
        } else {
          echo "<p class='text-center'>Tidak ada seminar yang tersedia.</p>";
        }
        ?>
      </div>
    </div>

    <div class="container-fluid p-0" style="background-color: var(--cream); height: 100vh;">
      <!-- Temukan seminar lainnya -->
      <div class="d-flex flex-column justify-content-center align-items-center text-center h-50 w-100 d-inline-block rounded-bottom-circle" style="background-color: var(--blue); height: 50vh;">
        <div style="margin-inline: 12rem;" data-aos="zoom-in">
          <h1 class="mb-5 fw-bold" style="color: var(--cream);">
            Kapan lagi? Langsung aja daftar, Wal!
          </h1>

          <h3 class="mb-3 fw-semibold text-white">
            Lihat dan daftar seminar atau wrokshop yang akan datang
          </h3>

          <div class="d-grid gap-2 col-6 w-75 mx-auto">
            <a href="lihat_upcoming.php" class="btn fs-3 fw-bold border-0 rounded-5" type="button" style="background-color: var(--cream);">Klik di sini </a>
          </div>
        </div>
      </div>

      <!-- FAQ -->
      <div class="d-flex flex-column justify-content-center align-items-center text-center h-50 w-100 d-inline-block" style="height: 50vh;">
        <div style="margin-inline: 12rem;">
          <h1 class="fw-bold mb-4">
            Punya pertanyaan? Lihat FAQ untuk jawaban yang mungkin Anda cari
          </h1>

          <div class="d-grid gap-2 col-6 w-75 mx-auto">
            <a href="faq.php" class="btn fs-3 fw-bold border-0 rounded-5 text-white" type="button" style="background-color: var(--blue);">Frequently Asked Questions</a>
          </div>
        </div>
      </div>
    </div>

    <?php
    require "../partials/footer.php";
    ?>
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