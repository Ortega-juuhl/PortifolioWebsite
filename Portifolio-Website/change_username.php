<?php
include 'db_connect.php'; // Include the database connection file

session_start(); // Start the session (if not started already)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentusername = $_POST['currentusername']; // Get the current username from the form
    $newusername = $_POST['newusername']; // Get the new username from the form

    // Get the current user's ID (assuming user is logged in)
    $user_id = $_SESSION['user_id']; // Retrieve user ID from session

    // Verify current username in the database for the logged-in user
    $sql = "SELECT username FROM users WHERE user_id = $user_id"; // SQL query to fetch the current username
    $result = $conn->query($sql); // Perform the query

    if ($result->num_rows == 1) { // Check if user found in the database
        $row = $result->fetch_assoc(); // Fetch the row
        $current_username_db = $row['username']; // Get the current username from the database

        if ($currentusername === $current_username_db) {
            // Current username matches, proceed to change username
            $update_sql = "UPDATE users SET username = '$newusername' WHERE user_id = $user_id"; // SQL query to update the username
            if ($conn->query($update_sql) === TRUE) {
                header("location: account.php"); // Redirect to account page after successful username update
            } else {
                echo "Error updating username: " . $conn->error; // Display error if username update fails
            }
        } else {
            echo "Incorrect current username"; // Display message if the current username entered doesn't match the one in the database
        }
    } else {
        echo "User not found"; // Display message if user is not found in the database
    }
} else {
    header("Location: change_username?error=feil1"); // Redirect if the request method is not POST
}
?>
