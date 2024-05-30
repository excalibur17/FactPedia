<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = ""; // Initialize the message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    // Handle image upload
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Membuat direktori jika belum ada
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT INTO articles (title, content, author_id, image_path) VALUES ('$title', '$content', '$author_id', '$targetFilePath')";
            if ($conn->query($sql) === TRUE) {
                $message = "<script>alert('New article created successfully'); window.location.href = 'view_article.php';</script>";
            } else {
                $message = "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        } else {
            $message = "<div class='error-message'>Sorry, there was an error uploading your file.</div>";
        }
    } else {
        $message = "<div class='error-message'>Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.</div>";
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
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit">Add Article</button>
        </form>
    </div>
</body>
</html>
