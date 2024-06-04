<?php
// Include database connection
include 'function/connect.php';

// Check if ID parameter is set
if (isset($_GET['id'])) {
    // Sanitize the ID parameter
    $id = intval($_GET['id']);

    // Prepare and execute a SQL query to update the status of the post to "Accepted"
    $stmt = $conn->prepare("UPDATE trivias SET status = 'approved' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect the user back to the posts page
    header("Location: posts.php");
    exit;
} else {
    // If ID parameter is not set, display an error message
    echo "Invalid request.";
    exit;
}

// Close database connection
$conn->close();
?>
