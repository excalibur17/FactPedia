<?php
include 'function/connect.php';
include 'function/func.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Posts</title>
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
                        <li><a href="settings.php">Settings</a></li>
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
                <li><a href="posts.php" class="active">Posts</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
            <section class="posts">
                <a href="upload.php" class="btn-add">Add New Post</a>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data post -->
                        <?php 
                        $i = 1;
                         ?>
                        <?php while ($row = $result_adm->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $i++ ."."?></td>
                                <td><?php echo htmlspecialchars($row['author']); ?></td>
                                <td><?php echo htmlspecialchars($row['title']); ?></td>
                                <td><?php echo htmlspecialchars($row['category']); ?></td>
                                <td id="col-content"><?php echo htmlspecialchars($row['content']); ?></td>
                                <td><?php echo htmlspecialchars((new DateTime($row['created_at']))->format('Y-m-d')); ?></td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td>
                                    <button class="btn-action btn-blue">View</button>
                                    <button class="btn-action btn-green">Accept</button>
                                    <button class="btn-action btn-yellow">Edit</button>
                                    <button class="btn-action btn-red">Reject</button>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
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