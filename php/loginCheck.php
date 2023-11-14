<?php
// Include your database connection file
include 'connectToDatabase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT user_id, password, role_id FROM users WHERE phone_number = ?");
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password, $role_id);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        // User exists and password is correct
        session_start();

        // Store user information in the session for later use
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role_id'] = $role_id;

        // Redirect based on the user's role
        if ($role_id == 1) {
            // Superadmin
            header("Location: adminPanel.php");
        } elseif ($role_id == 2) {
            // Admin
            header("Location: adminPanel.php");
        } elseif ($role_id == 3) {
            // User
            header("Location: ../index.php");
        } else {
            // Unknown role, handle accordingly
            header("Location: ../errorUserCheck.html");

        }
    } else {
        header("Location: ../errorUserCheck.html");
        // User does not exist or password is incorrect
    }

    // Close the statement
    $stmt->close();
}
?>
