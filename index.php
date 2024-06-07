<?php
require 'proses/connect.php';
session_start();

$query = "SELECT * FROM trivias ORDER BY id DESC LIMIT 9";
$result = mysqli_query($conn, $query);


if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

$is_login = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trend Blogger</title>
    <!-- Box-icon -->
    <script src="https://kit.fontawesome.com/b6fbae5a8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <header>
        <div class="nav container">
            <a href="#" class="logo">Fact<span>Pedia</span></a>
            <div class="nav-page">
                <a href="#home">Home</a>
                <a href="#read">Read</a>
                <a href="#" class="write-link">Write</a>
                <a href="">About</a>
                <a href="proses/login.php" class="login">Login</a>
            </div>
        </div>
    </header>

    <section class="home" id="home">
        <img src="img/fun.jpg" alt="Banner Image" />
        <div class="home-text container">
            <h1>Welcome to FactPedia</h1>
            <p>
                Baca dan temukan pengetahuan baru setiap harinya sambil belkoraborasi
                dengan kami
            </p>
        </div>
    </section>

    <section class="about container" id="about">
        <div class="contentBx">
            <h2 class="titleText">Eksplorasi Fakta Unik!</h2>
            <p class="title-text">
                Cara yang menyenangkan untuk menguji pengetahuan dan
                belajar hal-hal baru.<br />
                Tingkatkan wawasanmu dengan fakta-fakta kecil yang menarik dan tak
                terduga. Dari sejarah singkat hingga detail unik, trivia bukan hanya
                sekadar informasi, tapi juga kunci untuk menghibur, mempererat
                hubungan, melatih otak, dan memicu kreativitasmu.
                <br> Anda juga dapat berkolaborasi dengan kami dengan <a href="#write">menulis</a> trivia anda sendiri
                <br />Jelajahi dunia trivia dan temukan keajaiban pengetahuan yang tak
                terduga!
            </p>
            <a href="#read" class="btn2">Baca trivia</a>
        </div>
        <div class="imgBx">
            <img src="img/einstein.jpg" alt="" class="fitBg" />
        </div>
    </section>

    <section class="post container" id="read">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            // Format the date
            $formattedDate = '';
            if (!empty($row['created_at'])) {
                $dateTime = new DateTime($row['created_at']);
                $formattedDate = $dateTime->format('d M Y');
            }
        ?>
            <div class="post-box" onclick="openModal(this)" data-title="<?= htmlspecialchars($row['title'] ?? ''); ?>" data-category="<?= htmlspecialchars($row['category'] ?? ''); ?>" data-date="<?= htmlspecialchars($formattedDate); ?>" data-description="<?= htmlspecialchars($row['content'] ?? ''); ?>" data-image="proses/<?= htmlspecialchars($row['file_path'] ?? ''); ?>" data-author="<?= htmlspecialchars($row['author'] ?? ''); ?>">

                <div class="img-container">
                    <img src="proses/<?= htmlspecialchars($row['file_path'] ?? ''); ?>" alt="" class="post-img" />
                </div>
                <div class="post-content">
                    <h2 class="category"><?= htmlspecialchars($row['category'] ?? ''); ?></h2>
                    <a href="#" class="post-title"><?= htmlspecialchars($row['title'] ?? ''); ?></a>
                    <span class="post-date"><?= htmlspecialchars($formattedDate); ?></span>
                    <p class="post-description"><?= htmlspecialchars($row['content'] ?? ''); ?></p>
                    <div class="profile">
                        <i class="fa-solid fa-circle-user" style="color: #b4bac5;"></i>
                        <span class="profile-name"><?= htmlspecialchars($row['author'] ?? ''); ?></span>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </section>

    

    <section class="write container" id="write">
        <div class="write-imgBx">
            <img src="img/colab.jpg" alt="" class="fitBg" />
        </div>
        <div class="write-contentBx">
            <h2 class="write-Text">Berkolaborasi dengan Kami</h2>
            <p class="write-text">
                Mari berkolaborasi dengan kami dengan menulis trivia Anda sendiri! Ayo berbagi pengetahuan dan fakta-fakta unik yang Anda miliki, serta menjadi bagian dari komunitas yang menyenangkan dalam menjelajahi dunia pengetahuan yang tak terbatas! </p>
            <a href="#" class="btn2 write-link">Tulis triviamu</a>
        </div>
    </section>
    <footer>
        <div class="footer-container">
            <div class="sec aboutus">
                <h2>About Us</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus
                    quisquam minus quo illo numquam vel incidunt pariatur hic commodi
                    expedita tempora praesentium at iure fugiat ea, quam laborum aperiam
                    veritatis.
                </p>
                <ul class="sci">
                    <li>
                        <img src="img/HESKI1.jpg" alt="">
                    </li>
                    <li>
                        <a href="#"><i class="bx bxl-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="bx bxl-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div class="sec quicklinks">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <div class="sec contactBx">
                <h2>Contact Info</h2>
                <ul class="info">
                    <li>
                        <span><i class="bx bxs-map"></i></span>
                        <span>6444 London street <br />
                            Brighton PA 33445 <br />
                            Uk</span>
                    </li>
                    <li>
                        <span><i class="bx bx-envelope"></i></span>
                        <p>
                            <a href="mailto:codemyhobby9@gmail.com">Codemyhobby9@gmail.com</a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img src="img/img5.jpg" alt="" class="modal-img" />
            <h2 class="category">Tech</h2>
            <a href="#" class="modal-title">How to create the best UI with Figma</a>
            <span class="modal-date">12 Feb 2022</span>
            <p class="modal-description">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Consectetur, similique, rerum excepturi harum, vitae facilis
                corrupti vel modi debitis est perferendis aut quasi ea unde
                repudiandae iste architecto. Corporis, voluptates.
            </p>
            <div class="profile">
                <i class="fa-solid fa-circle-user" style="color: #b4bac5;"></i>
                <span class="modal-author">MKHB</span>
            </div>
        </div>
    </div>


    <script src="js/script.js"></script>
    <script>
        document.querySelectorAll('.write-link').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault;
                <?php if ($is_login) : ?>
                    window.location.href = 'proses/upload.php';
                <?php else : ?>
                    window.location.href = 'proses/warning.php';
                <?php endif ?>
            })
        })
    </script>
</body>

</html>