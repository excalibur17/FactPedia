<?php
include 'connect.php';

// Fetch articles from the database
$sql = "SELECT * FROM articles ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Articles - Web Artikel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/view.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>FactPedia</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="view_article.php">Read</a></li>
                    <li><a href="../static/about.php">About</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
        <section class="articles">
            <h2>Articles</h2>
            <div id="article-list">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='article-item'>";
                        if ($row["image_path"]) {
                            echo "<div class='article-image'><img src='" . $row["image_path"] . "' alt='" . $row["title"] . "'></div>";
                        }
                        echo "<div class='article-content'>";
                        echo "<h3>" . $row["title"] . "</h3>";
                        echo "<p>" . $row["content"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No articles found.</p>";
                }
                ?>
            </div>
        </section>
        <div class="add-article-button">
            <a href="add_article.php" id="open-form-btn" class="add-article-link">+</a>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Web Artikel. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
