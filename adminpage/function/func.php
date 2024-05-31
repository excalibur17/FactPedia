<?php
include 'connect.php';

// Mengambil data yang masih berstatus pending untuk ditampilkan di post admin
$sql = "SELECT * FROM trivias WHERE status = 'pending'";
$result_adm = $conn->query($sql);

// Mengambil data dari users
$sqll = "SELECT * FROM users";
$get_user = $conn->query($sqll);

//Mengambil data dari db dan akan ditampilkan di dashboard
// Mengambil data dari db dan akan ditampilkan di dashboard
$show = "SELECT * FROM trivias";
$get_data = $conn->query($show);

// Periksa apakah query berhasil dan mengembalikan data
if ($get_data->num_rows > 0) {
    // Mengambil semua data sebagai array
    $data = $get_data->fetch_all(MYSQLI_ASSOC);
} else {
    $data = [];
}

// Mengambil total  user dari database
$sql_total_users = "SELECT COUNT(*) AS total_users FROM users"; 
$result_total_users = $conn->query($sql_total_users);

if ($result_total_users->num_rows > 0) {
    $row_total_users = $result_total_users->fetch_assoc();
    $total_users = $row_total_users["total_users"];
} else {
    $total_users = 0; 
}

// Mengambil total trivia dari database
$sql_tot_post = "SELECT COUNT(*) AS total_posts FROM trivias";
$result_tot_post = $conn->query($sql_tot_post);

if ($result_tot_post->num_rows > 0) {
    $row = $result_tot_post->fetch_assoc();
    $total_posts = $row["total_posts"];
} else {
    $total_posts = 0; 
}


