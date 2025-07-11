<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: login6.php");
    exit();
}
$user = $_SESSION['user'];
?>
<h2>Admin Dashboard</h2>
Welcome, <?= $user['name'] ?> (Admin)<br>
<a href="add_book.php">Add Book</a><br>
<a href="issue_book.php">Issue Book</a><br>
<a href="return_book.php">Return Book</a><br>
<a href="make_fine.php">Make Fine</a><br>
<a href="upload_material.php">Upload Material</a><br>
<a href="view_material.php">View Material</a><br>
<a href="logout.php">Logout</a>
