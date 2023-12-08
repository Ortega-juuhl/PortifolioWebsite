<?php
// Start the session to manage user sessions
session_start();

// Include the file containing the database connection code
include 'db_connect.php';

// Check if the form data is sent using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a SQL query to retrieve user details based on the provided username
    $sql = "SELECT user_id, email, password FROM users WHERE username = '$username'";
    
    // Execute the SQL query
    $result = $conn->query($sql);

    // Check if a user with the provided username exists
    if ($result->num_rows == 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify if the provided password matches the hashed password in the database
        if (password_verify($password, $row['password'])) {
            // Set session variables upon successful login
            $_SESSION['userid'] = $row['user_id']; // Store the user ID in the session
            $_SESSION['email'] = $row['email']; // Store the email in the session
            
            // Redirect the user to the index.php page (or any desired page after successful login)
            header('Location: index.php');
            exit(); // Terminate the script after redirection
        } else {
            // Password verification failed
            echo "Invalid username or password";
        }
    } else {
        // No user found with the provided username
        echo "Invalid username or password";
    }
}
?>
