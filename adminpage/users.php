<?php
require './function/connect.php';
require './function/func.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
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
                <li><a href="admin.html">Dashboard</a></li>
                <li><a href="posts.html">Posts</a></li>
                <li><a href="users.html" class="active">Users</a></li>
            </ul>
        </aside>
        <main>
            <h2>Users</h2>
            <section class="users">
                <button class="btn-add">Add New User</button>
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while($row = $get_user->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo htmlspecialchars($row['name']) ?></td>
                            <td><?php echo htmlspecialchars($row['email'])?></td>
                            <td>Hacker</td>
                            <td>Active</td>
                            <td>
                                <button>Edit</button>
                                <button class="btn-red">Delete</button>
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>User 2</td>
                            <td>user2@example.com</td>
                            <td>Writer</td>
                            <td>Inactive</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
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