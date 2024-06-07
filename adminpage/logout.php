<?php
session_start();
session_destroy();
header("Location: ../admin_loginpage/admin_login.php");
?>
