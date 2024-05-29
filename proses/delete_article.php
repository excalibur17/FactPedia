<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

$sql = "DELETE FROM articles WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Article deleted successfully";
    header("Location: manage_articles.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
