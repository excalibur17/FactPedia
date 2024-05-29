<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE articles SET title='$title', content='$content' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Article updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM articles WHERE id='$id'";
    $result = $conn->query($sql);
    $article = $result->fetch_assoc();
}
?>

<form method="post">
    Title: <input type="text" name="title" value="<?php echo $article['title']; ?>" required>
    Content: <textarea name="content" required><?php echo $article['content']; ?></textarea>
    <button type="submit">Update Article</button>
</form>
