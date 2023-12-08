<?php
session_start(); // Start the session (if not started already)
include 'db_connect.php'; // Include the file containing your database connection code

// Process registration form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: Remember to hash the password securely

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_username_query);

    if ($result->num_rows > 0) {
        // Username is already taken
        echo "Username already exists. Please choose a different username.";
    } else {
        // Example hashing (replace with appropriate secure password hashing)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into 'users' table
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            header('Location: login.html');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close database connection (if needed)
// $conn->close();
?>
