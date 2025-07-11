<?php
include 'example.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role']; // Role from form input
    $check = mysqli_query($conn, "SELECT * FROM users1 WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "Email already registered. Please login.";
    } else {
        $sql = "INSERT INTO users1 (name, email, password, role)
                VALUES ('$name', '$email', '$password', '$role')";
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful as $role. <a href='login6.php'>Login here</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<h2>Register (Admin or User)</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Role:
    <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>
    <button type="submit">Register</button>
</form>
