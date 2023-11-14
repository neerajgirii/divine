<?php
include 'connectToDatabase.php';

// Get form data
$title = $_POST['title'];
$content = $_POST['content'];
$image_url = "images/" . $_POST['image_url'];
$category = $_POST['category'];
$date = $_POST['date'];
$author = $_POST['author'];

// Prepare and execute SQL query to insert the data into the database
$sql = "INSERT INTO articles (title, content, image_url, category, date, author)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssis", $title, $content, $image_url, $category, $date, $author);

if ($stmt->execute()) {
    echo "Article inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
