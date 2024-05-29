<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$author_id = $_SESSION['user_id'];
$sql = "SELECT * FROM articles WHERE author_id='$author_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Articles</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h1>Manage Your Articles</h1>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['content']; ?></p>
                <a href="edit_article.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_article.php?id=<?php echo $row['id']; ?>">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
