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

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/view_post.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>View Post</h1>
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
            <h2>Post Details</h2>
            <?php if ($post): ?>
                <div class="post-detail">
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($post['author']); ?></p>
                    <p><strong>Title:</strong> <?php echo htmlspecialchars($post['title']); ?></p>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($post['category']); ?></p>
                    <?php if (!empty($post['file_path'])): ?>
                        <div class="post-image">
                            <img src="<?php echo "../proses/".htmlspecialchars($post['file_path']); ?>" alt="Post Image">
                        </div>
                    <?php endif; ?>
                    <p><strong>Content:</strong> <?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars((new DateTime($post['created_at']))->format('Y-m-d')); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($post['status']); ?></p>
                </div>
            <?php else: ?>
                <p>Post not found.</p>
            <?php endif; ?>
            <a href="posts.php" class="btn-action btn-blue">Back to Posts</a>
        </main>
    </div>
    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('show');
        });
    </script>
</body>

</html>
