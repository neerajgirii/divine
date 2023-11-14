<?php
include 'connectToDatabase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $role = $_POST['role'];

    // Default password (you may want to generate a secure default password)
    $defaultPassword = password_hash('default_password', PASSWORD_DEFAULT);

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO users (full_name, phone_number, role_id, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $fullName, $phoneNumber, $role, $defaultPassword);

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
        // Handle the error appropriately
    } else {
        header("location: adminPanel.php");
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
