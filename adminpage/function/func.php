<?php
include 'connect.php';

// Mengambil data yang masih berstatus pending untuk ditampilkan di post admin
$sql = "SELECT * FROM trivias WHERE status = 'pending'";
$result_adm = $conn->query($sql);

// Mengambil data dari users
$sqll = "SELECT * FROM users";
$get_user = $conn->query($sqll);