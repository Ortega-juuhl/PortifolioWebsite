<?php
// Include the file containing your database connection code
include 'db_connect.php';

session_start(); // Start the session (if not started already)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirm'])) {
        // User confirmed account deletion
        $user_id = $_SESSION['userid']; // Retrieve user ID from session

        // Delete user and related data (this is a sample, adjust as needed)
        $delete_messages_sql = "DELETE FROM messages WHERE sender_id = $user_id OR recipient_id = $user_id";
        $delete_user_sql = "DELETE FROM users WHERE user_id = $user_id";

        if ($conn->query($delete_messages_sql) === TRUE && $conn->query($delete_user_sql) === TRUE) {
            // Logout the user and redirect to a logout page or homepage
            // For example, you can unset session variables and redirect
            session_unset();
            session_destroy();
            header("Location: login.html"); // Redirect to logout page or homepage
            exit();
        } else {
            echo "Error deleting account: " . $conn->error;
        }
    }
}

?>
