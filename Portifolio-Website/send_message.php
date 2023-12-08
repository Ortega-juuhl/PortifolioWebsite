<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];
        $message = $_POST['message'];

        // Fetching admin user's ID based on is_admin flag
        $admin_query = "SELECT user_id FROM users WHERE is_admin = 1 LIMIT 1";
        $admin_result = $conn->query($admin_query);

        if ($admin_result && $admin_result->num_rows > 0) {
            $admin_row = $admin_result->fetch_assoc();
            $admin_id = $admin_row['user_id'];

            if (!empty($user_id) && !empty($admin_id) && !empty($message)) {
                // Insert message into 'messages' table, sending only to the admin
                $insert_sql = "INSERT INTO messages (sender_id, recipient_id, message_content) 
                               VALUES ('$user_id', '$admin_id', '$message')";

                if ($conn->query($insert_sql) === TRUE) {
                    header("Location: index.php?message=message sent");
                    exit();
                } else {
                    echo "Error: " . $insert_sql . "<br>" . $conn->error;
                }
            } else {
                echo "User ID, admin ID, or message cannot be empty.";
            }
        } else {
            echo "Admin user not found";
        }
    } else {
        header('location: login.html');
        exit();
    }
}

$conn->close();
?>
