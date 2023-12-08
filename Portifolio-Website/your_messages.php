<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    session_start();
    include 'db_connect.php';

    // Redirect to login page if user is not logged in
    if (!isset($_SESSION['userid'])) {
        header('Location: login.html');
        exit();
    }

    $user_id = $_SESSION['userid'];

    // Fetch messages for the logged-in user from the database
    $fetch_messages = "SELECT message_id, sender_id, message_content, timestamp
                       FROM messages 
                       WHERE sender_id = $user_id";

    $result = $conn->query($fetch_messages);

    if ($result) {
        if ($result->num_rows > 0) {
            // Display messages in a table
            echo "<h2>Your Messages</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Message Content</th><th>Time</th><th>Delete</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['message_content'] . "</td>";
                echo "<td>" . $row['timestamp'] . "</td>";
                echo "<td>
                      <form method='post' action='delete_message.php'>
                          <input type='hidden' name='message_id' value='" . $row['message_id'] . "'>
                          <input type='submit' value='Delete' class='btn'>
                      </form>
                      </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No messages found for this user.";
        }
    } else {
        echo "Error fetching messages: " . $conn->error;
    }

    $conn->close();
    ?>
</body>

</html>
