<?php
require "../../../../koneksi.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ongoing Seminar & Workshop | SI Connect</title>

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

    <div class="py-5 text-center w-100 d-inline-block" style="background-color: var(--blue);">
      <div style="margin-inline: 12rem;">
        <h1 class="fw-bold mb-5" style="color: var(--cream);">
          Frequently Asked Questions
        </h1>

        <div class="mb-3">
          <p class="m-0 d-grid">
            <button class="btn border-0 rounded-3 fw-semibold fs-5 py-2" style="background-color: var(--cream);" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
              Dalam Website Seminar ini akan membahas topik apa saja?
            </button>
          </p>
          <div class="collapse" id="collapseExample1" aria-labelledby="headingExample1" data-bs-parent="#accordion">
            <div class="card card-body border-0 text-white" style="background-color: var(--blue);">
            Topik yang akan dibahas mencakup berbagai aspek dalam sistem informasi, seperti teknologi terbaru, tren industri, tantangan, dan peluang di bidang ini.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <p class="m-0 d-grid">
            <button class="btn border-0 rounded-3 fw-semibold fs-5 py-2" style="background-color: var(--cream);" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
              Siapa pembicara yang akan hadir dalam seminar atau talkshow yang ada di website ini?
            </button>
          </p>
          <div class="collapse" id="collapseExample2" aria-labelledby="headingExample2" data-bs-parent="#accordion">
            <div class="card card-body border-0 text-white" style="background-color: var(--blue);">
            Pembicara yang hadir biasanya adalah para ahli dan profesional terkemuka dalam industri IT serta akademisi yang memiliki pengalaman dan pengetahuan mendalam di bidang sistem informasi.
            </div>
          </div>
        </div>

        <!-- elemen collapse -->
        <div class="mb-3">
          <p class="m-0 d-grid">
            <button class="btn border-0 rounded-3 fw-semibold fs-5 py-2" style="background-color: var(--cream);" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
              Mengapa harus mengikuti seminar atau talkshow yang ada didalam website ini?
            </button>
          </p>
          <div class="collapse" id="collapseExample3" aria-labelledby="headingExample3" data-bs-parent="#accordion">
            <div class="card card-body border-0 text-white" style="background-color: var(--blue);">
            Seminar dan talkshow yang ada didalam website ini memberikan kesempatan langka untuk memperluas pengetahuan Anda dalam bidang sistem informasi, mendengar pandangan dari para ahli, serta berjejaring dengan profesional dan rekan sejawat dalam industri.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <p class="m-0 d-grid">
            <button class="btn border-0 rounded-3 fw-semibold fs-5 py-2" style="background-color: var(--cream);" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
              Apa manfaat yang bisa didapat setelah mengikuti seminar atau talkshow yang ada di website ini?
            </button>
          </p>
          <div class="collapse" id="collapseExample4" aria-labelledby="headingExample4" data-bs-parent="#accordion">
            <div class="card card-body border-0 text-white" style="background-color: var(--blue);">
            Manfaatnya termasuk peningkatan pengetahuan tentang perkembangan terbaru dalam sistem informasi, peluang untuk menjalin hubungan profesional yang berharga, dan kemungkinan memperluas jaringan Anda di bidang ini.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <p class="m-0 d-grid">
            <button class="btn border-0 rounded-3 fw-semibold fs-5 py-2" style="background-color: var(--cream);" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5">
              Apakah Seminar atau talkshow yang ada di website ini akan diadakan secara berkala?
            </button>
          </p>
          <div class="collapse" id="collapseExample5" aria-labelledby="headingExample5" data-bs-parent="#accordion">
            <div class="card card-body border-0 text-white" style="background-color: var(--blue);">
            Kami berencana untuk menyelenggarakan acara ini secara berkala sebagai bagian dari upaya kami untuk terus memberikan pembaruan terbaru dan wawasan terkini dalam dunia sistem informasi kepada peserta.
            </div>
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