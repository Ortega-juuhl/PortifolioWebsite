<?php
include 'db_connect.php'; // Include the database connection file

session_start(); // Start the session (if not started already)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentemail = $_POST['currentemail']; // Get the current email from the form
    $newemail = $_POST['newemail']; // Get the new email from the form

    // Get the current user's ID (assuming user is logged in)
    $user_id = $_SESSION['user_id']; // Retrieve user ID from session

    // Verify current email
    $sql = "SELECT email FROM users WHERE user_id = $user_id"; // SQL query to fetch the current email of the user
    $result = $conn->query($sql); // Perform the query

    if ($result->num_rows == 1) { // Check if user found in the database
        $row = $result->fetch_assoc(); // Fetch the row
        $current_email_db = $row['email']; // Get the current email from the database

        if ($currentemail === $current_email_db) {
            // Current email matches, proceed to change email
            $update_sql = "UPDATE users SET email = '$newemail' WHERE user_id = $user_id"; // SQL query to update the email
            if ($conn->query($update_sql) === TRUE) {
                header("location: account.php"); // Redirect to account page after successful email update
            } else {
                echo "Error updating email: " . $conn->error; // Display error if email update fails
            }
        } else {
            echo "Incorrect current email"; // Display message if the current email entered doesn't match the one in the database
        }
    } else {
        echo "User not found"; // Display message if user is not found in the database
    }
}
?>
