<?php
require './function/connect.php';
require './function/func.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteUser($conn, $id);
    header('Location: users.php');
    exit();
}
?>
