<?php
$servername = "localhost"; // Server name (usually 'localhost' or an IP address)
$username = "root"; // Database username
$password = ""; // Database password (if any)
$dbname = "chat_system"; // Database name

// Create connection to the database using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection to the database was successful
if ($conn->connect_error) {
    // If the connection fails, display an error message and terminate the script
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set the character set to UTF-8 to support special characters
$conn->set_charset("utf8");

// Close the database connection when done (uncomment to enable)
// $conn->close();
?>
