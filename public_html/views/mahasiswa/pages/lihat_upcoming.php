<?php
require "../../../../koneksi.php";

session_start();

if (!(isset($_SESSION['logged_in']) && $_SESSION['role'] == "mahasiswa")) {
  $_SESSION['error'] = 'access_denied';
  header('Location: ../../auth/pages/login.php');
  exit();
}

$sql = "SELECT * FROM event WHERE CONCAT(event_date, ' ', event_time) > NOW() ORDER BY event_date";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upcoming Seminar & Workshop | SI Connect</title>

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

    <div class="p-0 container-fluid d-flex flex-column justify-content-center" style="background-color: var(--cream);">
      <div class="text-center my-5">
        <h1 class="fw-bold" data-aos="fade-down">Upcoming Seminar & Workshop</h1>
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4 mb-5" style="margin-inline: 12rem;">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col" data-aos="fade-up">
              <div class="card border-0 rounded-4 h-100 shadow">
                <img src="../../../storage/event/<?php echo $row['photo']; ?>" class="rounded-top-4 card-img-top" alt="...">
                <div class="card-body h-100">
                  <h5 class="card-title"><?php echo $row['name']; ?></h5>
                </div>
                <div class="card-body text-center d-grid">
                  <a href="lihat_detail.php?id=<?php echo $row['id']; ?>" type="button" class="btn border-0 rounded-3 px-4 py-2 fs-5 fw-semibold text-white" style="background-color: var(--blue);">Daftar</a>
                </div>
                <div class="card-footer text-center">
                  <span class="fw-semibold text-body-secondary fs-6"><?php echo $row['event_time'] . ' | ' . $row['event_date']; ?></span>
                </div>
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

    <div class="d-flex flex-column justify-content-center align-items-center text-center w-100 d-inline-block" style="height: 50vh; background-color: var(--blue);">
      <div style="margin-inline: 12rem;">
        <h1 class="fw-bold mb-4" style="color: var(--cream);">
          Punya pertanyaan? Lihat FAQ untuk jawaban yang mungkin Anda cari
        </h1>

        <div class="d-grid gap-2 col-6 w-75 mx-auto">
          <a href="faq.php" class="btn fs-3 fw-bold border-0 rounded-5 text-black" type="button" style="background-color: var(--cream);">Frequently Asked Questions</a>
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