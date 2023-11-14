<?php
include 'connectToDatabase.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare and execute the SQL query to delete the user
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        // Successfully deleted the user
        header("Location: adminPanel.php"); // Redirect to the page you want after deletion
        exit();
    } else {
        echo "Error: " . $stmt->error;
        // Handle the error appropriately
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle the case where 'id' parameter is not provided in the URL
    echo "User ID not provided.";
}

// Close the database connection
$conn->close();
?>
