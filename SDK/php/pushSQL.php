<?php
require_once "../../../config.ini.php";

// Create connection
$conn = new mysqli(REMOTE, DB_USER_REMOTE, DB_PASS_REMOTE, DB_NAME_REMOTE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO __ (__, __, __) VALUES (?, ?, ?)");
$stmt->bind_param("sss", __, __, __);


$stmt->execute();

echo "Remote DB updated successfully";

$stmt->close();
$conn->close();