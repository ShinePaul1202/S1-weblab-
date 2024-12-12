<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h1>Welcome, " . htmlspecialchars($username) . "!</h1>";
    } else {
        echo "<h1>Invalid credentials. Please <a href='index.php'>try again</a>.</h1>";
    }

    $stmt->close();
    $conn->close();
}
?>
