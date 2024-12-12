<?php
// Check if user is logged in (cookies are set)
if (!isset($_COOKIE['student_id']) || !isset($_COOKIE['student_email'])) {
    header('Location: login.php');  // Redirect to login if not logged in
    exit();
}

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

// Fetch student information using student ID from cookies
$student_id = $_COOKIE['student_id'];
$sql = "SELECT * FROM students WHERE id='$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Student Information</h2>";
    echo "First Name: " . $row['first_name'] . "<br>";
    echo "Last Name: " . $row['last_name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Mobile Number: " . $row['mobile_number'] . "<br>";
    echo "Gender: " . $row['gender'] . "<br>";
} else {
    echo "No student information found!";
}

$conn->close();
?>

<a href="logout.php">Logout</a>

