<?php
session_start(); // Start the session
include 'db_connect.php'; // Include the database connection file

// Check if the database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create a query to fetch all messages for all users
$fetch_sql = "SELECT u.username AS sender_name, m.message_content, u.email
              FROM messages m
              INNER JOIN users u ON m.sender_id = u.user_id";

// Perform the query
$result = $conn->query($fetch_sql);

// Check if the query was successful and fetch the data
if ($result) {
    if ($result->num_rows > 0) {
        // Messages found
        echo '<div style="display: flex; flex-wrap: wrap;">'; // Start wrapping messages into columns
        while ($row = $result->fetch_assoc()) {
            echo '<div style="width: 30%; margin: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">';
            echo "<strong>From:</strong> " . $row['email'] . "<br>"; // Display sender's email
            echo "<strong>Sender Name:</strong> " . $row['sender_name'] . "<br>"; // Display sender's username
            echo "<strong>Message:</strong> " . $row['message_content'] . "<br><br>"; // Display the message content
            echo '</div>';
        }
        echo '</div>'; // Close the wrapping div
    } else {
        echo "No messages found in the database"; // Display message if no messages found
    }
} else {
    echo "Error fetching messages: " . $conn->error; // Display error message if there is an issue with fetching messages
}

// Close the database connection
$conn->close();
?>
