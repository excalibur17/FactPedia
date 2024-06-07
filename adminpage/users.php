<?php
require './function/connect.php';
require './function/func.php';

// Fetch users data
$get_user = $conn->query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
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
                <li><a href="posts.php">Posts</a></li>
                <li><a href="users.php" class="active">Users</a></li>
            </ul>
        </aside>
        <main>
            <h2>Users</h2>
            <section class="users">
                <button class="btn-add" onclick="addUser()">Add New User</button>
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
                                <button onclick="editUser(<?php echo $row['id']; ?>)">Edit</button>
                                <button class="btn-red" onclick="deleteUser(<?php echo $row['id']; ?>)">Delete</button>
                            </td>
                        <?php }?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('show');
        });

        function addUser() {
            window.location.href = 'add_user.php';
        }

        function editUser(id) {
            window.location.href = 'edit_user.php?id=' + id;
        }

        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = 'delete_user.php?id=' + id;
            }
        }
    </script>
</body>

</html>
