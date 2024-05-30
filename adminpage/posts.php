<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Posts</title>
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
                <li><a href="admin.html">Dashboard</a></li>
                <li><a href="posts.html" class="active">Posts</a></li>
                <li><a href="users.html">Users</a></li>
            </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
            <section class="posts">
                <button class="btn-add">Add New Post</button>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data post -->
                        <tr>
                            <td>1</td>
                            <td>Post Title 1</td>
                            <td>Author 1</td>
                            <td>Pending</td>
                            <td>
                                <button class="btn-action">View</button>
                                <button class="btn-action">Accept</button>
                                <button class="btn-action">Edit</button>
                                <button class="btn-action">Delete</button> 
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Post Title 2</td>
                            <td>Author 2</td>
                            <td>Approved</td>
                            <td>
                                <button class="btn-action">View</button>
                                <button class="btn-action">Accept</button>
                                <button class="btn-action">Edit</button>
                                <button class="btn-action">Delete</button> <!-- Tambahkan tombol Accept -->
                            </td>
                        </tr>
                        <!-- Tambahkan data post lainnya di sini -->
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
