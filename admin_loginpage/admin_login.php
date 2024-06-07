<?php
include '../proses/connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencegah SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query ke database
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true; // Set session login
        $_SESSION['user_id'] = $row['id'];
        header("Location: ../adminpage/dashboard.php");
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="admin_login.css">
    <title>Admin-Login</title>
    
</head>
<body>
    <div class="login">
        <h1>Admin Login</h1>
        <form action="#" method="POST">
            <div class="form-input">
                <input type="email" name="username" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="form-input">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
    
</body>
</html>