<?php
session_start();
include 'example.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $res = mysqli_query($conn, "SELECT * FROM users1 WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);
    if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;

        if ($user['role'] === 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($user['role'] === 'user') {
            header("Location: student_dashboard.php");
        } else {
            echo "Invalid role.";
        }
        exit();
    } else {
        echo "<p style='color:red;'>Invalid credentials</p>";
    }
}
?>
<form method="POST">
    <h2>Login</h2>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
