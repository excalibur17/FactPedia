<?php
include 'proses/connect.php';
session_start();

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Article Web</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h1>Article Web</h1>
    <?php if(isset($_SESSION['user_id'])): ?>
        <a href="proses/add_article.php">Add Article</a> |
        <a href="proses/logout.php">Logout</a>
    <?php else: ?>
        <a href="proses/login.php">Login</a> |
        <a href="proses/register.php">Register</a>
    <?php endif; ?>
    
    <h2>Articles</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['content']; ?></p>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
