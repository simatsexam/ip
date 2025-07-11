<?php
$conn = new mysqli("localhost", "root", "", "example");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
