<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: login6.php");
    exit();
}
$user = $_SESSION['user'];
?>
<h2>User Dashboard</h2>
Welcome, <?= $user['name'] ?> (Student)<br>
<a href="search_book.php">Search Book</a><br>
<a href="borrow_history.php">My Borrow History</a><br>
<a href="check_fine.php">Check Fine</a><br>
<a href="search_material.php">Search Material</a><br>
<a href="my_profile.php">My Profile</a><br>
<a href="logout.php">Logout</a>
