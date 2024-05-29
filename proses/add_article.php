<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    $sql = "INSERT INTO articles (title, content, author_id) VALUES ('$title', '$content', '$author_id')";
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success-message'>New article created successfully</div>";
    } else {
        $message = "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <link rel="stylesheet" href="../css/add_aricle.css">
</head>
<body>
    <div class="container">
        <h2>Add a New Article</h2>
        <?php if (isset($message)) echo $message; ?>
        <form method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
            <button type="submit">Add Article</button>
        </form>
    </div>
</body>
</html>
