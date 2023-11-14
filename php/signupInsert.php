<?php
// Include your database connection file
include 'connectToDatabase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the checkbox is checked
    $accept_terms = isset($_POST['accept_terms']) ? 1 : 0;

    // Set the default role to 1
    $default_role = 3;

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO users (full_name, phone_number, password, accept_terms, role_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $full_name, $phone_number, $password, $accept_terms, $default_role);

    if ($stmt->execute()) {
        header("location: ../userCreated.html");
    } else {
        echo "Error: " . $stmt->error;
        // Handle the error appropriately
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
