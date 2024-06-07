<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Admin Dashboard</h1>
            </div>
            <nav>
                <div class="nav-menu">
                    <button class="nav-toggle" id="navToggle">&#9776;</button>
                    <ul id="navMenu">
                        <li><a href="settings.php" class="active">Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="admin-container">
        <aside>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="posts.php">Posts</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </aside>
        <main>
            <h2>Settings</h2>
            <section class="settings">
                <form>
                    <div class="form-group">
                        <label for="site-name">Site Name</label>
                        <input type="text" id="site-name" name="site-name" value="Web Artikel">
                    </div>
                    <div class="form-group">
                        <label for="site-description">Site Description</label>
                        <input type="text" id="site-description" name="site-description" value="A great place for articles">
                    </div>
                    <div class="form-group">
                        <label for="admin-email">Admin Email</label>
                        <input type="email" id="admin-email" name="admin-email" value="admin@example.com">
                    </div>
                    <button type="submit">Save Settings</button>
                </form>
            </section>
        </main>
    </div>
    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('show');
        });
    </script>
</body>
</html>
