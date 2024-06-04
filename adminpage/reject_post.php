<?php
include 'function/connect.php';

if(isset($_GET['id'])) {
    $postId = $_GET['id'];
    $status = 'Rejected';

    $stmt = $conn->prepare("UPDATE trivias SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $postId);
    $stmt->execute();
    $stmt->close();

    // Redirect back to posts.php after rejecting the post
    header("Location: posts.php");
    exit();
}
?>
