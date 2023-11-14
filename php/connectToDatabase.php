<?php
$servername = "localhost";
$username = "root";
$password = "root";
$databaseName = "divinemi_divineMainDatabase";

$conn = mysqli_connect($servername, $username, $password, $databaseName);

if (!$conn) {
    echo "Error while Connecting to " . $databaseName;
}

?>        