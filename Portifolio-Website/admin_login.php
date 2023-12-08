<?php
session_start(); // Starting the session
include 'db_connect.php'; // Including database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Retrieving entered username
    $password = $_POST['password']; // Retrieving entered password

    // Check if the entered credentials match the admin user
    $admin_query = "SELECT * FROM users WHERE username = '$username' AND is_admin = 1 LIMIT 1"; // SQL query to check admin credentials
    $admin_result = $conn->query($admin_query); // Executing the query

    if ($admin_result && $admin_result->num_rows == 1) { // Checking if a row with admin credentials is found
        $admin_row = $admin_result->fetch_assoc(); // Fetching the admin row from the result
        if (password_verify($password, $admin_row['password'])) { // Verifying password against hashed password
            $_SESSION['admin_id'] = $admin_row['user_id']; // Setting admin ID in session upon successful login
            header('Location: admin_messages.php'); // Redirecting to admin messages page
            exit();
        } else {
            echo "Invalid username or password"; // Displaying error message for invalid username or password
        }
    } else {
        echo "Invalid username or password"; // Displaying error message for invalid username or password
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
