<nav class="navbar navbar-expand-lg shadow" style="height: 10vh;">
  <div class="container-fluid" style="margin-inline: 12rem;">
    <a class="navbar-brand fw-semibold" href="#">
      <img src="../../../assets/icons/si_connect.png" alt="" style="height: 7vh;">
    </a>

    <!-- TODO: Current page active php -->
    <div class="navbar-nav">
      <a class="nav-link fw-semibold" href="beranda.php">Beranda</a>
      <a class="nav-link fw-semibold" href="lihat_upcoming.php">Upcoming Seminar & Talkshow</a>
      <a class="nav-link fw-semibold" href="lihat_past.php">Past Seminar & Talkshow</a>
      <a class="nav-link fw-semibold" href="faq.php">FAQs</a>

      <div class="mx-3 vr border border-1 border-black opacity-100"></div>

      <?php
      if (isset($_SESSION['logged_in'])) {
      ?>
        <div class="dropdown my-auto">
          <a class="dropdown-toggle text-decoration-none text-reset" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user fa-lg"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item">Dera Kayla Khairani</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../../../../handlers/auth/logout.php"><i class="fa-solid fa-right-from-bracket me-1"></i> Log out</a></li>
          </ul>
        </div>
      <?php
      } else {
      ?>
      <div class="my-auto">
        <a href="../../auth/pages/login.php" type="button" class="btn border-0 fw-semibold text-white" style="background-color: var(--blue);">Masuk</a>
      </div>
      <?php
      }
      ?>

    </div>
  </div>
</nav>