<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Web Artikel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
                        <li><a href="settings.html">Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="admin-container">
        <aside>
            <ul>
                <li><a href="admin.html" class="active">Dashboard</a></li>
                <li><a href="posts.html">Posts</a></li>
                <li><a href="users.html">Users</a></li>
            </ul>
        </aside>
        <main>
            <h2>Dashboard</h2>
            <section class="stats">
                <div class="stat-box">
                    <h3>Total Posts</h3>
                    <p>120</p>
                </div>
                <div class="stat-box">
                    <h3>Total Users</h3>
                    <p>75</p>
                </div>
            </section>
            <section class="recent-posts">
                <h3>Recent Posts</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Article 1</td>
                            <td>Author 1</td>
                            <td>2024-05-30</td>
                            <td>Published</td>
                        </tr>
                        <tr>
                            <td>Article 2</td>
                            <td>Author 2</td>
                            <td>2024-05-29</td>
                            <td>Draft</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2024 Web Artikel. All rights reserved.</p>
        </div>
    </footer>
    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('show');
        });
    </script>
</body>
</html>