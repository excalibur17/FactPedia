<?php
require 'connect.php';
session_start();

$is_login = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FactPedia</title>
    <link rel="stylesheet" href="../css/styles.css" />
</head>

<body>
    <style>
        header {
            background-color: #fff;
        }
        .logo {
            color: black;
        }
    </style>
    <header>
        <div class="nav container">
            <a href="#" class="logo">Fact<span>Pedia</span></a>
            <div class="nav-page">
                <a href="../index.php">Home</a>
                <a href="../index.php#read">Read</a>
                <a href="#">Write</a>
                <a href="../static/about.php">About</a>
                <a href="login.php" class="login">Login</a>
            </div>
        </div>
    </header>
    <section class="warning container">
        <div class="warning-box">
            <h1>Oops! Anda belum login</h1>
            <p>Untuk bisa mengakses halaman ini silahkan <a href="login.php">login</a> atau <a href="login.php#sign-in">daftar</a></p>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>

</html>