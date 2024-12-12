<?php
// Connect to MySQL database (updated database name)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_data";  // Shortened database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to check if email exists
    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set cookies for session
            setcookie('student_id', $row['id'], time() + 3600, "/");  // 1 hour expiration
            setcookie('student_email', $row['email'], time() + 3600, "/");

            header('Location: student_info.php');  // Redirect to student info page
        } else {
            echo "Invalid credentials!";
        }
    } else {
        echo "No user found!";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

