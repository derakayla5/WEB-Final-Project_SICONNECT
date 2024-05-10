<?php
require "../../../../koneksi.php";

session_start();

if (!(isset($_SESSION['logged_in']) && $_SESSION['role'] == "mahasiswa")) {
  $_SESSION['error'] = 'access_denied';
  header('Location: ../../auth/pages/login.php');
  exit();
}

if (!(isset($_GET['id']))) {
  header("location: beranda.php");
  exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM event WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$event = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) == 0) {
  header("Location: beranda.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lihat Seminar & Workshop | SI Connect</title>

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

    <div class="p-0 container-fluid flex-column d-flex justify-content-center">
      <div style="height: 100vh;">
        <div class="" style="height: 50vh; background-color: var(--cream);">
          <div class="d-flex justify-content-center align-items-center h-100" style="margin-inline: 12rem">
            <div class="w-50 me-4" data-aos="fade-right">
              <img src="../../../storage/event/<?php echo $event['photo']; ?>" class="img-fluid rounded-4" alt="...">
            </div>

            <div class="w-50" data-aos="fade-left">
              <h3 class="fw-bold mb-3"><?php echo $event['name']; ?></h3>

              <div class="fs-5 mb-1">
                <i class="fa-solid fa-calendar me-1"></i> Tanggal: <span class="fw-semibold"><?php echo $event['event_date']; ?></span>
              </div>

              <div class="fs-5 mb-1">
                <i class="fa-solid fa-clock me-1"></i> Pukul: <span class="fw-semibold"><?php echo $event['event_time']; ?></span>
              </div>

              <div class="fs-5 mb-1">
                <i class="fa-solid fa-location-dot me-2"></i> Lokasi: <span class="fw-semibold"><?php echo $event['location']; ?></span>
              </div>

              <div class="fs-5 mb-1">
                <?php
                $kuota_terisi = $event['total_kuota_peserta'] - $event['kuota_peserta_tersisa']; 
                ?>
                <i class="fa-solid fa-users me-1"></i></i> Kuota Terisi: <span class="fw-semibold"><?php echo $kuota_terisi; ?>/<?php echo $event['total_kuota_peserta']; ?></span>
              </div>
            </div>
          </div>
        </div>

        <div style="height: 50vh; background-color: var(--blue);">
          <div class="d-flex flex-column justify-content-center align-items-center h-100" style="margin-inline: 12rem" data-aos="zoom-in">
            <h2 class="fw-bold mb-4" style="color: var(--cream);">Tentang Seminar Ini</h2>

            <p class="fw-semibold" style="color: var(--cream);">
              <?php echo $event['description']; ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <?php
    if ($event["kuota_peserta_tersisa"] > 0) {
    ?>
      <div class="d-flex flex-column justify-content-center align-items-center text-center w-100 d-inline-block" style="height: 50vh; background-color: var(--cream);">
        <div style="margin-inline: 12rem;">
          <h1 class="fw-bold mb-4">
            Tertarik untuk mengikuti seminar ini?
          </h1>

          <?php
          $currentURL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          $message = "Saya tertarik mengikuti seminar ini:\n" . $currentURL;
          $whatsappLink = "https://wa.me/6282255532703?text=" . urlencode($message);
          ?>


          <form action="../../../../handlers/admin/daftar.php" method="POST">
            <input type="hidden" name="url" value="<?php echo $whatsappLink ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div class="d-grid gap-2 col-6 w-75 mx-auto mb-4">
              <button class="btn fs-3 fw-bold border-0 rounded-5" type="submit" style="background-color: var(--blue); color: var(--cream);">Ayok daftar!</button>
            </div>
          </form>

          <h5 class="fw-bold">atau ingin melihat seminar & workshop yang lainnya? <a href="lihat_upcoming.php">Klik di sini</a></h5>
        </div>
      </div>
    <?php
    } else {
    ?>
      <div class="d-flex flex-column justify-content-center align-items-center text-center w-100 d-inline-block" style="height: 50vh; background-color: var(--cream);">
        <div style="margin-inline: 12rem;">
          <h1 class="fw-bold mb-4">
            Kuota seminar sudah habis
          </h1>

          <div class="d-grid gap-2 col-6 w-75 mx-auto mb-4">
            <button class="btn fs-3 fw-bold border-0 rounded-5" style="background-color: var(--blue); color: var(--cream);" disabled>Tidak bisa daftar</button>
          </div>

          <h5 class="fw-bold">Temukan seminar & workshop yang lainnya <a href="lihat_upcoming.php">di sini</a></h5>
        </div>
      </div>
    <?php
    }
    ?>

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