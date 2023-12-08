<?php
include 'db_connect.php'; // Include the database connection file

session_start(); // Start the session (if not started already)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldpassword = $_POST['oldpassword']; // Get the old password from the form
    $newpassword = $_POST['newpassword']; // Get the new password from the form

    // Get the current user's ID (assuming user is logged in)
    $user_id = $_SESSION['user_id']; // Retrieve user ID from session

    // Retrieve the user's current hashed password from the database
    $sql = "SELECT password FROM users WHERE user_id = $user_id"; // SQL query to fetch the user's hashed password
    $result = $conn->query($sql); // Perform the query

    if ($result->num_rows == 1) { // Check if user found in the database
        $row = $result->fetch_assoc(); // Fetch the row
        $hashed_password = $row['password']; // Get the hashed password from the database

        // Verify old password
        if (password_verify($oldpassword, $hashed_password)) {
            // Old password matches, proceed to change password
            $new_hashed_password = password_hash($newpassword, PASSWORD_DEFAULT); // Hash the new password

            // Update the password in the database
            $update_sql = "UPDATE users SET password = '$new_hashed_password' WHERE user_id = $user_id"; // SQL query to update the password
            if ($conn->query($update_sql) === TRUE) {
                header("location: account.php"); // Redirect to account page after successful password update
            } else {
                echo "Error updating password: " . $conn->error; // Display error if password update fails
            }
        } else {
            echo "Incorrect old password"; // Display message if the old password entered doesn't match the one in the database
        }
    } else {
        echo "User not found"; // Display message if user is not found in the database
    }
}
?>
