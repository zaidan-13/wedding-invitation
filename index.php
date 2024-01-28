<?php
include 'config.php';

function submitRSVP($name, $attendance, $comment, $conn) {
    $stmt = $conn->prepare("INSERT INTO rsvp_comments (name, attendance, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $attendance, $comment);

    $stmt->execute();
    $stmt->close();
}

function getComments($conn) {
    $result = $conn->query("SELECT * FROM rsvp_comments ORDER BY created_at DESC");

    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    return $comments;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitRSVP'])) {
        $name = $_POST['inputName'];
        $attendance = $_POST['attendanceSelect'];
        $comment = $_POST['commentTextarea'];

        submitRSVP($name, $attendance, $comment, $conn);
    }
}


$comments = getComments($conn);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Heru & Wika</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/countdown/simplyCountdown.theme.default.css"/>
    <script src="dist/simplyCountdown.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:ital,wght@0,300;0,400;0,600;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  </head>
  <body>
    
    <section id="hero" class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
        <main>
            <h4>Kepada Bapak/Ibu/Saudara/i</h4>
            <h1>Heru & Wika</h1>
            <p>akan melangsungkan resepsi pernikahan dalam :</p>
            <div class="simply-countdown"></div>
            <a href="#undangan" class="btn btn-lg">Lihat Undangan</a>
        </main>
    </section>

    <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
        <div class="container">
          <a class="navbar-brand" href="#">Heru Wika</a>
          <button class="navbar-toggler border-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Heru Wika</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#home">Home</a>
                    <a class="nav-link" href="#info">Info</a>
                    <a class="nav-link" href="#story">Story</a>
                    <a class="nav-link" href="#gallery">Gallery</a>
                    <a class="nav-link" href="#rsvp">RSVP</a>
                    <a class="nav-link" href="#gift">Gift</a>
                  </div>
            </div>
          </div>
        </div>
      </nav>

      <section id="home" class="home">
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-8 text-center" >
                    <h2>Acara Pernikahan</h2>
                    <h3>Diselenggarakan pada tanggal 18 February 2023 di Cibawang, Sumedang, Jawa Barat.</h3>
                    <p>Oleh karena itu, dengan segala hormat, kami bermaksud untuk mengundang Bapal/Ibu, Saudara/i, untuk hadir pada acara pernikahan kami.</p>
                </div>
            </div>

            <div class="row couple mt-5">
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-8 text-end">
                    <h3>Muhammad Heru Kharismawan S.M</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, esse tenetur accusamus explicabo recusandae mollitia.</p>
                    <p>Putra ke-1 dari Bapak Beny Hermawan <br> dan <br> Ibu Neng Rukaesih</p>
                  </div>
                  <div class="col-4">
                    <img src="assets/img/pria.png" alt="Muhammad Heru Kharismawan S.M" class="img-responsive rounded-circle">
                  </div>
                </div>
              </div>

              <span class="heart"><i class="bi bi-heart-fill"></i></span>

              <div class="col-lg-6">
                <div class="row">
                  <div class="col-4">
                    <img src="assets/img/wanita.png" alt="Muhammad Heru Kharismawan S.M" class="img-responsive rounded-circle">
                  </div>
                  <div class="col-8">
                    <h3>Wika Fitria Rukandi</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, esse tenetur accusamus explicabo recusandae mollitia.</p>
                    <p>Putri ke-3 dari Bapak R.Cahyana <br> dan <br> Ibu Euis Hartati</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </section>

      <section id="info" class="info">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-10 text-center">
              <h2>Informasi Acara</h2>
              <p class="alamat">Alamat:<br> Dsn.Cibawang, RT 01, RW 11, Kec.Rancakalong, Kab.Sumedang</p>
              <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3961.2300546201973!2d107.83129527499588!3d-6.863010093135543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTEnNDYuOCJTIDEwN8KwNTAnMDEuOSJF!5e0!3m2!1sen!2sid!4v1706112182105!5m2!1sen!2sid"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <a href="https://maps.app.goo.gl/8TEhNUm8E2gU1gLP7" target="_blank" class="btn btn-light btn-sm my-4" >klik untuk membuka peta</a>
              <p class="description">Diharapkan untuk tidak salah alamat dan tanggal. Manakala tiba ditujuan namun tidak ada tanda-tanda sedang dilangsungkan pernikahan, boleh jadi Anda dalah jadwal, atau salah tempat.</p>
            </div>
          </div>

          <div class="row justify-content-center mt-4">
            <div class="col-md-5 col-10">
              <div class="card text-center text-bg-light mb-5">
                <div class="card-header">
                  Akad Nikah
                </div>
                <div class="card-body">
                  <div class="row justify-content-center"> 
                    <div class="col-md-6 mb-2">
                      <i class="bi bi-clock d-block mb-2"></i>
                      <span>8:00 WIB s/d selasai</span>
                    </div>
                    <div class="col-md-6">
                      <i class="bi bi-calendar3 d-block mb-2"></i>
                      <span>jumat, 16 februari 2024</span>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  Saat acara akad diharapkan untuk kondusif menjaga kehidmatan dan kekhusyuan seluruh profesi.
                </div>
              </div>
            </div>

            <div class="col-md-5 col-10">
              <div class="card text-center text-bg-light">
                <div class="card-header">
                  Resepsi
                </div>
                <div class="card-body">
                  <div class="row justify-content-center"> 
                    <div class="col-md-6 mb-2">
                      <i class="bi bi-clock d-block mb-2"></i>
                      <span>10:00 WIB s/d selasai</span>
                    </div>
                    <div class="col-md-6">
                      <i class="bi bi-calendar3 d-block mb-2"></i>
                      <span>Minggu, 18 februari 2024</span>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  Saat acara resepsi diharapkan untuk kondusif menjaga kehidmatan dan kekhusyuan seluruh profesi.
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="story" class="story">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-10 text-center">
              <span>Inilah Cerita Cinta Kami</span>
              <h2>Our Love Story</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia esse deserunt eveniet repudiandae? Quae, corporis.</p>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <ul class="timeline">
                <li>
                  <div class="timeline-image" style="background-image: url('assets/img/awal.png');"></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h3>Pertama bertemu</h3>
                      <span>01 agustus 2007</span>
                    </div>
                    <div class="timeline-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, iure aliquam? Saepe rerum esse vel.</p>
                    </div>
                  </div>
                </li>

                <li class="timeline-inverted">
                  <div class="timeline-image" style="background-image: url('assets/img/serius.png');"></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h3>Mulai serius</h3>
                      <span>01 agustus 2008</span>
                    </div>
                    <div class="timeline-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, iure aliquam? Saepe rerum esse vel.</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="timeline-image" style="background-image: url('assets/img/nikah.png');"></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h3>Tunangan</h3>
                      <span>01 agustus 2008</span>
                    </div>
                    <div class="timeline-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, iure aliquam? Saepe rerum esse vel.</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section id="gallery" class="gallery">
        <div class="row justify-content-center">
          <div class="col-md-8 col-10 text-center">
            <span>Memory</span>
            <h2>Gallery</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia esse deserunt eveniet repudiandae? Quae, corporis.</p>
          </div>
        </div>

        <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1">
          <div class="col mt-3">
            <img src="assets/img/gallery/1.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/2.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/3.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/4.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/5.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/6.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/7.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/8.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
          <div class="col mt-3">
            <img src="assets/img/gallery/9.jpg" alt="Heru & Wika" class="img-fluid w-100 rounded">
          </div>
        </div>
      </section>

      <section id="rsvp" class="rsvp">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-10 py-4">
              <h2 class='text-center' >RSVP</h2>
              <p class='text-center'>Silakan mengisi formulir kehadiran di bawah ini:</p>

              <form id="rsvpForm" method="post">
                  <div class="mb-3">
                      <label for="inputName" class="form-label">Nama Anda</label>
                      <input type="text" class="form-control" id="inputName" name="inputName" required>
                  </div>
                  <div class="mb-3">
                      <label for="attendanceSelect" class="form-label">Kehadiran</label>
                      <select class="form-select" id="attendanceSelect" name="attendanceSelect" required>
                          <option value="1">Akan Hadir</option>
                          <option value="0">Tidak Bisa Hadir</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="commentTextarea" class="form-label">Komentar</label>
                      <textarea class="form-control" id="commentTextarea" name="commentTextarea" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submitRSVP">Konfirmasi Kehadiran</button>
              </form>

             
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="comments" class="comments my-4">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-8 col-10 py-4">
                      <h2>Komentar</h2>

                      <ul class="list-unstyled">
                          <?php foreach ($comments as $comment) : ?>
                              <li class="mb-3">
                                  <div class="card">
                                      <div class="card-body">
                                          <h5 class="card-title "><?= $comment['name']; ?></h5>
                                          <p class="card-text"><?= $comment['attendance'] ? 'Akan Hadir' : 'Tidak Bisa Hadir'; ?></p>
                                          <p class="card-text"><?= $comment['comment']; ?></p>
                                      </div>
                                  </div>
                              </li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              </div>
          </div>
      </section>

      <section id="footer" class="footer">
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8 text-center">
              <h3>Copyright GM Project</h3>
            </div>
          </div>
        </div>
      </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    
    <script>
        simplyCountdown('.simply-countdown', {
            year: 2024, // required
            month: 2, // required
            day: 18, // required
            hours: 10, // Default is 0 [0-23] integer
            words: { //words displayed into the countdown
                days: { singular: 'hari', plural: 'hari' },
                hours: { singular: 'jam', plural: 'jam' },
                minutes: { singular: 'menit', plural: 'menit' },
                seconds: { singular: 'detik', plural: 'detik' }
            },
        });
    </script>

  <script>
    const humberger = document.querySelector('.navbar-toggler');
    const stickyTop = document.querySelector('.sticky-top');
    const offcanvas = document.querySelector('.offcanvas');

    offcanvas.addEventListener('show.bs.offcanvas', function() {
      stickyTop.style.overflow = 'visible';
    });

    offcanvas.addEventListener('hidden.bs.offcanvas', function() {
      stickyTop.style.overflow = 'hidden';
    });
  </script>

</body>

</html>