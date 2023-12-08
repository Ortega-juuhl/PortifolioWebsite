<?php
session_start();
include 'db_connect.php'; // Include the file containing the database connection

// Check if the user is not logged in; if not, redirect to the login page
if (!isset($_SESSION['userid'])) {
    header('Location: login.html');
    exit();
}

// Check if the request method is POST and if the message_id is set in the POST data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message_id'])) {
    $user_id = $_SESSION['userid']; // Retrieve the user ID from the session
    $message_id = $_POST['message_id']; // Retrieve the message_id from POST

    // Prepare a delete query to remove a specific message from the messages table for the given sender_id and message_id
    $delete_query = "DELETE FROM messages WHERE sender_id = $user_id AND message_id = $message_id";

    // Execute the delete query and check if it's successful
    if ($conn->query($delete_query) === TRUE) {
        // Redirect back to your_messages.php after successfully deleting the message
        header('Location: your_messages.php');
        exit(); // Terminate the script after the header redirection
    } else {
        echo "Error deleting message: " . $conn->error; // Display an error message if deletion fails
    }
} else {
    echo "Invalid request."; // Display an error message for an invalid request
}

$conn->close(); // Close the database connection
?>
