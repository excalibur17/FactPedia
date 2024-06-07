<?php
include 'function/connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM trivias WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "Invalid request.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author = $_POST['author'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $file_path = $post['file_path'];

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../proses/uploads";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $file_path = $target_file;
    }

    $stmt = $conn->prepare("UPDATE trivias SET author=?, title=?, category=?, content=?, status=?, file_path=? WHERE id=?");
    $stmt->bind_param("ssssssi", $author, $title, $category, $content, $status, $file_path, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: posts.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/edit_post.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Edit Post</h1>
            </div>
            <nav>
                <div class="nav-menu">
                    <button class="nav-toggle" id="navToggle">&#9776;</button>
                    <ul id="navMenu">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="posts.php">Posts</a></li>
                        <li><a href="users.php">Users</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="admin-container">
        <main>
            <h2>Edit Post</h2>
            <?php if ($post): ?>
                <form action="edit_post.php?id=<?php echo $post['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($post['author']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($post['category']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($post['status']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image">
                        <?php if (!empty($post['file_path'])): ?>
                            <div class="post-image">
                                <img src="<?php echo htmlspecialchars($post['file_path']); ?>" alt="Post Image">
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit">Update Post</button>
                    <a href="posts.php" class="btn-action btn-blue">Back to Posts</a>
                </form>
            <?php else: ?>
                <p>Post not found.</p>
            <?php endif; ?>
        </main>
    </div>
    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('show');
        });
    </script>
</body>
</html>
