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
            <h2 class="m-0 fw-bold text-white mb-2">Kelola Seminar & Workshop</h2>
            <h5 class="m-0 text-white">Kelola informasi seminar & workshop di sini</h5>
          </div>
        </div>

        <?php
        if (isset($_SESSION['error']) && $_SESSION['error'] == 'invalid_request') {
        ?>
          <div class='alert alert-danger w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Permintaan tidak valid.
          </div>
        <?php
          unset($_SESSION['error']);
        }

        if (isset($_SESSION['error']) && $_SESSION['error'] == 'insufficient_quota') {
        ?>
          <div class='alert alert-danger w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Kuota tidak mencukupi. Perhatikan kuota yang tersisa.
          </div>
        <?php
          unset($_SESSION['error']);
        }


        if (isset($_SESSION['error']) && $_SESSION['error'] == 'no_photo_uploaded') {
        ?>
          <div class='alert alert-danger w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Silakan pilih foto dengar benar.
          </div>
        <?php
          unset($_SESSION['error']);
        }

        if (isset($_SESSION['error']) && $_SESSION['error'] == 'event_not_uploaded') {
        ?>
          <div class='alert alert-danger w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Form tidak boleh ada yang kosong.
          </div>
        <?php
          unset($_SESSION['error']);
        }

        if (isset($_SESSION['error']) && $_SESSION['error'] == 'event_not_updated') {
        ?>
          <div class='alert alert-danger w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Form tidak boleh ada yang kosong.
          </div>
        <?php
          unset($_SESSION['error']);
        }

        if (isset($_SESSION['error']) && $_SESSION['error'] == 'no_photo_updated') {
        ?>
          <div class='alert alert-danger w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Silakan pilih foto dengar benar.
          </div>
        <?php
          unset($_SESSION['error']);
        }

        if (isset($_SESSION['success']) && $_SESSION['success'] == 'event_uploaded') {
        ?>
          <div class='alert alert-success w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Seminar atau Workshop berhasil ditambahkan.
          </div>
        <?php
          unset($_SESSION['success']);
        }

        if (isset($_SESSION['success']) && $_SESSION['success'] == 'event_updated') {
        ?>
          <div class='alert alert-success w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Seminar atau Workshop berhasil diedit.
          </div>
        <?php
          unset($_SESSION['success']);
        }

        if (isset($_SESSION['success']) && $_SESSION['success'] == 'event_deleted') {
        ?>
          <div class='alert alert-success w-50 text-center mx-auto my-0 mt-4' role='alert'>
            Seminar atau Workshop berhasil dihapus
          </div>
        <?php
          unset($_SESSION['success']);
        }
        ?>

        <div class="p-0 m-5">
          <div class="fw-bold fs-5 my-auto mb-1 text-body-secondary">
            <a href="tambah.php" class="text-reset text-decoration-none">
              <i class="fa-solid fa-square-plus fa-lg"></i> Tambah
            </a>
          </div>

          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th scope="col">Foto</th>
                <th scope="col">Judul</th>
                <th scope="col">Kuota</th>
                <th scope="col">Jenis</th>
                <th scope="col" style="width: 12%;">Waktu</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" style="width: 10%;">Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php
              $sql = "SELECT * FROM event";
              $result = mysqli_query($koneksi, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  $kuota_peserta_terisi = $row['total_kuota_peserta'] - $row['kuota_peserta_tersisa']
              ?>
                  <tr>
                    <td>
                      <img src='../../../storage/event/<?php echo $row['photo']; ?>' alt='Foto' width='100'>
                    </td>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['kuota_peserta_tersisa']; ?>/<?php echo $row['total_kuota_peserta']; ?> (<?php echo $kuota_peserta_terisi ?>)
                    </td>
                    <td>
                      <?php echo $row['type']; ?>
                    </td>
                    <td>
                      <?php echo $row['event_time']; ?> <br> <?php echo $row['event_date']; ?>
                    </td>
                    <td>
                      <button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal<?php echo $row['id']; ?>'><i class='fa-solid fa-eye'></i></button>
                    </td>
                    <td>
                      <a href='edit.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-success'><i class='fa-solid fa-pen'></i></a>
                      <button type='button' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#hapusModal<?php echo $row['id']; ?>'><i class='fa-solid fa-trash'></i></button>
                    </td>
                  </tr>

                  <!-- Modal Deskripsi -->
                  <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel<?php echo $row['id']; ?>">Deskripsi Workshop</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?php echo $row['description'] ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Konfirmasi Hapus -->
                  <div class="modal fade" id="hapusModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusModalLabel<?php echo $row['id']; ?>">Konfirmasi Hapus</h5>
                        </div>
                        <div class="modal-body">
                          Apakah Anda yakin ingin menghapus <span class="fw-bold"><?php echo $row['name'] ?></span>?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                          <form method="POST" action="../../../../handlers/admin/hapus.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan='6'>Tidak ada data yang tersedia.</td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
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