<?php
require 'function/connect.php';
require 'function/func.php';

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
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
</head>

<body>

    <style>
        /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #444;
}

form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #007bff;
}

button[type="submit"] {
    display: inline-block;
    background: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    width: 100%;
}

button[type="submit"]:hover {
    background: #0056b3;
}

@media (max-width: 600px) {
    form {
        padding: 15px;
    }
}

    </style>
    
    <form method="post" action="edit_user.php" >
        <h2>Edit User</h2>
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
