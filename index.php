<?php
include 'proses/connect.php';
session_start();

$sql = "SELECT * FROM trivias";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Web Artikel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>FactPedia</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="proses/view_article.php">Read</a></li>
                    <li><a href="static/about.php">About</a></li>
                    <li><a href="proses/login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
        <section class="content">
            <h2>Selamat Datang</h2>
            <p>Selamat datang di <strong>Web Artikel</strong>, platform yang dirancang untuk 
                para penulis dan pembaca yang penuh semangat! Di sini, Anda dapat menemukan 
                berbagai artikel yang menginspirasi, informatif, dan menghibur. Kami berkomitmen 
                untuk menyediakan tempat bagi setiap suara yang ingin didengar, baik Anda seorang 
                penulis berpengalaman maupun seorang pemula yang baru memulai perjalanan menulis Anda.
            </p>
        </section>
        <section class="picture">
            <img src="img/grayscale.png"alt="Picture">
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Web Artikel. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
