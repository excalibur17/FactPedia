<?php
require './function/connect.php';
require './function/func.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    updateUser($conn, $id, $name, $email);
    header('Location: users.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = getUserById($conn, $id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Edit User</h2>
    <form method="post" action="edit_user.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div>
            <button type="submit">Update User</button>
        </div>
    </form>
</body>

</html>
